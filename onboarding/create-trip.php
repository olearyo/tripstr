<?php session_start();

include("../includes/db-config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("../includes/header.php");
    ?>
    <title>Create a Trip</title>
</head>
<body>

    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
    <div class="container">
        <h1>Create a Trip</h1>
        <div class="form-container">
		
        <form action="onboarding.php" method="POST">
		
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
                <input id="fromDate" type="date" name="fromDate" required />   
        </div>

        <div class="form-input half">
            <label for="toDate">To:</label> 
                <input id="toDate" type="date" name="toDate" required/>   
        </div>

        <div class="form-input">
            <label for="type">What type of trip are you creating?</label> 
                <div class="form-input half">
                    <input type="radio" class="radio-1" name="type" value="0"> Solo<br>
                </div>

                <div class="form-input half">
                    <input type="radio" class="radio-2" name="type" value="1"> Group<br>  
                </div>   
                </div>
        </div>
                    
        <div class="form-input">
            <input class="button" type="submit"  name="submit" value="continue"/>
        </div>

		</form>
        </div>
    </div>
	</body>
</html>

