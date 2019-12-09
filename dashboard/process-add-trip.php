<?php 
ob_start();
session_start();
?>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    include("../includes/db-config.php");
    ?>
    <title>Add Trip</title>
</head>
<?php

$tripName = $_POST['tripName'];
$destination = $_POST['destination'];
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];


$stmt = $pdo->prepare("INSERT INTO `trips` 
	(`userId`, `tripName`, `destination`, `fromDate`, `toDate`) 
	VALUES (?, ?, ?, ?, ?)");

$stmt->execute([$_SESSION['userId'], $tripName, $destination, $fromDate, $toDate]);
	if($stmt->rowCount() ==1 ){
		header("Location: ../dashboard/show-trips-dashboard.php");
    }else{?>
		<main>
			<div class="container">

				<h1>Add a Trip</h1>
				<p>Sorry, something went wrong! Please <a href="add-trip.php">try again</a></p>
			</div>
		</main>

<?php
}
    

?>