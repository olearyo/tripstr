<?php session_start();

// ADD TO RECIEVE TRIP ID FOR THE USER
$tripId = $_GET['tripId'];
//$_GET['tripId'];
$userId = $_GET['userId'];

include("../includes/db-config.php");

?>
<html>
<head>
<title>Group Add</title>
<link rel="stylesheet" href="../css/base-css.css">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<div class="container">
<div class="box">

<h1> ADD GROUP MEMBER</h1>

<form action="group-add-process.php" method="POST">
		<p> Input ID</p>
	 <input name="uniqueId" type="text" >
	 <input name="tripId" type="hidden" value="<?php echo($tripId); ?>" >
  <br>
  <br>
	<input type="submit" value="Join" class="button"/>
</form>
</div>
</div>

</html>
