<?php session_start();

include("../includes/db-config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Tripstr</title>
</head>
<body>

    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
    <div class="container">
        <h1>Create a Trip</h1>

		
        <img class="logo" src="../img/tripstr-logo.png">
       



            <div class="half">
                <button class="button" onclick="window.location.href = 'create-trip.php';">CREATE A TRIP</button>
            </div>

            <div class="half">
                <button class="button blueborder" onclick="window.location.href = 'login.php';">LOGIN</button>
            <div>


    </div>
</main>
	</body>
</html>