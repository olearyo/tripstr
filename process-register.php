<?php session_start();

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];


include("includes/db-config.php");

$stmt = $pdo->prepare("INSERT INTO `users` 
	(`userId`, `fullName`, `email`, `password`) 
	VALUES (NULL, '$fullName', '$email', '$password');");

$row = $stmt->execute();

if ($row){
	// header("Location: home.php");
}else{
	echo "something went wrong, please try again.";
}



?>

