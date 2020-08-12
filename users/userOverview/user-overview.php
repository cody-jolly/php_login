<?php
session_start();
$rootpath = '../../';
$pageTitle = 'User Overview';
require_once($rootpath . "Classes/LoaderMeta.php");
require_once($rootpath . "Classes/LoaderStyle.php");
require_once($rootpath . "Classes/LoaderJS.php");
require_once($rootpath . "Classes/SessionController.php");
require_once($rootpath . "Classes/Database.php");
require_once($rootpath . "Classes/LoaderConfig.php");

//check session data
$sessionControl = new SessionController();
$sessionCheck = $sessionControl->checkSession($rootpath);
if($sessionCheck != 1) {
    //session is not ok
    header('Location: http://127.0.0.1/myWebshop/login/login.php');
    exit();
} else {
    //session ok
    //write log
    require_once ($rootpath. "Classes/Logger.php");
    $logger = new Logger();
    $logger->log($rootpath, "user has entered " . $pageTitle);
}

//load configuration
$loadConfig = new LoaderConfig();
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
    <script src="https://kit.fontawesome.com/15c01b974e.js" crossorigin="anonymous"></script>
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
<div class="container-fluid px-0" onclick="globalAlertRest()">
    <?php
    require_once($rootpath . "Classes/Navigation.php");
    require_once($rootpath . "Classes/Alerts.php");
    $buildNav = new Navigation();
    echo $buildNav->buildNavigation($rootpath);
    $buildAlerts = new Alerts();
    echo $buildAlerts->buildAlerts();
    ?>

    <!-- Main Content -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card col-8 offset-2 px-0">
                <div class="card-header">
                    <h1 class="text-center">Check out these Users!!!</h1>
                </div>
                <div class="card-body" id="mainUserOverview"></div>
            </div>
        </div>
    </div>
</div>
<?php
//include editUser modal
include ("editUser/editUser.php");
?>
<script src="userOverview.js" type="text/javascript"></script>
<script src="editUser/editUserController.js" type="text/javascript"></script>
</body>
</html>