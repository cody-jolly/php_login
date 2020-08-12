<?php
$rootpath = '';
session_start();

$_SESSION['sessionID'] = md5(uniqid());
$_SESSION['lastAction'] = time();

require_once($rootpath . "Classes/LoaderConfig.php");
//load configuration
$loadConfig = new LoaderConfig();

header('Location: http://127.0.0.1/myWebshop/login/login.php');