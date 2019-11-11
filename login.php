<?php
include("includes/db-config.php");

?>
<html>

	<body>
	<p>Login here:</p><br>
		<form action="process-login.php" method="POST">
		<fieldset>
 					<br/>email: <input type="text" name="username" required />   
					<br/>password: <input type="password" name="password" required/>  
		 </fieldset>

			<input type="submit"/>

		</form>
	</body>
</html>

