<?php session_start();

// ADD TO RECIEVE TRIP ID FOR THE USER
$tripId = $_GET['tripId'];
$userId = $_SESSION['userId'];


//$_GET['tripId'];
// $userId = $_GET['userId'];

include("../includes/db-config.php");

//Recieving information for users with the same TripID.
$userTable = $pdo->prepare("SELECT COUNT(userId) as 'userNum' FROM `users-groups` WHERE `tripId` = '$tripId' "); 
$userTable->execute();
$userTable = $userTable->fetch();


//Recivieving info for the users fullname.

//GET USER ID TO SHOW AS WELL.
// $userdata = $pdo->prepare("SELECT `users`.`fullName`,`users`.`userId` FROM `users`, `users-groups` WHERE `users-groups`.`tripId` = '$tripId' ");
// $userdata = $pdo->prepare("SELECT `users-groups`.`userId`, `users`.`fullName` FROM `users-groups` INNER JOIN `users` ON `tripId` = '$tripId' ");
// $userdata = $pdo->prepare("SELECT `users-groups`.`userId`, `users`.`fullName` FROM `users` INNER JOIN `users-groups` ON `users-groups`.`tripId` = '$tripId' GROUP BY `userId`");


// var_dump($userdata);

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
    // $groupTotal = $row[0];  
    echo("<h2>");
    echo ("Members:" . $userTable['userNum']);
    echo("</h2>");
?>

<h2> Current Group Members </h2>

<?php
$userdata = $pdo->prepare("SELECT * FROM `users-groups`, `users` WHERE( `users`.`userId` = `users-groups`.`userId`) AND `tripId` = '$tripId' ");
$userdata->execute();
while($userList = $userdata->fetch()) {

// make so only group members with a type of 1 show (use if statement?)
  echo("<br>");
  echo($userList["fullName"]);
  echo($userList["userId"]);
?>

<a class="link" href="group-delete.php?userId=<?php echo($userList["userId"]); ?>&tripId=<?php echo($tripId); ?>">Delete</a>
<?php
}
 ?>

 <br>
 <br>
 <a class="link" href="group-add.php?userId=<?php echo($userList["userId"]); ?>&tripId=<?php echo($tripId); ?>"><button class="button" >Add member</button></a>
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
