<?php 
include("../includes/db-config.php");


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

	<header>

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
        <!-- <h1>Login</h1> -->
        <div class="form-container">

		<header>
        <div class="title">
            <a class="inline back" href="home.php"><i class="material-icons">arrow_back</i></a> 
            <h2 class="inline head">Login</h2>
        </div>
        </header>
			<form action="process-login.php" method="POST">

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
