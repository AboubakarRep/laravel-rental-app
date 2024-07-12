/**
 * script pour la vérification de l'enregistrement des utilisateurs
 */

$(document).ready(function(){


    $('#register-reservation').click(function(){
        var lieu_recup = $('#lieu_recup').val();
        var lieu_rem = $('#lieu_rem').val();
        var date_debut = $('#date_debut').val();
        var date_fin = $('#date_fin').val();

        var isValid = true;


        // Validation de la lieu_recup
        if(lieu_recup != "" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(lieu_recup)){
            $('#lieu_recup').removeClass('is-invalid');
            $('#lieu_recup').addClass('is-valid');
            $('#error-register-lieu_recup').text("");
        } else {
            $('#lieu_recup').addClass('is-invalid');
            $('#lieu_recup').removeClass('is-valid');
            $('#error-register-lieu_recup').text("La lieu_recup n'est pas valide !");
            isValid = false;
        }

        // Validation du modèle
        if(lieu_rem != "" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(lieu_rem)){
            $('#lieu_rem').removeClass('is-invalid');
            $('#lieu_rem').addClass('is-valid');
            $('#error-register-lieu_rem').text("");
        } else {
            $('#lieu_rem').addClass('is-invalid');
            $('#lieu_rem').removeClass('is-valid');
            $('#error-register-lieu_rem').text("Le modèle n'est pas valide !");
            isValid = false;
        }

        // Validation des dates
        if(date_debut <= date_fin ){
            $('#date_debut').removeClass('is-invalid');
            $('#date_debut').addClass('is-valid');
            $('#error-register-date_debut').text("");
            $('#date_fin').removeClass('is-invalid');
            $('#date_fin').addClass('is-valid');
            $('#error-register-date_fin').text("");
        } else {
            $('#date_debut').addClass('is-invalid');
            $('#date_debut').removeClass('is-valid');
            $('#error-register-date_debut').text("La date de début doit être antérieure ou égale à la date de fin !");
            $('#date_fin').addClass('is-invalid');
            $('#date_fin').removeClass('is-valid');
            $('#error-register-date_fin').text("La date de fin doit être postérieure ou égale à la date de début !");
            isValid = false;
        }

        // Soumettre le formulaire si toutes les validations sont réussies
        if(isValid) {
            $('#form-reservation').submit();
        }
    });
});
