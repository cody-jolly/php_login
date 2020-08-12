<?php

class SessionController
{
    public function checkSession($rootpath)
    {
        require_once ($rootpath . "Classes/Database.php");
        $esc = new Database();

        //retrieve data from session
        $email = $esc->escape($_SESSION['email']);
        $clearName = $esc->escape($_SESSION['clearName']);
        $userID = $esc->escape($_SESSION['userID']);
        $sessionOpen = $esc->escape($_SESSION['sessionOpen']);
        $sessionID = $esc->escape($_SESSION['sessionID']);

        if(!isset($_SESSION['email']))
        {
            return 0;
        }
        else if(!isset($_SESSION['clearName']))
        {
            return 0;
        }
        else if(!isset($_SESSION['userID']))
        {
            return 0;
        }
        else if(!isset($_SESSION['sessionOpen']))
        {
            return 0;
        }
        else if(!isset($_SESSION['sessionID']))
        {
            return 0;
        }

        $checkSessionID = new DatabaseOutput();
        $checkSessionID->SETsqlInput("SELECT * FROM session WHERE sessionID = '$sessionID'");
        if($checkSessionID->GETrows()==1)
        {
            //a session with this id exists
            //save data locally
            $sessionData = $checkSessionID->GETassoc();

            $sessionOpen = $sessionData['sessionOpen'];
            $sessionUserID = $sessionData['userID'];

            //are the userID's the same?
            if($sessionUserID != $userID)
            {
                //User_IDs do not match
                return 0;
            }

            //is the user in the Session in the database?
            $checkUserData = new DatabaseOutput();
            $checkUserData->SETsqlInput("SELECT * FROM users_main WHERE userID = '$sessionUserID'");
            if($checkUserData->GETrows()==1)
            {
                //user exists in database
                $userData = $checkUserData->GETassoc();
                $userEmail = $userData['email'];
                $userFirstName = $userData['firstName'];
                $userLastName = $userData['lastName'];
                $userStatus = $userData['status'];

                //do the emails match?
                if($userEmail == $email)
                {
                    //emails match
                    //does the clearName match?
                    if($clearName == $userFirstName . " " . $userLastName)
                    {
                        //clearName matches
                        //is the status OK?
                        if($userStatus == 1)
                        {
                            //status is ok
                            //is the session less than 24hrs old?
                            if($sessionOpen + 86400 > time())
                            {
                                //session is less than 24hrs old
                                return 1;
                            }
                            else
                            {
                                //session is too old
                                return 0;
                            }
                        }
                        else
                        {
                            //status is not ok
                            return 0;
                        }
                    }
                    else
                    {
                        //clearName does not match
                        return 0;
                    }
                }
                else
                {
                    //emails do not match
                    return 0;
                }
            }
            else
            {
                //user does not exist in database
                return 0;
            }
        }
        else
        {
            //sessionId does not exist in database
            return 0;
        }
    }
}