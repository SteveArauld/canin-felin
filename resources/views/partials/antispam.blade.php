{{-- Protection anti-spam : honeypot + horodatage signé. Voir app/Http/Middleware/PreventSpam.php --}}

{{--
    Le champ piège doit rester vide. Il est masqué avec display:none (et non
    positionné hors écran) : un champ hors écran reste "visible" pour l'autofill
    des navigateurs et des gestionnaires de mots de passe, qui le remplissaient
    et faisaient rejeter de vrais visiteurs.
--}}
<div style="display:none;" aria-hidden="true">
    <input type="text"
           name="{{ \App\Support\AntiSpam::HONEYPOT_FIELD }}"
           id="{{ \App\Support\AntiSpam::HONEYPOT_FIELD }}"
           value=""
           tabindex="-1"
           autocomplete="off"
           data-lpignore="true"
           data-1p-ignore
           data-form-type="other">
</div>

<input type="hidden"
       name="{{ \App\Support\AntiSpam::TIMESTAMP_FIELD }}"
       value="{{ \App\Support\AntiSpam::timestampToken() }}">

{{--
    Remise à zéro à l'ouverture de la page uniquement : c'est à ce moment que
    l'autofill d'un navigateur agit. Le champ n'est volontairement PAS vidé à
    l'envoi, sinon le piège ne servirait plus à rien : toute valeur présente au
    moment de la soumission est donc bien le fait d'un robot, et la demande est
    rejetée côté serveur.
--}}
<script>
    (function () {
        var field = document.getElementById('{{ \App\Support\AntiSpam::HONEYPOT_FIELD }}');
        if (field) {
            field.value = '';
        }
    })();
</script>
