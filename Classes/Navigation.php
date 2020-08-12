<?php

class Navigation {
    public function buildNavigation($rootpath)
    {
        ?>
        <!-- Top Navigation -->
        <!-- Adapted from https://getbootstrap.com/ -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="<?= $rootpath . "dashboard/dashboard.php" ?>">myWebshop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" id="nav1">
                        <a class="nav-link" href="<?php echo $rootpath . "dashboard/dashboard.php"; ?>">Dashboard<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-light" id="nav2" href="<?php echo $rootpath . "users/addUser/add-new-user.php"; ?>">Add New User</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-light" id="nav3" href="<?php echo $rootpath . "users/userOverview/user-overview.php"; ?>">User Overview</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Items
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-light" id="nav4" href="<?php echo $rootpath . "items/add-new-item.php"; ?>">Add Item</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-light" id="nav5" href="<?php echo $rootpath . "users/userOverview/user-overview.php"; ?>" disabled>Item Overview</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="http://127.0.0.1/myWebshop/login/login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
           if($('title').text() == 'Dashboard') {
               $('#nav1').addClass('active');
           } else if ($('title').text() == 'Add New User') {
               $('#nav2').addClass('active');
           } else if ($('title').text() == 'User Overview') {
               $('#nav3').addClass('active');
           } else if ($('title').text() == 'Add New Item') {
               $('#nav4').addClass('active');
           }
        </script>
        <?php
    }
}
?>