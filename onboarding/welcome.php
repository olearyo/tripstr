<?php session_start();

include("../includes/db-config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Create a Trip</title>
</head>
<body>

    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
        <div class="container">
            <h1>Welcome</h1>

                <div class="box">
                    <div class="generic-img"></div>
                    <h2>You've created a trip!</h2>
                    <p>You'll be able to add and edit your trip by viewing it on your dashboard</p>


                    <div class="register">
                        <button class="button" onclick="window.location.href = 'show-trips-dashboard.php';">LETS GO</button>
                    <div>
                </div>
        </div>

</html>