<?php session_start();

// ADD TO RECIEVE TRIP ID FOR THE USER

$tripId = 2;
//$_GET['tripId'];
$userId = 1; //Temporary previously = NULL;

include("../includes/db-config.php");

// change user id to work with users current userId instead of null.
//Previously count(userId) no $
$userTable = $pdo->prepare("SELECT count(userId) FROM `users-groups` GROUP BY `tripId` ");
$userTable->execute();
$row = $userTable->fetch();

echo($userId);

$userdata = $pdo->prepare("SELECT `users`.`fullName` FROM `users`, `users-groups` WHERE `users-groups`.`tripId` = '$tripId' ");
$userdata->execute();

$row2 = $userdata->fetch();

var_dump($row2);

?>

<h1> Groups <h1>

<?php

    //Displaying the amount of group members with the same TripId.
    $groupTotal = $row[0];
    echo("<h2>");
    echo ("Total Group Members: ".$groupTotal);
    echo("</h2>");
?>

<h2> Current Group Members </h2>
