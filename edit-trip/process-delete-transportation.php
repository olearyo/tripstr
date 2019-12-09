<?php 
include("../includes/session.php");

    if(isset($_SESSION['userId'])) {
        
        $transId = $_GET['transId'];

        include("../includes/db-config.php");

        $stmt = $pdo->prepare("DELETE FROM `transportation` WHERE `transportation`.`transId` = '$transId'");
        $stmt->execute();

        header("Location: ../dashboard/show-trips-dashboard.php");


        // header("Location: edit-accommodation.php?transId=$transId");
    }
?>