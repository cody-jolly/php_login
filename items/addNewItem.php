<?php
session_start();
$rootpath = "../";

require_once ("../Classes/Database.php");
$esc = new Database();
$func = $esc->escape($_POST['func']);

echo $func($rootpath);

function addNewItemInfo($rootpath)
{
    $addItem = new DatabaseInput();

    $itemName = $addItem->escape($_POST['itemName']);
    $itemNumber = $addItem->escape($_POST['itemNumber']);
    $description = $addItem->escape($_POST['description']);
    $mass = $addItem->escape($_POST['massWidth'] . ' x ' . $_POST['massHeight'] . ' x ' . $_POST['massDepth']);
    $weight = $addItem->escape($_POST['weight']);
    $status = $addItem->escape($_POST['status']);
    $itemGroup = intval($addItem->escape($_POST['itemGroup']));

    //INSERT INTO article_main
    $addItem->SETsqlInput("INSERT INTO items_main (itemName, itemNumber, description, mass, weight, status, itemGroup)
                                    VALUES ('$itemName', '$itemNumber', '$description', '$mass', '$weight', '$status', '$itemGroup');");

    if($addItem->GETexecute()==1)
    {
        //Item info added
        //log and feedback
        require_once ($rootpath . "Classes/Logger.php");
        $logger = new Logger();
        $logger->log($rootpath, "item information added");

        $feedback = json_encode(array(1, md5(uniqid())));
        return $feedback;
    }
    else
    {
        error_log($addItem->GETerror());
        $feedback = json_encode(array(0));
        return $feedback;
    }
}

