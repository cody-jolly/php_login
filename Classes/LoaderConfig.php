<?php
class LoaderConfig
{

    //Database infos
    protected $host = '127.0.0.1';
    protected $db = 'myWebshop';
    protected $user = 'root';
    protected $password = 'root';
    protected $showError = 1;

    protected $sessionTimeout = 600;


    public function __construct()
    {
        $configArray = array('sessionTimeout' => $this->sessionTimeout,
                                       'host' => $this->host,
                                         'db' => $this->db,
                                       'user' => $this->user,
                                   'password' => $this->password,
                                  'showError' => $this->showError);

        $_SESSION['config'] = $configArray;
    }
}