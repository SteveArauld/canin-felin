<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;

/**
 * Boîte à outils anti-spam partagée par les formulaires publics
 * (contact et soumission de commande).
 */
class AntiSpam
{
    /**
     * Nom du champ honeypot (invisible pour un humain, rempli par les bots).
     *
     * Important : ne jamais utiliser un nom évoquant un champ réel (url, site,
     * tel, adresse...), sinon l'autofill des navigateurs le remplit et bloque
     * de vrais visiteurs.
     */
    public const HONEYPOT_FIELD = 'af_ctrl_zzz';

    /** Nom du champ contenant l'horodatage signé d'affichage du formulaire. */
    public const TIMESTAMP_FIELD = '_form_ts';

    /** Délai minimum (secondes) entre l'affichage et l'envoi du formulaire. */
    public const MIN_SECONDS = 4;

    /** Durée de validité du formulaire (secondes) : 3 heures. */
    public const MAX_SECONDS = 10800;

    /** Nombre maximum de liens tolérés dans un texte libre. */
    public const MAX_LINKS = 1;

    /**
     * Génère la valeur signée à placer dans le champ caché d'horodatage.
     */
    public static function timestampToken(): string
    {
        $time = (string) time();

        return $time . '|' . self::sign($time);
    }

    /**
     * Vérifie le jeton d'horodatage et retourne le motif de rejet, ou null si valide.
     */
    public static function checkTimestamp(?string $token): ?string
    {
        if (!is_string($token) || !str_contains($token, '|')) {
            return 'timestamp_missing';
        }

        [$time, $signature] = explode('|', $token, 2);

        if (!ctype_digit($time) || !hash_equals(self::sign($time), $signature)) {
            return 'timestamp_forged';
        }

        $elapsed = time() - (int) $time;

        if ($elapsed < self::MIN_SECONDS) {
            return 'too_fast';
        }

        if ($elapsed > self::MAX_SECONDS) {
            return 'expired';
        }

        return null;
    }

    /**
     * Analyse les textes libres soumis et retourne le motif de rejet, ou null.
     *
     * @param  array<int, string|null>  $texts
     */
    public static function checkContent(array $texts): ?string
    {
        $joined = trim(implode("\n", array_filter($texts, 'is_string')));

        if ($joined === '') {
            return null;
        }

        if (self::countLinks($joined) > self::MAX_LINKS) {
            return 'too_many_links';
        }

        if (preg_match('/\[url[=\]]|\[link[=\]]|<a\s+href/i', $joined)) {
            return 'markup_links';
        }

        // Alphabets non latins massivement utilisés (cyrillique, CJK, arabe) :
        // le site ne s'adresse qu'à des visiteurs francophones/anglophones.
        if (preg_match_all('/[\x{0400}-\x{04FF}\x{4E00}-\x{9FFF}\x{0600}-\x{06FF}]/u', $joined) > 3) {
            return 'foreign_script';
        }

        foreach (self::spamKeywords() as $keyword) {
            if (stripos($joined, $keyword) !== false) {
                return 'keyword:' . $keyword;
            }
        }

        // Texte majoritairement en majuscules (typique des envois automatisés).
        $letters = preg_replace('/[^\p{L}]/u', '', $joined);
        if (mb_strlen($letters) >= 20) {
            $upper = preg_replace('/[^\p{Lu}]/u', '', $letters);
            if (mb_strlen($upper) / mb_strlen($letters) > 0.8) {
                return 'shouting';
            }
        }

        return null;
    }

    /**
     * Rejette les adresses e-mail jetables les plus courantes.
     */
    public static function checkEmail(?string $email): ?string
    {
        if (!is_string($email) || !str_contains($email, '@')) {
            return null;
        }

        $domain = strtolower(trim(substr($email, strrpos($email, '@') + 1)));

        foreach (self::disposableDomains() as $blocked) {
            if ($domain === $blocked || str_ends_with($domain, '.' . $blocked)) {
                return 'disposable_email';
            }
        }

        return null;
    }

    /**
     * Journalise un rejet pour permettre le suivi et l'ajustement des règles.
     */
    public static function logRejection(string $reason, string $form, string $ip): void
    {
        Log::warning('Anti-spam: soumission rejetée', [
            'form' => $form,
            'reason' => $reason,
            'ip' => $ip,
        ]);
    }

    private static function countLinks(string $text): int
    {
        return preg_match_all('#(https?://|www\.)[^\s<]+#i', $text)
            + preg_match_all('#\b[a-z0-9-]+\.(ru|cn|tk|top|xyz|click|loan|bid)\b#i', $text);
    }

    private static function sign(string $value): string
    {
        return hash_hmac('sha256', 'antispam:' . $value, config('app.key'));
    }

    /**
     * @return array<int, string>
     */
    private static function spamKeywords(): array
    {
        return config('antispam.keywords', []);
    }

    /**
     * @return array<int, string>
     */
    private static function disposableDomains(): array
    {
        return config('antispam.disposable_domains', []);
    }
}
