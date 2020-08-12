<?php
session_start();
session_destroy();
session_start();
$rootpath = "../";
$pageTitle = "Login";


require_once ($rootpath . "Classes/LoaderMeta.php");
require_once ($rootpath . "Classes/LoaderStyle.php");
require_once ($rootpath . "Classes/LoaderJS.php");
require_once ($rootpath . "Classes/LoaderConfig.php");


//load configuration
$loadConfig = new LoaderConfig();
?>

    <!doctype html>
    <html lang="de">
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


    <div class="container-fluid">
        <!-- Main content area -->
        <div class="row mt-5">
            <div class="col-4 offset-4">
                <div class="card">
                    <div class="card-header">Login MyWebshop</div>
                    <div class="card-body">
                        <?php
                        require_once ($rootpath . "Classes/Alerts.php");
                        $buildAlerts = new Alerts();
                        $buildAlerts->buildAlerts();
                        ?>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Email" id="ip_email">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input type="password" class="form-control" placeholder="Password" id="ip_password">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block" onclick="login()">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end main content area -->
    </div>
    </body>
    </html>

    <script src="loginController.js" type="text/javascript"></script>
