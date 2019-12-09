<?php

include("../includes/session.php");
include("../includes/logo.php");
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
		<a class="delete" href="../dashboard/show-trips-dashboard.php">Back to your Trips</a>
			<div class="box-wide-outer">
            	<div class="form-container">
					<div class="form-input half">
						<h1 id="tripName"></h1><br>
						<h2 id="tripDest"></h2><br>
					</div>

					<h1 class="categoryHeaders">Dates:</h1>
					<div class="form-inputInline">
						<p id="fromDate" class="tripDates"></p> <p id="toDate" class="tripDates"> to </p>
					</div>
					
					<h1 class="categoryHeaders">Stays</h1>
					<a href="../edit-trip/edit-accommodation.php?tripId=<?php echo($tripId); ?>" class="addLinks">Add Accomodation</a>
					<div class="box-wide-inside" id="accoContent"></div>

					<h1 class="categoryHeaders">Events</h1>
					<a href="../edit-trip/edit-events.php?tripId=<?php echo($tripId); ?>" class="addLinks">Add Event</a>
					<div class="box-wide-inside" id="eventsContent">
					</div>

					<h1 class="categoryHeaders">Transportation</h1>
					<a href="../edit-trip/edit-transportation.php?tripId=<?php echo($tripId); ?>" class="addLinks">Add Transportation</a>
					<div class="box-wide-inside" id="transContent">
					</div> 
					
					<h1 class="categoryHeaders">Others</h1>
					<div class="box-wide-inside" id="othersContent">
					</div>

					<h1 class="categoryHeaders">Docs</h1>
					<div class="box-wide-inside" id="filesContent">
					</div> 
				</div>
			</div>
		</div>
	</body>
</html>