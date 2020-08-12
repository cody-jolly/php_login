
loadMainUserOverview();

function loadMainUserOverview() {
    $.get('buildMainUserOverview.php', function(data) {
        $('#mainUserOverview').html(data);
    });
}

function deleteUser(index) {
    $.ajax({
        url: 'deleteUser/deleteUser.php',
        type: 'post',
        async: true,
        data: {
            "func": "deleteUser",
            "index": index
        },
        beforeSend: function(){
        }
    }).done(function (feedback)
    {
        console.log(feedback);
       //Feedback is JSON -> decode
        let phpFeedback = JSON.parse(feedback);
        let level = phpFeedback['level'];
        let message = phpFeedback['message'];

        if(level == 4) {
            //User successfully deleted
            globalAlertController(level, message);
            loadMainUserOverview();
        } else {
            //error occured in deleteUser.php
            console.log(feedback);
        }
    });
}

function editUser(index) {
    loadEditUser(index);
    editUserShow();
}




