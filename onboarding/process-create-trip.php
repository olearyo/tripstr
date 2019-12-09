<?php session_start();

include("../includes/db-config.php");

$tripName = $_POST['tripName'];
$destination = $_POST['destination'];
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];



$stmt = $pdo->prepare("INSERT INTO `trips` 
	(`tripName`, `destination`, `fromDate`, `toDate`, `type`) 
	VALUES (?, ?, ?, ?, ?)");

$stmt->execute([$tripName, $destination, $fromDate, $toDate, $type]);



// $_SESSION['tripName']['destination']['fromDate']['toDate']['type'];


// header("Location: onboarding.php"); 


?>


