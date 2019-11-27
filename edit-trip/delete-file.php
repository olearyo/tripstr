<?php
include("../includes/session.php");

if(isset($_SESSION['userId'])) {

    $fileId = $_GET['fileId'];
    include("../includes/db-config.php");
    
    $stmt = $pdo->prepare("SELECT * FROM `files` WHERE `fileId` = '$fileId'");
    $stmt->execute();
    $row = $stmt->fetch(); 
    
    $file = $row['path'];
    
    if (!unlink($file)) {
        echo ("Error deleting $file");
    } else {
        echo ("Deleted $file");
        
        $stmtDel = $pdo->prepare("DELETE FROM `files` WHERE `files`.`fileId` = '$fileId'");
        $stmtDel->execute();
    }
}


?>