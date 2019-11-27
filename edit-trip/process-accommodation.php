<?php 
    $accoId = $_POST['accoId'];
    $tripId = $_POST['tripId'];
    $accoName = $_POST['accoName'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $address = $_POST['address'];
    $bookingId = $_POST['bookingId'];
    $others = $_POST['others'];

    include("../includes/db-config.php");

    $isEdit = false;

    if(isset($_GET['accoId'])) {
        $accoId = $_GET["accoId"]; 

        $stmt = $pdo->prepare("SELECT * FROM `accommodations` WHERE `accoId` = '$accoId' AND `tripId` = '$tripId'");
        $stmt->execute();
        $count = $stmt->rowCount();
        // Check if there is any exiting record with above mentioned trip and user IDs
        if($count > 0){
            $isEdit = true;
        }
    }

    if($isEdit){
        $stmt = $pdo->prepare("UPDATE `accommodations` SET `accoName` = '$accoName',
            `checkIn` = '$checkIn',
            `checkOut` = '$checkOut',
            `address` = '$address',
            `bookingId` = '$bookingId',
            `others` = '$others' WHERE `accommodations`.`accoId` = '$accoId'");
        $stmt->execute();
    } else {
        $stmtNew = $pdo->prepare("INSERT INTO `accommodations` 
            (`accoId`, `tripId`, `accoName`, `checkIn`, `checkOut`, `bookingId`, `address`, `others`) 
            VALUES (NULL, '$tripId', '$accoName', '$checkIn', '$checkOut', '$bookingId', '$address', '$others');");
        $stmtNew->execute();
    }

    

    // Once dashboard is done redirect to dashboard
    header("Location: edit-accommodation.php?accoId=$accoId");
?>