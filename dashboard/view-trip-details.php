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

	<body class="grey">
		<div class="container ">
			<div class="box-wide-outer">
            	<div class="form-container">
					<div class="form-input half">
						<h1 id="tripName"></h1><br>
						<h2 id="tripDest"></h2><br>
					</div>
					
					<label>Stays</label>
					<div class="box-wide-inside" id="accoContent">
						<!-- <div class="form-input half">
							<label>Stays:</label> 
								<p class="acco-name"></p>
						</div>

						<div class="form-input half">
							<label>Address:</label>
								<p class="acco-address"></p>
						</div>

						<div class="form-input half">
							<label>Booking ID:</label>
								<p class="acco-bookingId"></p>
						</div>

						<div class="form-input half">
							<label>Check In Date: </label>
								<p class="acco-checkIn"></p>
						</div>
						<p class="acco-checkOut"></p>
						<p class="acco-others"></p> -->
					</div>

					<label>Events</label>
					<div class="box-wide-inside" id="eventsContent">
						<!-- <p id="event-name"></p>
						<p id="event-address"></p>
						<p id="event-checkIn"></p>
						<p id="event-others"></p> -->
					</div>

					<label>Transportation</label>
					<div class="box-wide-inside" id="transContent">
						<!-- <p class="trans-name"></p>
						<p class="trans-bookingId"></p>
						<p class="trans-checkIn"></p>
						<p class="trans-checkOut"></p>
						<p class="trans-departure"></p> <br>
						<p class="trans-arrival"></p> <br>
						<p class="trans-others"></p> -->
					</div> 
					
					<label>Others</label>
					<div class="box-wide-inside" id="othersContent">
						<!-- <p id="others-name"></p>
						<p id="others-checkIn"></p>
						<p id="others-other"></p> -->
					</div>

					<label>Docs</label>
					<div class="box-wide-inside" id="filesContent">
						<!-- <p class="file-name"></p>
						<p class="files-path"></p> -->
					</div> 
				</div>
			</div>
		</div>
	</body>
</html>