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

        //show destination locations
		echo("<br><br>");
		echo("Destination : ");
        echo($row["destination"]);
        echo("<br><br>");

        //show trip start and end date
        echo("From : ");
        echo($row["fromDate"]);
        echo(" | ");
        echo("To : ");
        echo($row["toDate"]);
        echo("<br>");

        //show stays
        $accomTable = $pdo->prepare("SELECT COUNT(accoId) as 'stays' FROM `accommodations` WHERE `accoId` = '$row[tripId]' ");  
        $accomTable->execute(); 
        $accomTable = $accomTable ->fetch();
        echo("<br>");
        echo("Stays:  ");
        echo ($accomTable['stays']);

        //show events
        $eventsTable = $pdo->prepare("SELECT COUNT(eventId) as 'events' FROM `events` WHERE `eventId` = '$row[tripId]' "); 
        $eventsTable->execute(); 
        $eventsTable = $eventsTable ->fetch();
        echo("<br><br>");
        echo("Events:  ");
        echo ($eventsTable['events']);

        //show files
        $filesTable = $pdo->prepare("SELECT COUNT(tripId) as 'files' FROM `files` WHERE `tripId` = '$row[tripId]' "); 
        $filesTable->execute(); 
        $filesTable = $filesTable ->fetch();
        echo("<br><br>");
        echo("Docs:  ");
        echo ($filesTable['files']);
		
        // show the user's name
		// $stmt2 = $pdo->prepare("SELECT `fullName` FROM `users` WHERE `userId` = :tripId;");
		// $stmt2 -> bindParam(':tripId', $row["tripId"]);
		// $stmt2 -> execute();

		// if($row2 = $stmt2->fetch()) {
        //     echo("Group members: ");
		// 	echo($row2['fullName']);
		// 	echo(" | ");
        // }

        //show group members count
        $usgrTable = $pdo->prepare("SELECT COUNT(userId) as 'groups' FROM `users-groups` WHERE `tripId` = '$row[tripId]' "); 
        $usgrTable->execute(); 
        $usgrTable = $usgrTable ->fetch();
        echo("<br><br>");
        echo("Group members:  ");
        echo ($usgrTable['groups']);
        echo("<a href='../group/group-home.php'> View Members</a>");
        echo("<br><br>");
        
        echo("<h3><a href=view-trip-details.php?tripId=$row[tripId]>Trip details </a></h3>");
		echo("<br>");
		
?>

<hr>

<?php
		echo('</div>');
	} 
?>