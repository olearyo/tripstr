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

					<div class="form-input inline">
						<p id="fromDate"></h1> to <p id="toDate"></p>
					</div>
					
					<label>Stays</label>
					<div class="box-wide-inside" id="accoContent">
						<a id="editAcco" href="">Edit Accommodation</a>
					</div>

					<label>Events</label>
					<div class="box-wide-inside" id="eventsContent">
					</div>

					<label>Transportation</label>
					<div class="box-wide-inside" id="transContent">
					</div> 
					
					<label>Others</label>
					<div class="box-wide-inside" id="othersContent">
					</div>

					<label>Docs</label>
					<div class="box-wide-inside" id="filesContent">
					</div> 
				</div>
			</div>
		</div>
	</body>
</html>