<?php

$tripId = $_GET['tripId'];

include("../includes/session.php");
include("../includes/db-config.php");

if(isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $tripsTable = $pdo->prepare("SELECT * FROM `trips` WHERE `tripId` = '$tripId';");
    $tripsTable -> execute();

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
  
    $trips = $tripsTable->fetchAll(PDO::FETCH_ASSOC);
    $trips['accommodations'] = $accomIdTable->fetchAll(PDO::FETCH_ASSOC);
    $trips['transportation'] = $transptIdTable->fetchAll(PDO::FETCH_ASSOC);
    $trips['events'] = $eventsIdTable->fetchAll(PDO::FETCH_ASSOC);
    $trips['others'] = $othersIdTable->fetchAll(PDO::FETCH_ASSOC);

    echo(json_encode($trips));
} else {
    echo('{
        "error":"Seems like you are not logged in. Please log in to continue."
    }');
}
?>

