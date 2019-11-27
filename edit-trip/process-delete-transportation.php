<?php 
include("../includes/session.php");

    if(isset($_SESSION['userId'])) {
        
        $transId = $_GET['transId'];

        include("../includes/db-config.php");

        $stmt = $pdo->prepare("DELETE FROM `accommodations` WHERE `accommodations`.`transId` = '$transId'");
        $stmt->execute();

        // header("Location: edit-accommodation.php?transId=$transId");
    }
?>