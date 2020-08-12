<?php
session_start();
$rootpath = '../';
$pageTitle = 'Add New Item';
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
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
<div class="container-fluid px-0">
    <?php
    require_once($rootpath . "Classes/Navigation.php");
    $buildNav = new Navigation();
    echo $buildNav->buildNavigation($rootpath);
    ?>

    <!-- Main Content -->
    <div class="row mt-3">
        <div class="col-12">
            <div class="row mt-3">
                <div class="col-10 offset-1">
                    <div class="card ">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="loadContent('itemInfo')">General Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Prices</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Photos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Availability</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row mt-1">
                                <div class="col-10 offset-1">
                                    <?php
                                    require_once($rootpath . "Classes/Alerts.php");
                                    $buildAlerts = new Alerts();
                                    echo $buildAlerts->buildAlerts();
                                    ?>
                                </div>
                            </div>
                            <div id="contentArea"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="addNewItemController.js"></script>
</body>
</html>

