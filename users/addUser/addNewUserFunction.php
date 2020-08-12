<?php
session_start();
$rootpath = "../../";
$func = htmlspecialchars($_POST['func']);

echo $func($rootpath);


function addNewUser($rootpath)
{
    $email = htmlspecialchars($_POST['email']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $password = htmlspecialchars($_POST['password']);

    require_once ($rootpath . "Classes/Database.php");

    //Check if email has been used
    $checkEmail = new DatabaseOutput();
    $checkEmail->SETsqlInput("SELECT * FROM users_main WHERE email = '$email';");
    if($checkEmail->GETrows()==0) {
        //Email address has not yet been used
        //prepare data

        //create UserID
        $userID = md5(uniqid());

        //encrypt password
        $passwordCrypted = crypt($password, md5(uniqid()));

        //create entry in user_main table
        $usersMainEntry = new DatabaseInput();
        $usersMainEntry->SETsqlInput("INSERT INTO users_main (userID, lastName, firstName, email) 
                                                VALUES ('$userID', '$lastName', '$firstName', '$email');");
        if($usersMainEntry->GETexecute()==1) {
            //Data successfully entered in table
            //create pw entry in user_pw
            $usersPwEntry = new DatabaseInput();
            $usersPwEntry->SETsqlInput("INSERT INTO users_pw (userID, password) VALUES ('$userID', '$passwordCrypted');");
            if($usersPwEntry->GETexecute()==1) {
                //password successfully entered
                //done, success message and log
                require_once ($rootpath . "Classes/Logger.php");
                $logger = new Logger();
                $logger->log($rootpath, "user added");
                $alertMessage = json_encode(array('level' => 4, 'message' => "User successfully added!"));
                return $alertMessage;
            } else {
                //problem with entry to user_pw
                error_log($usersPwEntry->GETerror());
                $alertMessage = json_encode(array('level' => 3, 'message' => "User could not be created!"));
                return $alertMessage;
            }
        } else {
            //problem with entry to users_main
            error_log($usersMainEntry->GETerror());
            $alertMessage = json_encode(array('level' => 3, 'message' => "User could not be created!"));
            return $alertMessage;
        }
    } else {
        //email is already used
        $alertMessage = json_encode(array('level' => 2, 'message' => "Email is already in use! Please enter a different email!"));
        return $alertMessage;
    }
}

?>