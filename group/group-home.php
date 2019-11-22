<?php session_start();

// ADD TO RECIEVE TRIP ID FOR THE USER
$tripId = 2;
//$_GET['tripId'];
$userId = 1;

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


//	if($_SESSION['type'] == 1){} USE FOR WHEN USER HAS A GROUP
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

<?php
//Displaying All users NAMES with the same TripID
while($row2 = $userdata->fetch()) {
// make so only group members with a type of 1 show (use if statement?)
  echo("<br>");
	echo($row2["fullName"]);
    echo($row2["userId"]);
?>

<a href="group-delete.php?userId=<?php echo($row2["userId"]); ?>">Delete</a>
<?php
}
 ?>

 <br>
 <br>

 <a href="group-add.php"> ADD MEMBER </a>









<!--<br>
<br>
 <a href="group-delete.php"> DELETE </a>
 <br>
 <a href="group-add.php"> ADD </a> -->
