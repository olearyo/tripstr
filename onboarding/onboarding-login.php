<?php session_start();
include("../includes/db-config.php");



var_dump($_SESSION);
?>
<html>


	<body>
		<form action="process-onboarding-login.php" method="POST">
		<fieldset>
 					<br/>email: <input type="text" name="email" required />   
					<br/>password: <input type="password" name="password" required/>  
		 </fieldset>

			<input type="submit"/>

		</form>
	</body>
</html>
