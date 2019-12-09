<?php session_start();

include("../includes/db-config.php");
// $_SESSION['tripName']['destination']['fromDate']['toDate']['type'];

if (isset($_POST['submit'])) { 
    $_SESSION['tripName'] = $_POST['tripName'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['fromDate'] = $_POST['fromDate'];
    $_SESSION['toDate'] = $_POST['toDate'];
    // $_SESSION['type'] = $_POST['type'];
    } 

// $tripName = $_POST['tripName'];
// $destination = $_POST['destination'];
// $fromDate = $_POST['fromDate'];
// $toDate = $_POST['toDate'];
// $type = $_POST['type'];
// var_dump($_POST);
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

    <!-- <header>
        <div class="title">
                <a class="inline back" href="create-trip.php"><i class="material-icons">arrow_back</i></a> 
                <h2 class="inline">Create a Trip</h2>
            </div>
    </header> -->
    <main>
        <div class="container">
            <!-- <h1>Create a Trip</h1> -->

                <div class="box">

                    <h2>Awesome!</h2>
                    <p>You're one step closer to creating your trip. Please register or login so you can view and edit your upcoming trip. </p>

                    <!-- <a  href="onboarding-login.php" class="button">Login</a> -->
                    <div class="login">
                        <button class="button" onclick="window.location.href = 'onboarding-login.php';">LOGIN</button>
                    </div>

                    <div class="register">
                        <button class="button blueborder" onclick="window.location.href = 'onboarding-register.php';">REGISTER</button>
                    <div>
                </div>
        </div>

</html>