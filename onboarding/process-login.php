<?php session_start();
//process-login.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Register</title>
</head>
<body>

    <header>
        <!-- TOP NAVIGATION -->
    </header>
<?php

$email = $_POST['email'];
$password = $_POST['password'];

include("../includes/db-config.php");


$stmt = $pdo->prepare("SELECT * FROM `users` 
	WHERE `email` = '$email'
	AND `password` = '$password'
	");

$stmt->execute();

$row = $stmt->fetch();
if($stmt->rowCount()==1){
	// header("Location: dashboard.php");
	$_SESSION['userId'] = $row['userId'];
	$_SESSION['fullName'] = $row['fullName'];
	$_SESSION['status'] = $row['status'];

    header("Location: ../dashboard/show-trips-dashboard.php");


}else{
	?>
		<main>
			<div class="container">

				<h1>Login</h1>
				<p>You have entered an invalid username or password, please <a href="onboarding-login.php">try again</a></p>
			</div>
		</main>

<?php
}

?>