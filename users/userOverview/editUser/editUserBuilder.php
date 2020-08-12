<?php
session_start();
$rootpath = "../../../";
require_once ($rootpath . "Classes/Database.php");
$userOutput = new DatabaseOutput();

//get userID from array
$userIDs = $_SESSION['transport_userIDs'];
$index = $userOutput->escape($_GET['index']);
$userID = $userIDs[$index];

//get user information
$userOutput->SETsqlInput("SELECT * FROM users_main WHERE userID = '$userID'");
if($userOutput->GETrows() == 1) {
    $userInfo = $userOutput->GETassoc();
    $firstName = $userInfo['firstName'];
    $lastName = $userInfo['lastName'];
    $email = $userInfo['email'];
    ?>
    <div class="row mt-3">
        <div class="col-4">
            Email
        </div>
        <div class="col-8">
            <input type="text" class="form-control" id="edit_email" value="<?php echo $email ?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4">
            First Name
        </div>
        <div class="col-8">
            <input type="text" class="form-control" id="edit_firstName" value="<?php echo $firstName ?>">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-4">
            Last Name
        </div>
        <div class="col-8">
            <input type="text" class="form-control" id="edit_lastName" value="<?php echo $lastName ?>">
        </div>
    </div>
    <?php

    //save userID for use in editUserSave();
    $_SESSION['transport_userID'] = $userID;
} else {
    //user not found
    error_log("user not found!");
    return "No information found for user!";
}
