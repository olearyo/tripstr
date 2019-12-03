<?php

$tripId = $_GET['tripId'];

include("../includes/session.php");
include("../includes/db-config.php");

if(isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $tripsTable = $pdo->prepare("SELECT * FROM `trips` WHERE `tripId` = '$tripId';");
    $tripsTable -> execute();

    $usr_grTable = $pdo->prepare("SELECT * FROM `users-groups`;");
    $usr_grTable -> execute();

    $accomIdTable = $pdo->prepare("SELECT * FROM `accommodations` WHERE `tripId` = $tripId;");
    $accomIdTable -> execute();

    $accomDetailsTable = $pdo->prepare("SELECT * FROM `accommodations` WHERE `tripId` = $tripId;");
    $accomDetailsTable -> execute();

    $transptIdTable = $pdo->prepare("SELECT * FROM `transportation` WHERE `tripId` = $tripId;");
    $transptIdTable -> execute();

    $eventsIdTable = $pdo->prepare("SELECT * FROM `events` WHERE `tripId` = $tripId;");
    $eventsIdTable -> execute();

    $othersIdTable = $pdo->prepare("SELECT * FROM `others` WHERE `tripId` = $tripId;");
    $othersIdTable -> execute();

    echo("<a href=show-trips-dashboard.php> Back to Dashboard </a>");
    echo("<br><br>");

    while($tripsRow = $tripsTable->fetch()) {

        echo('<div>');
                        
        echo("<h2>");
        echo($tripsRow["tripName"]);
        echo("</h2>");

        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW ACCOMMODATION DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
        while($accomRow = $accomIdTable ->fetch()){

            echo("<h3>");
            echo("Staying at: ".$accomRow["name"]);
            echo("</h3>");
            echo("<br>");
            echo("Booking ID: ".$accomRow["bookingId"]);
            echo("<br><br>");
            echo("Address: ".$accomRow["address"]);
            echo("<br><br>");

            //show accommodation CheckIn and CheckOut Dates
            echo("Check In: ".$accomRow["checkIn"]);
            echo(" | ");
            echo("Check Out: ".$accomRow["checkOut"]);
            echo("<br><br>");

            echo("<a href=../edit-trip/edit-accommodation.php?accoId=$accomRow[accoId]&tripId=$tripId>Edit Accommodation</a>");
            echo("<br>");
        }
?>

<hr>

<?php
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW TRANSPORTATION DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
        while($transptRow = $transptIdTable->fetch()){
            echo("<h3>");
            echo("Travelling by: ".$transptRow["transId"]);
            echo("</h3>");
            echo("<br>");
            echo("Booking ID: ".$transptRow["bookingId"]);
            echo("<br><br>");

            //show transportation CheckIn and CheckOut Dates
            echo("Departure: ".$transptRow["checkIn"]);
            echo(" | ");
            echo("Arrival: ".$transptRow["checkOut"]);
            echo("<br>");

            echo("<a href=../edit-trip/edit-transportation.php?transId=$transptRow[transId]&tripId=$tripId>Edit Transportation</a>");
            echo("<br>");
        }
?>

<hr>

<?php

        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW EVENTS DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
        while($eventsRow = $eventsIdTable->fetch()){
            echo("<h3>");
            echo("Events: ".$eventsRow["name"]);
            echo("</h3>");
            echo("<br>");
            echo("Address: ".$eventsRow["address"]);
            echo("<br><br>");
            echo("Check In: ".$eventsRow["checkIn"]);
            echo("Others: ".$eventsRow["others"]);
            echo("<br>");

            echo("<a href=../edit-trip/edit-events.php?eventId=$eventsRow[eventId]&tripId=$tripId>Edit Event</a>");
            echo("<br>");
        }
?>

<hr>

<?php
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW OTHERS DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
        while($othersRow = $othersIdTable->fetch()){
            echo("<h3>");
            echo("Events: ".$eventsRow["name"]);
            echo("</h3>");
            echo("<br>");
            echo("Address: ".$eventsRow["address"]);
            echo("<br><br>");
            echo("Check In: ".$eventsRow["checkIn"]);
            echo("Others: ".$eventsRow["others"]);
            echo("<br>");

            echo("<a href=../edit-trip/edit-events.php?eventId=$eventsRow[eventId]&tripId=$tripId>Edit Event</a>");
            echo("<br>");
        }


        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW GROUP DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
        $usr_grTable = $pdo->prepare("SELECT COUNT(userId) as 'groups' FROM `users-groups` WHERE `tripId` = '$tripsRow[tripId]' "); 
        $usr_grTable -> execute(); 
        $usr_grTable = $usr_grTable ->fetch();
        echo("<br><br>");
        echo("Group members:  ");
        echo ($usr_grTable['groups']);
        echo("<a href='../group/group-home.php'> View Members</a>");
        echo("<br><br>");
        
        echo('</div>');
    }
?>

<hr>

<?php
                
} else {
    echo("Please login to continue.");
}
?>