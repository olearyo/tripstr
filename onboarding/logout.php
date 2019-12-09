<?php 
include("../includes/db-config.php");


?>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Logout</title>
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
        <div class="form-container">
        <header>
        <div class="title">
            <a class="inline back" href="../dashboard/show-trips-dashboard.php"><i class="material-icons">arrow_back</i></a> 
            <h2 class="inline head">Logout</h2>
        </div>
        </header>
			<p>Are you sure you want to log out?</p>
                        <button class="button" onclick="window.location.href = 'process-logout.php';">LOG OUT</button>
                    </div>


			</form>
		</div>
	</div>
	</body>
</html>
