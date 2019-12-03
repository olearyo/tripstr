<?php
//process-delete.php


$userId = $_GET["userId"];
$tripId = $_GET["tripId"];

//delete a record from the database
include("../includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `users-groups` WHERE `userId` = '$userId' AND `tripId` = '$tripId'");

$stmt->execute();

?>
