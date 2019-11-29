<?php

$tripId = $_GET['tripId'];
$userId = NULL;

include("../includes/db-config.php");

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
    while($transptRow = $transptIdTable->fetch()){
        while($accomRow = $accomIdTable ->fetch()){
            while($eventsRow = $eventsIdTable->fetch()){
                while($othersRow = $othersIdTable->fetch()){
                    echo('<div>');
                        
                    echo("<h2>");
                    echo($tripsRow["tripName"]);
                    echo("</h2>");

                    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW ACCOMMODATION DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
                    $accomDetailsTable = $accomDetailsTable -> fetch();
                    echo("<h3>");
                    echo("Staying at: ".$accomDetailsTable["name"]);
                    echo("</h3>");
                    echo("<br>");
                    echo("Booking ID: ".$accomDetailsTable["bookingId"]);
                    echo("<br><br>");
                    echo("Address: ".$accomDetailsTable["address"]);
                    echo("<br><br>");

                    //show accommodation CheckIn and CheckOut Dates
                    echo("Check In: ".$accomDetailsTable["checkIn"]);
                    echo(" | ");
                    echo("Check Out: ".$accomDetailsTable["checkOut"]);
                    echo("<br><br>");

                    echo("<a href=../edit-trip/edit-accommodation.php?accoId=$accomRow[accoId]&tripId=$tripId>Edit Accommodation</a>");
                    echo("<br>");
?>

<hr>

<?php

                    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW TRANSPORTATION DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
                    $transptIdTable = $transptIdTable -> fetch();
                    echo("<h3>");
                    echo("Travelling by: ".$transptIdTable["transId"]);
                    echo("</h3>");
                    echo("<br>");
                    echo("Booking ID: ".$transptIdTable["bookingId"]);
                    echo("<br><br>");

                    //show transportation CheckIn and CheckOut Dates
                    echo("Departure: ".$transptIdTable["checkIn"]);
                    echo(" | ");
                    echo("Arrival: ".$transptIdTable["checkOut"]);
                    echo("<br>");

                    echo("<a href=../edit-trip/edit-transportation.php?transId=$transptRow[transId]&tripId=$tripId>Edit Transportation</a>");
                    echo("<br>");
?>

<hr>

<?php

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ SHOW EVENTS DETAILS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
                    $eventsIdTable = $eventsIdTable -> fetch();
                    echo("<h3>");
                    echo("Events: ".$eventsIdTable["name"]);
                    echo("</h3>");
                    echo("<br>");
                    echo("Address: ".$eventsIdTable["address"]);
                    echo("<br><br>");
                    echo("Check In: ".$eventsIdTable["checkIn"]);
                    echo("Others: ".$eventsIdTable["others"]);
                    echo("<br>");

                    echo("<a href=../edit-trip/edit-transportation.php?transId=$eventsRow[eventId]&tripId=$tripId>Edit Event</a>");
                    echo("<br>");
?>

<hr>

<?php

                    //show group members count
                    $usr_grTable = $pdo->prepare("SELECT COUNT(userId) as 'groups' FROM `users-groups` WHERE `tripId` = '$tripsRow[tripId]' "); 
                    $usr_grTable -> execute(); 
                    $usr_grTable = $usr_grTable ->fetch();
                    echo("<br><br>");
                    echo("Group members:  ");
                    echo ($usr_grTable['groups']);
                    echo("<a href='../group/group-home.php'> View Members</a>");
                    echo("<br><br>");
                    
                }
?>

<hr>

<?php
                echo('</div>');
            }
        }
    }
}
?>