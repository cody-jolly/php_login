$('#addUserButton').click(addNewUser);
$('#content').click(clearAlerts);

function addNewUser() {
    let firstName = '';
    let lastName = '';
    let email = '';
    let password = '';

    //Form validation

    if ($('#firstName').val().length > 0) {
        firstName = $('#firstName').val();
        $('#firstName').removeClass('border-danger');
        if ($('#lastName').val().length > 0) {
            lastName = $('#lastName').val();
            $('#lastName').removeClass('border-danger');
            if ($('#email').val().length > 0) {
                email = $('#email').val();
                $('#email').removeClass('border-danger');
                if ($('#password').val().length > 0) {
                    $('#password').removeClass('border-danger');
                    if ($('#repeatPassword').val().length > 0) {
                        $('#repeatPassword').removeClass('border-danger');
                        checkPasswords();
                    } else {
                        $('#repeatPassword').addClass('border-danger');
                        $('#repeatPassword').attr('placeholder', 'Please re-enter your password!');
                    }
                } else {
                    $('#password').addClass('border-danger');
                    $('#password').attr('placeholder', 'Please enter a password!');
                }
            } else {
                $('#email').addClass('border-danger');
                $('#email').attr('placeholder', 'Please enter your email!');
            }
        } else {
            $('#lastName').addClass('border-danger');
            $('#lastName').attr('placeholder', 'Please enter your lasst name!');
        }
    } else {
        $('#firstName').addClass('border-danger');
        $('#firstName').attr('placeholder', 'Please enter your first name!');
    }


    function checkPasswords() {
        if(!($('#password').val() == $('#repeatPassword').val())) {
            // passwords do not match
            $('#repeatPassword').addClass('border-danger');
            $('#passwordWarning').removeClass('d-none');
        } else {
            // passwords match
            $('#repeatPassword').removeClass('border-danger');
            $('#passwordWarning').addClass('d-none');
            password = $('#password').val();
            if ($('#termsPrivacy').prop('checked') == true) {
                // termsPrivacy checked
                $('#termsPrivacyWarning').addClass('d-none');
                sendData();
            } else {
                // termsPrivacy not checked
                $('#termsPrivacyWarning').removeClass('d-none');
            }
        }
    }


    //TODO: finish form validation for add new user form

    function sendData() {
        $.ajax({
            url: 'addNewUserFunction.php',
            type: 'post',
            async: true,
            data: {
                "func": "addNewUser",
                "email": email,
                "firstName": firstName,
                "lastName": lastName,
                "password": password
            },
            beforeSend: function(){
                //TODO: set up beforeSend
                //z.B. Spinner Loader anzeigen
                //z.B. Button zum absenden disable
                //Alert abschalten
                globalAlertRest();
            }
        }).done(function (feedback)
        {
            //Feedback is JSON -> decode
            let phpFeedback = JSON.parse(feedback);
            let level = phpFeedback['level'];
            let message = phpFeedback['message'];

            if(level == 4) {
                //User successfully entered in DB
                //Empty form
                $('#email').val('');
                $('#firstName').val('');
                $('#lastName').val('');
                $('#password').val('');
                $('#repeatPassword').val('');
                $('#termsPrivacy').prop('checked', false);
            } else if(level == 2) {
                // email already in use
                $('#email').val('');
                $('#email').addClass('border-danger');
            }

            globalAlertController(level, message);
        });
    }

}

function clearAlerts() {
    if(!$('#alert1').hasClass('d-none') || !$('#alert2').hasClass('d-none') || !$('#alert3').hasClass('d-none') || !$('#alert4').hasClass('d-none')) {
        // hide alerts
        $('.alert').addClass('d-none');
    }
}