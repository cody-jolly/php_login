<?php
session_start();
$rootpath = "../";

require_once ($rootpath . "Classes/Database.php");
$esc = new Database();
$func = $esc->escape($_POST['func']);

echo $func($rootpath, $esc);

function login($rootpath, $esc)
{
    $email = $esc->escape($_POST['email']);
    $password = $esc->escape($_POST['password']);

    //check if email exists
    $checkEmail = new DatabaseOutput();
    $checkEmail->SETsqlInput("SELECT * FROM users_main WHERE email = '$email'");

    if($checkEmail->GETrows() == 1) {
        //user email exists
        $userData = $checkEmail->GETassoc();

        $userID = $userData['userID'];
        $firstName = $userData['firstName'];
        $lastName = $userData['lastName'];
        $status = $userData['status'];

        //check status
        if($status == 1) {
            //user status active
            //check password
            $checkPassword = new DatabaseOutput();
            $checkPassword->SETsqlInput("SELECT * FROM users_pw WHERE userID = '$userID'");

            if($checkPassword->GETrows() == 1) {
                //userID has password associated to it
                $passwordData = $checkPassword->GETassoc();

                $hashedPassword = $passwordData['password'];
                if(password_verify($password, $hashedPassword) == true) {
                    //password and user match
                    //generate new session info
                    $sessionID = md5(uniqid());
                    $sessionOpen = time();

                    //add session to database
                    $writeSession = new DatabaseInput();
                    $writeSession->SETsqlInput("INSERT INTO session (sessionID, sessionOpen, userID) 
                                                            VALUES ('$sessionID', '$sessionOpen', '$userID')");
                    if($writeSession->GETexecute()==1)
                    {
                        //session successfully added to database
                        $_SESSION['email'] = $email;
                        $_SESSION['clearName'] = $firstName . " " . $lastName;
                        $_SESSION['userID'] = $userID;
                        $_SESSION['sessionOpen'] = $sessionOpen;
                        $_SESSION['sessionID'] = $sessionID;

                        require_once ($rootpath . "Classes/Logger.php");
                        $log = new Logger();
                        $log->log($rootpath, 'User logged in');

                        return json_encode(array('level' => 4, 'message' => 'login successful!'));
                    }
                    else
                    {
                        //error occured while writing session in the database
                        error_log($writeSession->GETerror());
                        return 3;
                    }
                } else {
                    return json_encode(array('level' => 3, 'message' => 'email and password do not match'));
                }
            } else {
                //error while checking pasword
                return json_encode(array('level' => 2, 'message' => 'an error occurred while checking email and password.'));
            }
        } else {
            //user status frozen or deleted
            return json_encode(array('level' => 3, 'message' => 'email and password do not match'));;
        }
    } else {
        //user email does not exist
        return json_encode(array('level' => 3, 'message' => 'email and password do not match'));;
    }
}