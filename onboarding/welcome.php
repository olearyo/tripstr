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
            <!-- <h1>Welcome</h1> -->

                <div class="box">
                    <img src="../img/barcelona.png" class="generic">
                    <h2>You've created a trip!</h2>
                    <p>You'll be able to add and edit your trip by viewing it on your dashboard</p>


                    <div class="register">
                        <a href="../dashboard/show-trips-dashboard.php"><button class="button blueborder">LETS GO</button></a>
                    <div>
                </div>
        </div>

</html>