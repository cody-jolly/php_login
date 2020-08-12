
function login() {
    let email = $('#ip_email');
    let password = $('#ip_password')

    $.ajax({
        url: 'loginFunction.php',
        type: 'post',
        async: true,
        data: {
            "func": "login",
            "email": email.val(),
            "password": password.val()
        },
        beforeSend: function(){
            globalAlertRest();
        }
    }).done(function (feedback)
    {
        //Feedback is JSON -> decode
        let phpFeedback = JSON.parse(feedback);
        let level = phpFeedback['level'];
        let message = phpFeedback['message'];

        if(level == 4) {
            //User successfully logged in
            window.location.href = "../dashboard/dashboard.php";
        } else if(level == 3) {
            //email and password do not match
            email.val('');
            password.val('');
        }

        globalAlertController(level, message);
    });
}