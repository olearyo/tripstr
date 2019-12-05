<?php session_start();

include("../includes/logo.php");
include("../includes/header.php");


$userId = $_SESSION['userId'];
// $userId = 1;
// $tripId = $_GET['tripId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body class="grey">

    <main>
        <div class="container">
            <h1>Dashboard</h1>
        <div class="title">
            <img class="profile" src="../img/passport (5).png">
            <h2 class="dark-blue"><?php echo($_SESSION['fullName']); ?></h2>
            <p>Here are your upcoming trips</p>

        </div>   
        
        <div class="title">
        <button class="button logout" onclick="window.location.href = '../onboarding/logout.php';">LOGOUT</button>

        <button class="button create" onclick="window.location.href = '../onboarding/create-trip.php';">ADD TRIP</button>


            <!-- <p><a href="../onboarding/logout.php">Logout</a></p> -->

        </div>   
<?php
include("../includes/db-config.php");

$usr_grTable = $pdo->prepare("SELECT * FROM `users` WHERE `userId` = '$userId';");
$usr_grTable -> execute();

$tripsTable = $pdo->prepare("SELECT * FROM `trips` WHERE `userId` = '$userId';");
$tripsTable-> execute();

//////////////////////// SHOW TRIP CONTENTS ////////////////////////////////////

	while($tripsRow = $tripsTable->fetch()) {?>



    while($tripsRow = $tripsTable->fetch()) {?>
    
        <div class="box-wide">
        <div class="form-container">


            <h2><?php echo($tripsRow["tripName"]); ?></h2>
            <p><?php echo($tripsRow["fromDate"]); ?> to <?php echo($tripsRow["toDate"]); ?></p>
            <h1 class="blue"><?php echo($tripsRow["tripName"]); ?></h1>
            <p><?php echo($tripsRow["fromDate"]); ?>  <i class="fas fa-plane"></i>  <?php echo($tripsRow["toDate"]); ?></p>
                <div class="form-input half">
                <label>Destination</label> 
                    <p><?php echo($tripsRow["destination"]);?> </p>
                </div>
                    

<?php
        //show stays
        $accomTable = $pdo->prepare("SELECT COUNT(accoId) as 'stays' FROM `accommodations` WHERE `accoId` = '$tripsRow[tripId]' ");  
        $accomTable->execute(); 
        $accomTable = $accomTable ->fetch();
?>
                <div class="form-input half">
                <label>Stays:</label> 
                    <p><?php echo ($accomTable['stays']); ?></p>
                </div>
<?php
        //show events
        $eventsTable = $pdo->prepare("SELECT COUNT(eventId) as 'events' FROM `events` WHERE `eventId` = '$tripsRow[tripId]' "); 
        $eventsTable->execute(); 
        $eventsTable = $eventsTable ->fetch();
?>
                <div class="form-input half">
                <label>Events:</label> 
                    <p><?php echo ($eventsTable['events']); ?></p>
                </div>
<?php
        //show files
        $filesTable = $pdo->prepare("SELECT COUNT(tripId) as 'files' FROM `files` WHERE `tripId` = '$tripsRow[tripId]' "); 
        $filesTable->execute(); 
        $filesTable = $filesTable ->fetch();
?>
                <div class="form-input half">
                <label>Files:</label> 
                    <p><?php echo ($filesTable['files']); ?></p>                    
                </div>
<?php
        //show group members count
        $usr_grTable = $pdo->prepare("SELECT COUNT(userId) as 'groups' FROM `users-groups` WHERE `tripId` = '$tripsRow[tripId]' "); 
        $usr_grTable -> execute(); 
        $usr_grTable = $usr_grTable ->fetch();

?>
                    <p>Group members: <?php echo ($usr_grTable['groups']); ?></p>
                    <p><a href='../group/group-home.php'>View Members</a></p>

                    <div class="continue">
                    <a href="view-trip-details.php?tripId=<?php echo($tripsRow["tripId"]); ?>"><button class="button">GO TO TRIP</button></a>
                    <p><a href="../group/group-home.php?tripId=<?php echo($tripsRow['tripId']); ?>">View Members</a></p>

                    <div class="continue">
                    <a href="view-trip-details.php?tripId=<?php echo($tripsRow['tripId']); ?>"><button class="button blueborder">GO TO TRIP</button></a>
                    <div>
                </div>
        </div>
    </div>
</html>
<?php





		
        // show the user's name
		// $stmt2 = $pdo->prepare("SELECT `fullName` FROM `users` WHERE `userId` = :tripId;");
		// $stmt2 -> bindParam(':tripId', $row["tripId"]);
		// $stmt2 -> execute();

		// if($row2 = $stmt2->fetch()) {
        //     echo("Group members: ");
		// 	echo($row2['fullName']);
		// 	echo(" | ");
        // }

		
?>




<?php
		echo('</div>');
	} 
?>
<p><a href="../onboarding/logout.php">Logout</a></p>
    } 

?>
