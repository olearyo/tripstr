<?php 
    $accoId = $_POST['accoId'];
    $accoName = $_POST['accoName'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $address = $_POST['address'];
    $bookingId = $_POST['bookingId'];
    $others = $_POST['others'];

    include("../includes/db-config.php");

    $stmt = $pdo->prepare("UPDATE `accommodations` SET `accoName` = '$accoName',
        `checkIn` = '$checkIn',
        `checkOut` = '$checkOut',
        `address` = '$address',
        `bookingId` = '$bookingId',
        `others` = '$others' WHERE `accommodations`.`accoId` = '$accoId'");
    $stmt->execute();

    header("Location: edit-accommodation.php?accoId=$accoId");
?>