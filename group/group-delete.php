<?php session_start();

//$userId = $_GET["userId"];
include("../includes/db-config.php");

$tripId = $_GET['tripId'];
$userId = $_GET['userId'];

var_dump($tripId);

?>

<h1> Are you sure you want to delete the following member? </h1>

<?php

// $userdata = $pdo->prepare("SELECT `users`.`fullName`, `users`.`userId` FROM `users`, `users-groups` WHERE `users-groups`.`userId` = '$userId' ");
// $userdata->execute();
//
// $row2 = $userdata->fetch();
//
// var_dump($row2);
//
// while($row2 = $userdata->fetch()) {
//
//   echo("<br>");
//   echo($row2["fullName"]);
// 	echo($row2["userId"]);
//   //echo($row2["userId"]);
//   echo("<br>");
//
// }

?>

<form action="group-delete-process.php" method="POST">
	<input type="hidden" name="userId"
	value="<?php echo($userId); ?>" >

    <input type="hidden" name='tripId'
	value="<?php echo($tripId); ?>" >

	<input type="submit" value="CONFIRM DELETE"/>
</form>
