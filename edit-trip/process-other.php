<?php
include("../includes/session.php");

if(isset($_SESSION['userId'])) {

    $otherId = $_POST['otherId'];
    $tripId = $_POST['tripId'];
    $otherName = $_POST['otherName'];
    $checkIn = $_POST['checkIn'];
    $others = $_POST['others'];
    
    include("../includes/db-config.php");

    $isEdit = false;

    if(isset($_POST['otherId']) && isset($_POST['tripId'])) {

        $stmt = $pdo->prepare("SELECT * FROM `others` WHERE `otherId` = '$otherId' AND `tripId` = '$tripId'");
        $stmt->execute();
        $count = $stmt->rowCount();
        // Check if there is any exiting record with above mentioned trip and user IDs
        if($count > 0){
            $isEdit = true;
        }
    }

    if($isEdit){
        $stmt = $pdo->prepare("UPDATE `others` SET `name` = '$otherName',
            `checkIn` = '$checkIn',
            `others` = '$others' WHERE `others`.`otherId` = '$otherId'");
        $stmt->execute();
    } else {
        $stmtNew = $pdo->prepare("INSERT INTO `others` 
            (`otherId`, `tripId`, `name`, `checkIn`, `others`) 
            VALUES (NULL, '$tripId', '$otherName', '$checkIn', '$others');");
        $stmtNew->execute();
    }

    

    // Once dashboard is done redirect to dashboard
    header("Location: edit-eventportation.php?otherId=$otherId&tripId=$tripId");
} else {
    echo("Please login to access this page");
}
?>