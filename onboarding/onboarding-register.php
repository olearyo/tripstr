<?php session_start();
include("../includes/db-config.php");

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
        <h1>Register</h1>
        <div class="form-container">
			<form action="process-onboarding-register.php" method="POST">

				<div class="form-input">
				<label for="fullName">Full Name</label>
					<input id="fullName" type="text" name="fullName" required />
				</div>

				<div class="form-input">
				<label for="email">Email</label>
					<input id="email" type="email" name="email" required />
				</div>

				
				<div class="form-input">
				<label for="password">Password</label>
					<input id="password" type="password" name="password" required />
				</div>

				<div class="form-input">
           			<input class="button" type="submit" name="submit" value="register"/>
        		</div>

			</form>
		</div>
	</div>
	</body>
</html>

