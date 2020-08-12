<?php
session_start();
$rootpath = '../';
$pageTitle = 'Dashboard';
require_once($rootpath . "Classes/LoaderMeta.php");
require_once($rootpath . "Classes/LoaderStyle.php");
require_once($rootpath . "Classes/LoaderJS.php");
require_once($rootpath . "Classes/SessionController.php");
require_once($rootpath . "Classes/Database.php");

//check session data
$sessionControl = new SessionController();
$sessionCheck = $sessionControl->checkSession($rootpath);
if($sessionCheck == 1) {
    //session ok
    //write log
    require_once ($rootpath. "Classes/Logger.php");
    $logger = new Logger();
    $logger->log($rootpath, "user has entered " . $pageTitle);
} else {
    //session is not ok
    header('Location: http://127.0.0.1/myWebshop/login/login.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!--load meta, link, and script tags for head-->
    <?php
    $requireMeta = new LoaderMeta();
    $requireStyle = new LoaderStyle();
    $requireJS = new LoaderJS();
    echo $requireMeta->loadMeta();
    echo $requireStyle->loadStyle($rootpath);
    echo $requireJS->loadJS($rootpath);
    ?>
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
<div class="container-fluid px-0">
    <?php
    require_once($rootpath . "Classes/Navigation.php");
    $buildNav = new Navigation();
    $buildNav->buildNavigation($rootpath);
    ?>

    <!-- Main Content -->
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <div>
                <h1>Welcome to the dashboard!!!</h1>
            </div>
        </div>
    </div>
</div>
</body>
</html>

