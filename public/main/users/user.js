/**
 * script pour la vérification de l'enregistrement des utilisateurs
 */

$('#register-user').click(function(){
    var name = $('#name').val();
    var firstname = $('#firstname').val();
    var email = $('#email').val();
    var contact = $('#contact').val();
    var password = $('#password').val();
    var password_confirmation= $('#password_confirmation').val();
    var passwordLength = password.length;
    // var agreeTerms = $('#agreeTerms');


    if(firstname != "" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(firstname)){
        $('#firstname').removeClass('is-invalid');
        $('#firstname').addClass('is-valid');
        $('#error-register-firstname').text("");

        if(name  != "" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(name )){
            $('#name ').removeClass('is-invalid');
            $('#name ').addClass('is-valid');
            $('#error-register-name ').text("");

            if(email != "" && /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email)){
                $('#email').removeClass('is-invalid');
                $('#email').addClass('is-valid');
                $('#error-register-email').text("");

                if(contact != "" && /^\d{10}$/.test(contact)){
                    $('#contact').removeClass('is-invalid');
                    $('#contac').addClass('is-valid');
                    $('#error-register-contact').text("");




                    if(passwordLength >= 8){
                        $('#password').removeClass('is-invalid');
                        $('#password').addClass('is-valid');
                        $('#error-register-password').text("");

                        if(password == password_confirm){
                            $('#password_confirmation').removeClass('is-invalid');
                            $('#password_confirmation').addClass('is-valid');
                            $('#error-register-password_confirmation').text("");

                                //envoie du formulaire
                                //alert('data-ok');

                                var res =  emailExistjs(email);

                                (res != "exist") ? $('#form-register').submit()
                                    :   ($('#email').addClass('is-invalid'),
                                        $('#email').removeClass('is-valid'),
                                        $('#error-register-email').text("This email address is already used!"));

                                /**
                                 * condition ternaire
                                 * (condtion) ? vraie : fausse;
                                 * condition avec plusieurs intsructions
                                 * (condition) ? vraie (inst1, inst1) : fausse (inst1, inst1);
                                 */


                        }else{
                            $('#password_confirmation').addClass('is-invalid');
                            $('#password_confirmation').removeClass('is-valid');
                            $('#error-register-password_confirmation').text("Your passwords must be identical!");
                        }
                    }else{
                        $('#password').addClass('is-invalid');
                        $('#password').removeClass('is-valid');
                        $('#error-register-password').text("Le champ du mot de passe doit contenir au moins 8 caractères!");
                    }
                }else{
                    $('#contact').addClass('is-invalid');
                    $('#contact').removeClass('is-valid');
                    $('#error-register-contact').text("Your contact is not valid!");
                }
            }else{
                $('#email').addClass('is-invalid');
                $('#email').removeClass('is-valid');
                $('#error-register-email').text("Your email address is not valid!");
            }

        }else{
            $('#firstname').addClass('is-invalid');
            $('#firstname').removeClass('is-valid');
            $('#error-register-firstname').text("First Name is not valid!");
        }
    }else{
        $('#name ').addClass('is-invalid');
        $('#name ').removeClass('is-valid');
        $('#error-register-name ').text("Last Name is not valid!");
    }

});

// //Evénement pour l'input termes et conditions
// $('#agreeTerms').change(function(){
//     var agreeTerms = $('#agreeTerms');

//     if(agreeTerms.is(':checked')){
//         $('#agreeTerms').removeClass('is-invalid');
//         $('#error-register-agreeTerms').text("");
//     }else{
//         $('#agreeTerms').addClass('is-invalid');
//         $('#error-register-agreeTerms').text("You should agree to our terms and condition!");
//     }
// });

function emailExistjs(email)
{
    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res = "";

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            '_token': token,
            email: email
        },
        success:function(result){
            res = result.response;
        },
        async: false
    });

    return res;

}
