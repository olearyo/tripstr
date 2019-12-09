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
    <title>Login</title>
</head>
<body>

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
        <!-- <h1>Login</h1> -->
        <div class="form-container">
		<header>
        <div class="title">
            <a class="inline back" href="onboarding.php"><i class="material-icons">arrow_back</i></a> 
            <h2 class="inline head">Login</h2>
        </div>
        </header>
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
           			<input class="button blueborder" type="submit" name="submit" value="login" />
        		</div>

			</form>
		</div>
	</div>
	</body>
</html>
