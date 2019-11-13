<?php session_start();

include("../includes/db-config.php");

?>
<html>


	<body>
		<form action="onboarding.php" method="POST">
		<fieldset>
 			<br/>Trip Name: <input type="text" name="tripName" required />   
            <br/>Destination: <input type="text" name="destination" required/> 
            <br/>From: <input type="date" name="fromDate" required />   
            <br/>To: <input type="date" name="toDate" required/>   
        </fieldset>

            <p>What type of trip are you creating?</p>
            <input type="radio" name="type" value="0"> Solo<br>
            <input type="radio" name="type" value="1"> Group<br>  
                    


			<input name="submit" type="submit"/>

		</form>
	</body>
</html>

