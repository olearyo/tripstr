<?php session_start();

//$userId = $_GET["userId"];
include("../includes/db-config.php");

$tripId = $_GET['tripId'];
$userId = $_GET['userId'];

?>
<html>
<head>
<title>Delete Member</title>
<link rel="stylesheet" href="../css/base-css.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>

<div class="container">
	<div class="box">
<h2> Are you sure you want to delete? </h2>



<form action="group-delete-process.php" method="POST">
	<input type="hidden" name="userId"
	value="<?php echo($userId); ?>" >

    <input type="hidden" name='tripId'
	value="<?php echo($tripId); ?>" >

	<input type="submit" value="CONFIRM DELETE" class="button"/>
</form>
</div>
</div>
</body>
</html>
