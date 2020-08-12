<?php
session_start();
$rootpath = "../../../";

require_once ($rootpath . "Classes/Database.php");
$esc = new DatabaseOutput();
$func = $esc->escape($_POST['func']);
echo $func($rootpath);

function editUserSave($rootpath)
{
    $saveInfo = new DatabaseInput();

    $firstName = $saveInfo->escape($_POST['firstName']);
    $lastName = $saveInfo->escape($_POST['lastName']);
    $email = $saveInfo->escape($_POST['email']);
    $userID = $_SESSION['transport_userID'];

    $saveInfo->SETsqlInput("UPDATE users_main SET firstName = '$firstName', lastName = '$lastName', email = '$email'
                WHERE userID = '$userID'");
    if($saveInfo->GETexecute() == 1) {
        //user updated
        //log and feedback
        require_once ($rootpath . "Classes/Logger.php");
        $logger = new Logger();
        $logger->log($rootpath, "user edited");
        $feedback = json_encode(array("level" => 4, "message" => $firstName . " " . $lastName . "'s information has been updated"));
        return $feedback;
    } else {
        //error occurred during update
        return $saveInfo->GETerror();
    }
}