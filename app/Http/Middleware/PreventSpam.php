<?php

namespace App\Http\Middleware;

use App\Support\AntiSpam;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

/**
 * Protection anti-spam des formulaires publics.
 *
 * Usage : ->middleware('antispam:contact') ou ->middleware('antispam:order')
 *
 * Couches de contrôle :
 *  1. Honeypot   : champ invisible qui doit rester vide.
 *  2. Piège temporel : horodatage signé, envoi trop rapide ou périmé rejeté.
 *  3. Limitation par IP (config/antispam.php).
 *  4. Heuristiques de contenu : liens, mots-clés, alphabets non latins, majuscules.
 *  5. Adresses e-mail jetables.
 */
class PreventSpam
{
    /**
     * Champs de texte libre analysés, par formulaire.
     *
     * @var array<string, array<int, string>>
     */
    private const TEXT_FIELDS = [
        'contact' => ['nom', 'message'],
        'order' => ['nom', 'ville', 'commentaire'],
    ];

    public function handle(Request $request, Closure $next, string $form = 'contact'): Response
    {
        $ip = $request->ip();

        // 1. Honeypot : rempli => bot.
        if (filled($request->input(AntiSpam::HONEYPOT_FIELD))) {
            return $this->reject($request, 'honeypot', $form, $ip);
        }

        // 2. Piège temporel. Un formulaire absent ou périmé (onglet resté ouvert,
        // page servie depuis le cache du navigateur) n'est pas du spam : on affiche
        // un message clair invitant à renvoyer, la saisie étant conservée.
        if ($reason = AntiSpam::checkTimestamp($request->input(AntiSpam::TIMESTAMP_FIELD))) {
            $message = in_array($reason, ['timestamp_missing', 'expired'], true)
                ? __('antispam.expired')
                : null;

            return $this->reject($request, $reason, $form, $ip, $message);
        }

        // 3. Limitation du nombre d'envois par IP.
        $config = config("antispam.throttle.$form", ['max' => 3, 'minutes' => 60]);
        $key = "antispam:$form:$ip";

        if (RateLimiter::tooManyAttempts($key, $config['max'])) {
            $minutes = (int) ceil(RateLimiter::availableIn($key) / 60);

            return $this->reject(
                $request,
                'rate_limited',
                $form,
                $ip,
                __('antispam.rate_limited', ['minutes' => max(1, $minutes)])
            );
        }

        // 4. Analyse du contenu.
        $fields = self::TEXT_FIELDS[$form] ?? self::TEXT_FIELDS['contact'];
        $texts = array_map(fn ($field) => $request->input($field), $fields);

        if ($reason = AntiSpam::checkContent($texts)) {
            return $this->reject($request, $reason, $form, $ip);
        }

        // 5. E-mail jetable.
        if ($reason = AntiSpam::checkEmail($request->input('email'))) {
            return $this->reject($request, $reason, $form, $ip, __('antispam.disposable_email'));
        }

        // La soumission est considérée légitime : on la comptabilise.
        RateLimiter::hit($key, $config['minutes'] * 60);

        return $next($request);
    }

    /**
     * Rejette la soumission avec un message générique (aucun indice pour le bot).
     */
    private function reject(Request $request, string $reason, string $form, ?string $ip, ?string $message = null): Response
    {
        AntiSpam::logRejection($reason, $form, $ip ?? 'unknown');

        $message ??= __('antispam.rejected');

        if ($request->expectsJson()) {
            return response()->json(['message' => $message], 422);
        }

        return redirect()->back()
            ->withInput($request->except([AntiSpam::HONEYPOT_FIELD, AntiSpam::TIMESTAMP_FIELD]))
            ->withErrors(['error' => $message])
            ->with('error', $message);
    }
}
