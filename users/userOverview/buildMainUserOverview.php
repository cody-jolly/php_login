<?php
session_start();
$rootpath = "../../";

require_once ($rootpath . "Classes/LoaderConfig.php");
//load configuration
$loadConfig = new LoaderConfig();

require_once($rootpath . "Classes/Database.php");
$getUsers = new DatabaseOutput();
$getUsers->SETsqlInput("SELECT * FROM users_main WHERE status != 2 ORDER BY lastName;");
if($getUsers->GETrows() > 0) {
    // users found
    ?>
    <table class="table table-hover">
    <thead>
    <tr class="d-flex">
        <th class="col-1">Status</th>
        <th class="col-5">Name</th>
        <th class="col-4">Email</th>
        <th class="col-2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $counter = 0;
    $userIDs = array();
    while($userData = $getUsers->GETassoc())
    {
        $userID = $userData['userID'];
        $email = $userData['email'];
        $firstName = $userData['firstName'];
        $lastName = $userData['lastName'];
        $status = $userData['status'];

        ?>
        <tr class="d-flex">
            <td class="col-1">
                <?php
                if($status == 1)
                {
                    //OK
                    ?><i class="fas fa-fw fa-check"></i><?php
                }
                else
                {
                    //Locked Out
                    ?><i class="fas fa-fw fa-lock"></i><?php
                }
                ?>
            </td>
            <td class="col-5"><?php echo $lastName . ", " . $firstName ?></td>
            <td class="col-4"><?php echo $email ?></td>
            <td class="col-1"><button class="btn btn-secondary btn-block" onclick="editUser(<?= $counter ?>)"><i class="fas fa-fw fa-edit"></i></button></td>
            <td class="col-1"><button class="btn btn-danger btn-block" onclick="deleteUser(<?= $counter ?>)"><i class="fas fa-fw fa-trash"></i></button></td>
        </tr>
    <?php
        $counter += 1;
        array_push($userIDs, $userID);
    }

    $_SESSION['transport_userIDs'] = $userIDs;
} else {
    // no users found
    echo 'no users found!?!';
}
?>