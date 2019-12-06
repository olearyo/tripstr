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
		
		<section id="tripHeader">
			<h1 id="tripName"></h1>
			<h2 id="tripDest"></h2>

		<section id="accoContent">
			<p class="acco-name"></p>
			<p class="acco-address"></p>
			<p class="acco-bookingId"></p>
			<p class="acco-checkIn"></p>
			<p class="acco-checkOut"></p>
			<p class="acco-others"></p>
		</section>

		<hr>

		<section id="eventsContent">
			<p id="event-name"></p>
			<p id="event-address"></p>
			<p id="event-checkIn"></p>
			<p id="event-others"></p>
		</section>

		<hr>

		<section id="transContent">
			<p class="trans-name"></p>
			<p class="trans-bookingId"></p>
			<p class="trans-checkIn"></p>
			<p class="trans-checkOut"></p>
			<p class="trans-departure"></p> <br>
			<p class="trans-arrival"></p> <br>
			<p class="trans-others"></p>
		</section> 

		<hr>

		<section id="othersContent">
			<p id="others-name"></p>
			<p id="others-checkIn"></p>
			<p id="others-other"></p>
		</section>

		<hr>

		<section id="filesContent">
			<p class="file-name"></p>
			<p class="files-path"></p>
		</section> 

		</section>
	</body>
</html>