<?php
$userId = 2;
$uniqueId = $_POST['uniqueId'];
$tripId = $_POST['tripId'];
//BRING TRIP ID OVER

include("../includes/db-config.php");

$userpin = $pdo->prepare("SELECT count(userId) FROM `trips` WHERE `userId` = $userId AND `uniqueId` = '$uniqueId' ");
$userpin->execute();
$row = $userpin->fetch();

// var_dump($row);
echo($row["count(userId)"]);
if($row["count(userId)"] == 1) {
	// pin matches then insert into users-groups
	$stmt = $pdo->prepare("INSERT INTO `users-groups`
		(`userId`, `tripId`)
		VALUES ('$userId', '$tripId');");

	$stmt->execute();
}
// Place User information in the table


echo("Thank you for submitting the form!");

?>
