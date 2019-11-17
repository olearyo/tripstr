<?php session_start();

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
    
    $stmt = $pdo->prepare("INSERT INTO `trips` 
	(`tripName`, `destination`, `fromDate`, `toDate`, `type`) 
	VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([$_SESSION['tripName'], $_SESSION['destination'], $_SESSION['fromDate'], $_SESSION['toDate'], $_SESSION['type']]);
}else{
	echo "something went wrong, please try again.";
}



?>

