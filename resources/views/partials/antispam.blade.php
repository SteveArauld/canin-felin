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
    Filet de sécurité : si malgré tout un outil externe remplit le champ piège,
    on le vide juste avant l'envoi. Un vrai visiteur n'est donc jamais bloqué,
    tandis que les robots qui postent sans exécuter le JavaScript — la très
    grande majorité du spam de formulaire — restent piégés.
--}}
<script>
    (function () {
        var field = document.getElementById('{{ \App\Support\AntiSpam::HONEYPOT_FIELD }}');
        if (!field) return;

        field.value = '';

        var form = field.form;
        if (form) {
            form.addEventListener('submit', function () {
                field.value = '';
            });
        }
    })();
</script>
