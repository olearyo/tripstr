<?php 
include("../includes/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("../includes/header.php");
    ?>
    <title>Edit Transportation</title>
</head>
<body>
    <?php
    if(isset($_SESSION['userId'])) {

    include("../includes/db-config.php");

        $isEdit = false;
        $categoryId = 2;

        
        if(isset($_GET['transId']) && isset($_GET['tripId'])) {
            $transId = $_GET["transId"]; 
            $tripId = $_GET['tripId'];

            $stmt = $pdo->prepare("SELECT * FROM `transportation` WHERE `transId` = '$transId' AND `tripId` = '$tripId'");
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
            <h1>Transportation
            <?php 
                if($isEdit){
                    $deleteUrl = '../edit-trip/process-delete-transportation.php?transId='.$transId;
                    $backUrl = '../edit-trip/edit-transportation.php?transId='.$transId.'&tripId='.$tripId; // REPLACE THIS WITH DASHBOARD EXPANDED VIEW URL
            ?>
                <a class="delete" href="../components/promptDelete.php?yes=<?php echo($deleteUrl);?>&no=<?php echo($backUrl);?>">Delete</a>
            <?php 
                } // for above if condition
            ?>
            </h1>
            <section>
                <div class="form-container">
                    <form action="process-transportation.php" method="POST">
                        <input type="hidden" name="transId" value="<?php if($isEdit){ echo($transId);} ?>">
                        <input type="hidden" name="tripId" value="<?php echo($tripId); ?>">
                        <div class="form-input">
                            <label for="transName">Transportation Name</label>
                            <input id="transName" name="transName" type="text" placeholder="e.g. Flight name or no." value="<?php if($isEdit){ echo($row['name']); } ?>">
                        </div>
                        <div class="form-input half">
                            <label for="departure">Departure</label>
                            <input id="departure" name="departure" type="text" placeholder="e.g. Paris" value="<?php if($isEdit){ echo($row['departure']); } ?>">
                        </div>
                        <div class="form-input half">
                            <label for="arrival">Arrival</label>
                            <input id="arrival" name="arrival" type="text" placeholder="e.g. Toronto" value="<?php if($isEdit){ echo($row['arrival']); } ?>">
                        </div>
                        <div class="form-input half">
                            <label for="checkIn">Departure Time</label>
                            <input id="checkIn" name="checkIn" type="text" placeholder="Check in" value="<?php if($isEdit){ echo($row['checkIn']); } ?>">
                        </div>
                        <div class="form-input half">
                            <label for="checkOut">Arrival Time</label>
                            <input id="checkOut" name="checkOut" type="text" placeholder="Check out" value="<?php if($isEdit){ echo($row['checkOut']); } ?>">
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
                <a href="upload-file.php?tripId=<?php echo($tripId); ?>&categoryId=<?php echo($categoryId) ?>" class="button secondary">Upload new file</a>
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
    <?php 
        } else {
            echo('Please login to access this page');
        }
    ?>
</body>
</html>