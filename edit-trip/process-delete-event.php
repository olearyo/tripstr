<?php 
include("../includes/session.php");

    if(isset($_SESSION['userId'])) {
        
        $eventId = $_GET['eventId'];

        include("../includes/db-config.php");

        $stmt = $pdo->prepare("DELETE FROM `events` WHERE `events`.`eventId` = '$eventId'");
        $stmt->execute();

        header("Location: ../dashboard/show-trips-dashboard.php");
    }
?>