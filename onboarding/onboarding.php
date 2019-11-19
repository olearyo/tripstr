<?php session_start();

include("../includes/db-config.php");
// $_SESSION['tripName']['destination']['fromDate']['toDate']['type'];

if (isset($_POST['submit'])) { 
    $_SESSION['tripName'] = $_POST['tripName'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['fromDate'] = $_POST['fromDate'];
    $_SESSION['toDate'] = $_POST['toDate'];
    $_SESSION['type'] = $_POST['type'];
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

    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
        <div class="container">
            <h1>Create a Trip</h1>

                <div class="box">

                    <h2>Awesome!</h2>
                    <p>you're one step closer to creating your trip</p>

                    <p><a href="onboarding-register.php">Register</a>
                    <p><a href="onboarding-login.php">Login</a>     
                </div>
        </div>

</html>