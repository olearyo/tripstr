<?php
include("../includes/session.php");

if(isset($_SESSION['userId'])) {

    $eventId = $_POST['eventId'];
    $tripId = $_POST['tripId'];
    $eventName = $_POST['eventName'];
    $checkIn = $_POST['checkIn'];
    $address = $_POST['address'];
    $others = $_POST['others'];

    include("../includes/db-config.php");

    $isEdit = false;

    if(isset($_POST['eventId']) && isset($_POST['tripId'])) {

        $stmt = $pdo->prepare("SELECT * FROM `events` WHERE `eventId` = '$eventId' AND `tripId` = '$tripId'");
        $stmt->execute();
        $count = $stmt->rowCount();
        // Check if there is any exiting record with above mentioned trip and user IDs
        if($count > 0){
            $isEdit = true;
        }
    }

    if($isEdit){
        $stmt = $pdo->prepare("UPDATE `events` SET `name` = '$eventName',
            `checkIn` = '$checkIn',
            `address` = '$address',
            `others` = '$others' WHERE `events`.`eventId` = '$eventId'");
        $stmt->execute();
    } else {
        $stmtNew = $pdo->prepare("INSERT INTO `events` 
            (`eventId`, `tripId`, `name`, `checkIn`, `address`, `others`) 
            VALUES (NULL, '$tripId', '$eventName', '$checkIn', '$address', '$others');");
        $stmtNew->execute();
    }

    

    // Once dashboard is done redirect to dashboard
    header("Location: edit-eventportation.php?eventId=$eventId&tripId=$tripId");
} else {
    echo("Please login to access this page");
}
?>