<?php 
include("../includes/db-config.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Logout</title>
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
        <h1>Logout</h1>
        <div class="form-container">
			<p>Are you sure you want to log out?</p>
                        <button class="button" onclick="window.location.href = 'process-logout.php';">LOG OUT</button>
                    </div>


			</form>
		</div>
	</div>
	</body>
</html>
