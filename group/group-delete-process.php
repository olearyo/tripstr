<?php
//process-delete.php


$userId = $_POST["userId"];
$tripId = $_POST["tripId"];

//delete a record from the database
include("../includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `users-groups` WHERE `userId` = '$userId' AND `tripId` = '$tripId'");

$stmt->execute();

?>
