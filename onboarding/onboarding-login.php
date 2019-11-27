<?php session_start();
include("../includes/db-config.php");

// var_dump($_SESSION);

// if($_POST && $_POST['submit']){
// 	$errors =array();
// 	$email = $_POST['email'];
// 	$password = $_POST['password'];

// 	if(empty($password) or empty($email)){
// 		$errors['empty'] = "Please enter an email and password";
// 	}


// 	if(empty($errors)){
		
// 	}

// }

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
    <main>
    <div class="container">
		<div style="color:'red';">
		<?php 
		if (isset($errors)){
			foreach ($errors as $value){
				echo $value."\n";
			}
		}
		?>
		<div>
        <h1>Login</h1>
        <div class="form-container">
			<form action="process-onboarding-login.php" method="POST">

				<div class="form-input">
					<label for="email">Email</label>
					<input id="email" type="text" name="email"/>
					</div>

				<div class="form-input">
					<label for="password">Password</label>
					<input id="email" type="password" name="password"/>
				</div>

				<div class="form-input">
           			<input class="button" type="submit" name="submit" value="login" />
        		</div>

			</form>
		</div>
	</div>
	</body>
</html>
