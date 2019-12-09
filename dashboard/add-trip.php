<?php session_start();
include("../includes/logo.php");

include("../includes/db-config.php");
include("../includes/header.php");
?>
<html lang="en">
<head>

    <title>Add a Trip</title>
</head>
<body>



    <main>
    <div class="container">


        <div class="form-container">
        <header>
    <div class="title">
            <a class="inline back" href="show-trips-dashboard.php"><i class="material-icons">arrow_back</i></a> 
            <h2 class="inline head">Add Trip</h2>
        </div>
    </header>
		
        <form action="process-add-trip.php" method="POST">
		
        <div class="form-input">
            <label for="tripName">Trip Name:</label>
                <input id="tripName" type="text" name="tripName" required />
        </div>

        <div class="form-input">    
            <label for="destination">Destination:</label> 
                <input id="destination" type="text" name="destination" required/> 
        </div>

        <div class="form-input half">
            <label for="fromDate">From:</label> 
                <input id="fromDate" type="text" placeholder="From" name="fromDate" required />   
        </div>

        <div class="form-input half">
            <label for="toDate">To:</label> 
                <input id="toDate" type="text" placeholder="To" name="toDate" required/>   
        </div>

        
        <!-- <div class="form-input half">
            <label for="fromDate">From:</label> 
                <input id="fromDate" type="date" name="fromDate" required />   
        </div>

        <div class="form-input half">
            <label for="toDate">To:</label> 
                <input id="toDate" type="date" name="toDate" required/>   
        </div> -->

        <!-- <div class="form-input">
            <label for="type">What type of trip are you creating?</label> 
                <div class="form-input half">
                    <input type="radio" class="radio-1" name="type" value="0"> <span>Solo<span> 
                </div>

                <div class="form-input half">
                    <input type="radio" class="radio-2" name="type" value="1"> <span>Group<span>  
                </div>   
                </div>
        </div> -->
                    
        <div class="form-input">
            <input class="button blueborder" type="submit"  name="submit" value="continue"/>
        </div>

		</form>
        </div>
    </div>
    <script src="../js/core.js"></script>
    <script src="../js/tripstr.js"></script>
    <?php 
        include("../includes/date.php");
    ?>
    <script>
        
        let fromDate = document.querySelector('#fromDate')
        let dateTime = document.querySelector('#dateTime')
        fromDate.addEventListener('focus', showHideDate, false)
        toDate.addEventListener('focus', showHideDate, false)
        setDateUI()
    </script>
	</body>
</html>
