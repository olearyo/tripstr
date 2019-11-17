<?php session_start();

include("../includes/db-config.php");

if($_SESSION['type'] == 1){ 
    $randomNum = rand(1000,5000); 

    // echo($randomNum);

    $stmt = $pdo->prepare("UPDATE `trips` (`uniqueId`) VALUES (?)");

    $stmt->execute([$randomNum]);

}

// if($_SESSION['type'] == 1){ 

    // $randomNum = rand(1000,5000); 

    // $stmt = $pdo->prepare("UPDATE `trips` SET `uniqueId` =? WHERE `trips`.`tripName`=?");

    // $stmt->execute([$randomNum, $row["tripName"]]);

// }

?>
