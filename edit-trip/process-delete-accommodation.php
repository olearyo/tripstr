<?php 
    $accoId = $_GET['accoId'];

    include("../includes/db-config.php");

    $stmt = $pdo->prepare("DELETE FROM `accommodations` WHERE `accommodations`.`accoId` = '$accoId'");
    $stmt->execute();

    // header("Location: edit-accommodation.php?accoId=$accoId");
?>