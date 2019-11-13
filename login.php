<?php
include("includes/db-config.php");

?>
<html>


	<body>
		<form action="process-login.php" method="POST">
		<fieldset>
 					<br/>email: <input type="text" name="email" required />   
					<br/>password: <input type="password" name="password" required/>  
		 </fieldset>

			<input type="submit"/>

		</form>
	</body>
</html>

