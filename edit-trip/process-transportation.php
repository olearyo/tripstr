<?php
include("../includes/session.php");

if(isset($_SESSION['userId'])) {

    $transId = $_POST['transId'];
    $tripId = $_POST['tripId'];
    $transName = $_POST['transName'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $bookingId = $_POST['bookingId'];
    $others = $_POST['others'];

    include("../includes/db-config.php");

    $isEdit = false;

    if(isset($_POST['transId']) && isset($_POST['tripId'])) {

        $stmt = $pdo->prepare("SELECT * FROM `transportation` WHERE `transId` = '$transId' AND `tripId` = '$tripId'");
        $stmt->execute();
        $count = $stmt->rowCount();
        // Check if there is any exiting record with above mentioned trip and user IDs
        if($count > 0){
            $isEdit = true;
        }
    }

    if($isEdit){
        $stmt = $pdo->prepare("UPDATE `transportation` SET `name` = '$transName',
            `departure` = '$departure',
            `arrival` = '$arrival',
            `checkIn` = '$checkIn',
            `checkOut` = '$checkOut',
            `bookingId` = '$bookingId',
            `others` = '$others' WHERE `transportation`.`transId` = '$transId'");
        $stmt->execute();
    } else {
        $stmtNew = $pdo->prepare("INSERT INTO `transportation` 
            (`transId`, `tripId`, `name`, `departure`, `arrival`, `checkIn`, `checkOut`, `bookingId`, `others`) 
            VALUES (NULL, '$tripId', '$transName', '$departure','$arrival', '$checkIn', '$checkOut', '$bookingId', '$others');");
        $stmtNew->execute();
    }

    

    // Once dashboard is done redirect to dashboard
    header("Location: edit-transportation.php?transId=$transId&tripId=$tripId");
} else {
    echo("Please login to access this page");
}
?>