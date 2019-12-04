<?php

include("../includes/session.php");
$tripId = $_GET['tripId'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your trip details</title>
		<link rel="stylesheet" href="../css/base-css.css"/>

		<script>var tripId = <?php echo($tripId); ?>;
			console.log(tripId)</script>
		<script src="view-trip-details.js"></script>
	</head>

	<body>
		
		<section id="tripDetails">
			<h1 id="tripName"></h1>
		</section>

		<section id="accommodation">
			<p id="par"></p>
		</section>

		<section id="events">
			<p id="eventName"></p>
		</section>

		<section id="transCont">
			
		</section>

		<section id="others">
			<p id="othersName"></p>
		</section>

	</body>
</html>