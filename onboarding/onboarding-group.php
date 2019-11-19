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

        <h2 class="code"><?php if($_GET and $_GET['gid']){echo $_GET['gid'];}?></h2>
    </div>


