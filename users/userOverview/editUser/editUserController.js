function editUserClose() {
    $('#edit_user_modal').hide();
}

function editUserShow() {
    $('#edit_user_modal').show();
}

function loadEditUser(index) {
    $.get('editUser/editUserBuilder.php', {'index': index}, function(data) {
        $('#userEditContent').html(data);
    });
}

function editUserSave() {
    let firstName = $('#edit_firstName');
    let lastName = $('#edit_lastName');
    let email = $('#edit_email');

    if (firstName.val().length > 0 && lastName.val().length > 0 && email.val().length > 0) {
        $.ajax({
            url: 'editUser/editUserSave.php',
            type: 'post',
            async: true,
            data: {
                "func": "editUserSave",
                "firstName": firstName.val(),
                "lastName": lastName.val(),
                "email": email.val()
            },
            beforeSend: function(){
                globalAlertRest();
                firstName.removeClass('border-danger');
                lastName.removeClass('border-danger');
                email.removeClass('border-danger');
            }
        }).done(function (feedback)
        {
            console.log(feedback);
            //Feedback is JSON -> decode
            let phpFeedback = JSON.parse(feedback);
            let level = phpFeedback['level'];
            let message = phpFeedback['message'];

            if(level == 4) {
                //User successfully edited
                globalAlertController(level, message);
                editUserClose();
                loadMainUserOverview();
            } else {
                //error occured in deleteUser.php
                console.log(feedback);
            }
        });
    } else {
        //fields not filled out
        globalAlertController(3, 'Please fill in all of the empty fields');
        if (!(firstName.val().length > 0)) {
            firstName.addClass('border-danger');
        } else if (!(lastName.val().length > 0)) {
            lastName.addClass('border-danger');
        } else if (!(email.val().length > 0)) {
            email.addClass('border-danger');
        }
    }
}