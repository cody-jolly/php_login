<?php
session_start();
$rootpath = '../../';
$pageTitle = 'Add New User';
require_once($rootpath . "Classes/LoaderMeta.php");
require_once($rootpath . "Classes/LoaderStyle.php");
require_once($rootpath . "Classes/LoaderJS.php");
require_once($rootpath . "Classes/SessionController.php");
require_once($rootpath . "Classes/Database.php");
require_once($rootpath . "Classes/Alerts.php");
require_once($rootpath . "Classes/LoaderConfig.php");
//load configuration
$loadConfig = new LoaderConfig();
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
    <div class="container-fluid px-0" id="content">
        <?php
        require_once($rootpath . "Classes/Navigation.php");
        $buildNav = new Navigation();
        $buildNav->buildNavigation($rootpath);
        ?>

        <!-- Main Content -->
        <div class="row mt-5">
            <div class="col-6 offset-3">
                <div class="card">
                    <h1 class="text-center card-header">Let's add some users!!!</h1>
                    <div class="card-body">
                        <?php
                        $buildAlerts = new Alerts();
                        $buildAlerts->buildAlerts();
                        ?>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="repeatPassword">Repeat Password</label>
                            <input type="password" class="form-control" id="repeatPassword" placeholder="Repeat Password">
                            <p class="text-danger d-none" id="passwordWarning">Passwords do not Match!!!</p>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="termsPrivacy">
                            <label class="form-check-label" for="termsPrivacy">I'm down with the terms and conditions, and privacy policy!</label>
                            <div class="col-12 d-none" id="termsPrivacyWarning">
                                <span class="text-danger font-italic">Please agree to our terms and conditions, and privacy policy!!!</span>
                            </div>
                        </div>
                        <button class="btn btn-dark mt-5 px-2" id="addUserButton">Add User</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="addNewUser.js"></script>
</body>
</html>