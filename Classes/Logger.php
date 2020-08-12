
<?php


class Logger
{
    public function log($rootpath, $action)
    {
        require_once ($rootpath . "Classes/Database.php");

        $sessionID = $_SESSION['sessionID'];
        $actionTime = time();

        $writeLog = new DatabaseInput();
        $writeLog->SETsqlInput("INSERT INTO session_actions (sessionID, action, action_time) VALUES ('$sessionID', '$action', '$actionTime')");
        if($writeLog->GETexecute()!=1)
        {
            error_log($writeLog->GETerror());
            return 0;
        }
    }
}