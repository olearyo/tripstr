<?php

// $tripId = $_GET['tripId'];
// $tripId = 2;
// $userId = 2;

include("../includes/session.php");
include("../includes/db-config.php");

//////////////////////// SHOW TRIP CONTENTS ////////////////////////////////////

if(isset($_SESSION['userId'])) {
$userId = $_SESSION['userId'];

$usr_grTable = $pdo->prepare("SELECT * FROM `users` WHERE `userId` = '$userId';");
$usr_grTable -> execute();

$tripsTable = $pdo->prepare("SELECT * FROM `trips`;");
$tripsTable-> execute();

	while($tripsRow = $tripsTable->fetch()) {

        echo('<div>');
        
		echo("<h3>");
		echo($tripsRow["tripName"]);
        echo("</h3>");

        //show destination locations
		echo("<br><br>");
		echo("Destination : ");
        echo($tripsRow["destination"]);
        echo("<br><br>");

        //show trip start and end date
        echo("From : ");
        echo($tripsRow["fromDate"]);
        echo(" | ");
        echo("To : ");
        echo($tripsRow["toDate"]);
        echo("<br>");

        //show stays
        $accomTable = $pdo->prepare("SELECT COUNT(accoId) as 'stays' FROM `accommodations` WHERE `accoId` = '$tripsRow[tripId]' ");  
        $accomTable->execute(); 
        $accomTable = $accomTable ->fetch();
        echo("<br>");
        echo("Stays:  ");
        echo ($accomTable['stays']);

        //show events
        $eventsTable = $pdo->prepare("SELECT COUNT(eventId) as 'events' FROM `events` WHERE `eventId` = '$tripsRow[tripId]' "); 
        $eventsTable->execute(); 
        $eventsTable = $eventsTable ->fetch();
        echo("<br><br>");
        echo("Events:  ");
        echo ($eventsTable['events']);

        //show files
        $filesTable = $pdo->prepare("SELECT COUNT(tripId) as 'files' FROM `files` WHERE `tripId` = '$tripsRow[tripId]' "); 
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
        $usr_grTable = $pdo->prepare("SELECT COUNT(userId) as 'groups' FROM `users-groups` WHERE `tripId` = '$tripsRow[tripId]' "); 
        $usr_grTable -> execute(); 
        $usr_grTable = $usr_grTable ->fetch();
        echo("<br><br>");
        echo("Group members:  ");
        echo ($usr_grTable['groups']);
        echo("<a href='../group/group-home.php'> View Members</a>");
        echo("<br><br>");
        
        echo("<h3><a href=view-trip-details.php?tripId=$tripsRow[tripId]>Trip details </a></h3>");
		echo("<br>");
		
?>

<hr>

<?php
		echo('</div>');
    } 
}
else{
    echo("Please login to continue.");
}
?>