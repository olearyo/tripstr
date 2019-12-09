<?php session_start();
ob_start();
?><html lang="en">
<head>
	<?php
	include("../includes/db-config.php");
    ?><title>Login</title>
</head>
<body>
<?php

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM `users` 
	WHERE `email` = '$email'
	AND `password` = '$password'
	");

$stmt->execute();

$row = $stmt->fetch();
if($stmt->rowCount()==1){
	$_SESSION['userId'] = $row['userId'];
	$_SESSION['fullName'] = $row['fullName'];
	header("Location:../dashboard/show-trips-dashboard.php");

}else{?><main>
			<div class="container">

				<h1>Login</h1>
				<p>You have entered an invalid username or password, please <a href="onboarding-login.php">try again</a></p>
			</div>
		</main><?php
}?>
