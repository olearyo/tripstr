<?php

include("../includes/db-config.php");
include("../includes/header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tripstr</title>
</head>
<body>

    <header>
        <div class="title">
            <img id="logo-home" src="../img/tripstr-logo.png">
                <p>Organize your trips...</p>
            </div>
    </header>


    <main>
    <div class="container">
        <!-- <h1>Create a Trip</h1> -->

		
       


        <div class="title">

                <button class="button" onclick="window.location.href = 'create-trip.php';">CREATE A TRIP</button>
                <button class="button blueborder" onclick="window.location.href = 'login.php';">LOGIN</button>

        </div>

    </div>
</main>
	</body>
</html>