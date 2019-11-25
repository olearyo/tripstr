<?php

include("../includes/db-config.php");

$usrTable = $pdo->prepare("SELECT * FROM `users` WHERE `userId` == ;");
$usrTable->execute();

$tripsTable = $pdo->prepare("SELECT * FROM `trips`;");
$tripsTable-> execute();

$usgrTable = $pdo->prepare("SELECT count(*) FROM `users-groups` WHERE `userId` == "); 
$usgrTable->execute(); 
$number_of_rows = $usgrTable->fetchColumn();

var_dump($number_of_rows);
echo("G Members: $number_of_rows");
// $usgrTable = $pdo->prepare("SELECT * FROM `users-groups`;");
// $usgrTable->execute();

// $usgrTable = $pdo->prepare("SELECT * FROM `users-groups`;");
// $usgrTable -> execute();

//////////////////////// SHOW TRIP CONTENTS //////////////////////////////////////

	while($row = $tripsTable->fetch()) {

        echo('<div>');
        
		echo("<h3>");
		echo($row["tripName"]);
        echo("</h3>");
        
        //show group members count

        $stmt3 = $pdo->prepare("SELECT * FROM `users-groups` WHERE `userId` == ;");
        $grpCount = 0;
        while($row4 = $usgrTable->fetch()){
			if($row4['userId'] == $row['userId']) {
				$grpCount++;
			}
		}
        $usgrTable->execute();
        // $usgrTable = $pdo->prepare("SELECT count(userId) FROM `users-groups`");
        // $row3 = $usgrTable->fetch();

        // $grpCount = $row3[0];
        echo ("Group members: $grpCount");
        
		// echo("<br>");
		// echo("Group Members: $grpCount");
		
        //trying to show the user's name
		// $stmt2 = $pdo->prepare("SELECT `fullName` FROM `users` WHERE `userId` = :tripId;");
		// $stmt2 -> bindParam(':tripId', $row["tripId"]);
		// $stmt2 -> execute();

		// if($row2 = $stmt2->fetch()) {
        //     echo("Group members: ");
		// 	echo($row2['fullName']);
		// 	echo(" | ");
        // }
        
		echo("<br><br>");
		echo("Destination : ");
        echo($row["destination"]);
        echo("<br><br>");
        echo("From : ");
        echo($row["fromDate"]);
        echo(" | ");
        echo("To : ");
        echo($row["toDate"]);
        echo("<br><br>");
        
        echo("<a href=view-trip-details.php?tripId=$row[tripId]> View More </a>");
		echo("<br><br>");
		
?>

<hr>

<?php
		echo('</div>');
	} 
?>