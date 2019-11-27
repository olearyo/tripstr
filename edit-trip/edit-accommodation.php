<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/base-css.css">
    <title>Edit Accommodation</title>
</head>
<body>
    <?php
    include("../includes/db-config.php");

        $isEdit = false;

        $tripId = 1;
        $category = 1;
        $categoryId = 1;
        // $tripId = $_GET["tripId"];
        // $category = $_GET["category"];
        // $categoryId = $_GET["categoryId"];

        if(isset($_GET['accoId'])) {
            $accoId = $_GET["accoId"]; 

            $stmt = $pdo->prepare("SELECT * FROM `accommodations` WHERE `accoId` = '$accoId' AND `tripId` = '$tripId'");
            $stmt->execute();
            $row = $stmt->fetch();

            $count = $stmt->rowCount();
            // Check if there is any exiting record with above mentioned trip and user IDs
            if($count > 0){
                $isEdit = true;
            }
        }
    ?>
    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
        <div class="container">
            <h1>Accommodation
            <?php 
                if($isEdit){
                    $deleteUrl = '../edit-trip/process-delete-accommodation.php?accoId='.$accoId;
                    $backUrl = '../edit-trip/edit-accommodation.php?accoId='.$accoId;
            ?>
                <a class="delete" href="../components/promptDelete.php?yes=<?php echo($deleteUrl);?>&no=<?php echo($backUrl);?>">Delete</a>
            <?php 
                } // for above if condition
            ?>
            </h1>
            <section>
                <div class="form-container">
                    <form action="process-accommodation.php" method="POST">
                        <input type="hidden" name="accoId" value="<?php if($isEdit){ echo($accoId);} ?>">
                        <input type="hidden" name="tripId" value="<?php echo($tripId); ?>">
                        <div class="form-input">
                            <label for="accoName">Accommodation Name</label>
                            <input id="accoName" name="accoName" type="text" placeholder="Accommodation e.g. Hotel Name" value="<?php if($isEdit){ echo($row['accoName']); } ?>">
                        </div>
                        <div class="form-input half">
                            <label for="checkIn">Check In</label>
                            <input id="checkIn" name="checkIn" type="text" placeholder="Check in" value="<?php if($isEdit){ echo($row['checkIn']); } ?>">
                        </div>
                        <div class="form-input half">
                            <label for="checkOut">Check Out</label>
                            <input id="checkOut" name="checkOut" type="text" placeholder="Check out" value="<?php if($isEdit){ echo($row['checkOut']); } ?>">
                        </div>
                        <div class="form-input">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" type="text" placeholder="Address"><?php if($isEdit){ echo($row['address']); } ?></textarea>
                        </div>
                        <div class="form-input half">
                            <label for="bookingId">Booking ID</label>
                            <input id="bookingId" name="bookingId" type="text" placeholder="Booking ID" value="<?php if($isEdit){ echo($row['bookingId']); } ?>">
                        </div>
                        <div class="form-input">
                            <label for="others">Others</label>
                            <textarea id="others" name="others" type="text" placeholder="others"><?php if($isEdit){ echo($row['others']); } ?></textarea>
                        </div>
                        <div class="form-input">
                            <input class="button" type="submit" value="Save" />
                        </div>
                    </form>
                </div>
            </section>
            <!-- FILES -->
            <section>
                
                <?php
                    if($isEdit){
                        echo("<h1>Files</h1>");
                        $stmtFile = $pdo->prepare("SELECT * FROM `files` WHERE `tripId` = '$tripId' AND `categoryId` = '$categoryId' ");
                        $stmtFile->execute();
                    
                ?>
                <ul>

                <?php
                    $i =0;
                    while($rowFile = $stmtFile->fetch()) {
                        $deleteFile = [];
                        $deleteFile[$i] = "../components/promptDelete.php?yes=../edit-trip/delete-file.php?fileId=$rowFile[fileId]&no=$backUrl";
                        // $deleteFile.$i = "../edit-trip/delete-file.php?fileId=".$rowFile['fileId'];
                        echo("<li>");
                            echo("<a href='$rowFile[path]'>");
                            echo($rowFile["fileName"]);
                            echo("</a>");
                            echo("<a href='$deleteFile[$i]'>");
                            echo("Delete");
                            echo("</a>");
                        echo("</li>");
                        $i++;
                    }
                    
                ?>
                </ul>
                <a href="upload-file.php?accoId=<?php echo($accoId) ?>&tripId=<?php echo($tripId) ?>&category=<?php echo($category) ?>&categoryId=<?php echo($categoryId) ?>" class="button secondary">Upload new file</a>
                <?php 
                    } // above if condition
                ?>
            </section>
        </div>
        
    </main>

    
    

    <script src="../js/core.js"></script>
    <script src="../js/tripstr.js"></script>
    <?php 
        include("../includes/dateTime.php");
    ?>
    <script>
        
        let checkIn = document.querySelector('#checkIn')
        let dateTime = document.querySelector('#dateTime')
        checkIn.addEventListener('focus', showHideDate, false)
        checkOut.addEventListener('focus', showHideDate, false)
        setDateUI()
    </script>
    
</body>
</html>