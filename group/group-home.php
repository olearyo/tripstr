<?php session_start();

// ADD TO RECIEVE TRIP ID FOR THE USER
$tripId = $_GET['tripId'];
//$_GET['tripId'];
$userId = $_GET['userId'];

include("../includes/db-config.php");

//Recieving information for users with the same TripID.
$userTable = $pdo->prepare("SELECT count(userId) FROM `users-groups` GROUP BY `tripId` ");
$userTable->execute();
$row = $userTable->fetch();

//Recivieving info for the users fullname.

//GET USER ID TO SHOW AS WELL.
$userdata = $pdo->prepare("SELECT `users`.`fullName`,`users`.`userId` FROM `users`, `users-groups` WHERE `users-groups`.`tripId` = '$tripId' ");

// AND UserId
$userdata->execute();

$row2 = $userdata->fetch();

?>
<html>

<head>
<title> Groups </title>
<link rel="stylesheet" href="../css/base-css.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">
  <div class="box">
<h1> Groups <h1>

<?php

    //Displaying the amount of group members with the same TripId.
    $groupTotal = $row[0];
    echo("<h2>");
    echo ("Total Group Members: ".$groupTotal);
    echo("</h2>");
?>

<h2> Current Group Members </h2>

<?php
//Displaying All users NAMES with the same TripID
while($row2 = $userdata->fetch()) {
// make so only group members with a type of 1 show (use if statement?)
  echo("<br>");
	echo($row2["fullName"]);
?>

<a class="link" href="group-delete.php?userId=<?php echo($row2["userId"]); ?>">Delete</a>
<?php
}
 ?>

 <br>
 <br>
<button class="button" onclick="window.location.href='group-add.php'">Add member</button>
 <!-- <a class="button" href="group-add.php"> ADD MEMBER </a> -->
</div>
</div>
</body>
</html>









<!--<br>
<br>
 <a href="group-delete.php"> DELETE </a>
 <br>
 <a href="group-add.php"> ADD </a> -->
