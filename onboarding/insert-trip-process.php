<?php session_start();

	if($_SESSION['type'] == 1){ 
		$randomNum = rand(1000,5000); 
		$stmt = $pdo->prepare("SELECT * FROM `trips` 
			WHERE `uniqueId` = ?");
		$stmt->execute([$randomNum]);
		$row = $stmt->fetchAll();
		while ($stmt->rowCount() > 0){
			$randomNum = rand(1000,5000); 
		}
	
		// echo($randomNum);
	
		$stmt = $pdo->prepare("INSERT INTO `trips` 
		(`userId`, `tripName`, `destination`, `fromDate`, `toDate`, `type`, `uniqueId`) 
		VALUES (?, ?, ?, ?, ?, ?, ?)");
	
		$stmt->execute([$_SESSION['userId'], $_SESSION['tripName'], $_SESSION['destination'], $_SESSION['fromDate'], $_SESSION['toDate'], $_SESSION['type'], $randomNum]);
		
		if($stmt->rowCount() ==1 ){
			header("Location: onboarding-group.php?gid=".$randomNum);
		}

	}elseif($_SESSION['type'] == 0){

    $stmt = $pdo->prepare("INSERT INTO `trips` 
	(`userId`, `tripName`, `destination`, `fromDate`, `toDate`, `type`) 
	VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->execute([$_SESSION['userId'], $_SESSION['tripName'], $_SESSION['destination'], $_SESSION['fromDate'], $_SESSION['toDate'], $_SESSION['type']]);


}else{
	echo "something went wrong, please try again.";
}



?>