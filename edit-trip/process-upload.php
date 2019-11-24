<?php 
    $accoId = $_POST['accoId'];
    $tripId = $_POST['tripId'];
    $category = $_POST['category'];
    $categoryId = $_POST['categoryId'];

    include("../includes/db-config.php");

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["travelFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["travelFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["travelFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["travelFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["travelFile"]["name"]). " has been uploaded.";
            
            $stmt = $pdo->prepare("INSERT INTO `files`(`fileId`, `path`, `tripId`, `category`, `categoryId`) 
                VALUES (null,'$target_file', '$tripId', '$category', '$categoryId')");
            $stmt->execute();

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    

    // $stmt = $pdo->prepare("UPDATE `accommodations` SET `accoName` = '$accoName',
    //     `checkIn` = '$checkIn',
    //     `checkOut` = '$checkOut',
    //     `address` = '$address',
    //     `bookingId` = '$bookingId',
    //     `others` = '$others' WHERE `accommodations`.`accoId` = '$accoId'");
    // $stmt->execute();

    // header("Location: edit-accommodation.php?accoId=$accoId");
?>