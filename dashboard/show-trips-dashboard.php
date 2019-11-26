<?php

$userId = 1;
// $tripId = $_GET['tripId'];

include("../includes/db-config.php");

$usrTable = $pdo->prepare("SELECT * FROM `users` WHERE `userId` = '$userId';");
$usrTable->execute();

$tripsTable = $pdo->prepare("SELECT * FROM `trips`;");
$tripsTable-> execute();

//////////////////////// SHOW TRIP CONTENTS //////////////////////////////////////

	while($row = $tripsTable->fetch()) {

        echo('<div>');
        
		echo("<h3>");
		echo($row["tripName"]);
        echo("</h3>");
        
        //show group members count
        $usgrTable = $pdo->prepare("SELECT COUNT(userId) as 'groups' FROM `users-groups` WHERE `tripId` = '$row[tripId]' "); 
        // $usgrTable = $pdo->prepare("SELECT * FROM `users-groups`"); 
        $usgrTable->execute(); 
        $usgrTable = $usgrTable ->fetch();

        echo("<br>");
        echo("Group members:  ");
        echo ($usgrTable['groups']);

        //show stays
        $accomTable = $pdo->prepare("SELECT COUNT(accoId) as 'stays' FROM `accommodations` WHERE `accoId` = '$row[tripId]' "); 
        // $usgrTable = $pdo->prepare("SELECT * FROM `users-groups`"); 
        $accomTable->execute(); 
        $accomTable = $accomTable ->fetch();
        echo("<br><br>");
        echo("Stays:  ");
        echo ($accomTable['stays']);
		
        // trying to show the user's name
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