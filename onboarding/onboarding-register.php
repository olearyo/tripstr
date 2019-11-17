<?php session_start();
include("../includes/db-config.php");

?>
<html>


	<body>
		<form action="process-onboarding-register.php" method="POST">
		<fieldset>
 					<br/>Full Name: <input type="text" name="fullName" required />   
					<br/>Email: <input type="email" name="email" required/>  
					<br/>Password: <input type="password" name="password" required />   
		 </fieldset>

			<input type="submit"/>

		</form>
	</body>
</html>

