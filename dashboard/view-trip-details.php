<?php

$tripId = $_GET['tripId'];
$userId = NULL;

include("../includes/db-config.php");

$tripsTable = $pdo->prepare("SELECT * FROM `trips` WHERE `tripId` = '$tripId';");
$tripsTable -> execute();

$usgrTable = $pdo->prepare("SELECT * FROM `users-groups`;");
$usgrTable -> execute();

while($row = $tripsTable->fetch()) {

    echo('<div>');
    
    echo("<h3>");
    echo($row["tripName"]);
    echo("</h3>");
    
    //show group members count
    $usgrTable = $pdo->prepare("SELECT count(userId) FROM `users-groups`");
    $usgrTable->execute();
    $row3 = $usgrTable->fetch();

    $grpCount = $row3[0];
    echo ("Group members: " . $grpCount);
    
    echo("<br><br>");
    echo("Destination : ");
    echo($row["destination"]);
    echo("<br><br>");
    echo("From : ");
    echo($row["fromDate"]);
    echo(" | ");
    echo("To : ");
    echo($row["toDate"]);
    echo("<br><br>");
    
    echo("<a href=show-trips-dashboard.php> Back to Dashboard </a>");
    echo("<br><br>");
    
?>

<hr>

<?php
    echo('</div>');
} 
?>