<?php 
ob_start();
session_start();
include("../includes/db-config.php");
include("../includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>

    <header>
        <!-- TOP NAVIGATION -->
    </header>
<?php


$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];


include("../includes/db-config.php");

$stmt = $pdo->prepare("INSERT INTO `users` 
	(`userId`, `fullName`, `email`, `password`) 
	VALUES (NULL, '$fullName', '$email', '$password');");

$row = $stmt->execute();

if ($row){
    // header("Location: home.php");
    $_SESSION['userId'] = $row['userId'];
	$_SESSION['fullName'] = $row['fullName'];
	$_SESSION['status'] = $row['status'];
	$userNewID= $pdo->lastInsertId();
	$_SESSION['userId'] = $userNewID;
	
	$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `userID` = ?");
	$stmt->execute([$_SESSION['userId']]);
	$userData= $stmt->fetchAll();
	$_SESSION['fullName'] = $userData[0]['fullName'];
	// var_dump($userData);
	// var_dump($userData);
    // $stmt = $pdo->prepare("INSERT INTO `trips` 
	// (`tripName`, `destination`, `fromDate`, `toDate`, `type`) 
	// VALUES (?, ?, ?, ?, ?)");

	// $stmt->execute([$_SESSION['tripName'], $_SESSION['destination'], $_SESSION['fromDate'], $_SESSION['toDate'], $_SESSION['type']]);
	
	// if($_SESSION['type'] == 1){  //GROUP
	// 	$randomNum = rand(1000,5000); 
	// 	$stmt = $pdo->prepare("SELECT * FROM `trips` 
	// 		WHERE `uniqueId` = ?");
	// 	$stmt->execute([$randomNum]);
	// 	$row = $stmt->fetchAll();
	// 	while ($stmt->rowCount() > 0){
	// 		$randomNum = rand(1000,5000); 
	// 	}
	

	
	// 	$stmt = $pdo->prepare("INSERT INTO `trips` 
	// 	(`userId`, `tripName`, `destination`, `fromDate`, `toDate`, `type`, `uniqueId`) 
	// 	VALUES (?, ?, ?, ?, ?, ?, ?)");
	
	// 	$stmt->execute([$userNewID, $_SESSION['tripName'], $_SESSION['destination'], $_SESSION['fromDate'], $_SESSION['toDate'], $_SESSION['type'], $randomNum]);
		

	// 	if($stmt->rowCount() ==1 ){
	// 		header("Location: onboarding-group.php?gid=".$randomNum);
	// 	}

	// }elseif($_SESSION['type'] == 0){

    $stmt = $pdo->prepare("INSERT INTO `trips` 
	(`userId`, `tripName`, `destination`, `fromDate`, `toDate`) 
	VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$userNewID, $_SESSION['tripName'], $_SESSION['destination'], $_SESSION['fromDate'], $_SESSION['toDate']]);

	header("Location: welcome.php");


}else{
	echo "something went wrong, please try again.";
}

		


?>

