<?php
session_start();
$rootpath = "../../../";
require_once ($rootpath . "Classes/Database.php");

$esc = new Database();
$func = $esc->escape($_POST['func']);

echo $func($rootpath);

function deleteUser($rootpath)
{
    //get user ID from userIDs
    $databaseInput = new DatabaseInput();
    $userIDs = $_SESSION['transport_userIDs'];
    $index = $databaseInput->escape($_POST['index']);
    $userID = $userIDs[$index];

    //set user status to deleted (2)
    $deletedOn = time();
    $databaseInput->SETsqlInput("UPDATE users_main SET status = 2, deletedON = '$deletedOn' 
                                            WHERE userID = '$userID'");
    if($databaseInput->GETexecute() == 1) {
        //user deleted
        //log and feedback
        require_once ($rootpath . "Classes/Logger.php");
        $logger = new Logger();
        $logger->log($rootpath, "user deleted");
        $feedback = json_encode(array('level' => 4, 'message' => 'user deleted!'));
        return $feedback;
    } else {
        //error occurred
        return $databaseInput->GETerror();
    }
}

