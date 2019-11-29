<?php session_start();

include("../includes/db-config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Unique Group Code</title>
</head>
<body>

    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
        
    <div class="container">
        <h1>Create a Trip</h1>

        <div class="radial">
            <div class="code">
                <h1>
                    <?php 
                    // if($_GET and $_GET['gid']){echo $_GET['gid'];}
                    // ?> 
                3156
                </h1>
            </div>
            <div class="info">
                <h2>Here is your unique group code</h2>
                <p>You'll need it later on to add group members to your trip</p>
                    <div class="login">
                        <button class="button" onclick="window.location.href = 'welcome.php';">CONTINUE</button>
                    </div>
            </div>

        </div>

    </div>


