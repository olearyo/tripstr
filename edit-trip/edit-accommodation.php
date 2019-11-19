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
        $accoId = $_GET["accoId"];
        include("../includes/db-config.php");

        $stmt = $pdo->prepare("SELECT * FROM `accommodations` WHERE `accoId` = '$accoId'");
        $stmt->execute();
        $row = $stmt->fetch(); 

        // var_dump($row);
    ?>
    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
        <div class="container">
            <h1>Accommodation
            <?php 
                $deleteUrl = 'process-delete.php?accoId='.$accoId;
                $backUrl = '../edit-trip/edit-accommodation.php?accoId='.$accoId;
            ?>
                <a class="delete" href="../components/promptDelete.php?yes=<?php echo($deleteUrl);?>&no=<?php echo($backUrl);?>">Delete</a>
            </h1>
            <div class="form-container">
                <form action="process-accommodation.php" method="POST">
                    <input type="hidden" name="accoId" value="<?php echo($accoId); ?>">
                    <div class="form-input">
                        <label for="accoName">Accommodation Name</label>
                        <input id="accoName" name="accoName" type="text" placeholder="Accommodation e.g. Hotel Name" value="<?php echo($row['accoName']); ?>">
                    </div>
                    <div class="form-input half">
                        <label for="checkIn">Check In</label>
                        <input id="checkIn" name="checkIn" type="text" placeholder="Check in" value="<?php echo($row['checkIn']); ?>">
                    </div>
                    <div class="form-input half">
                        <label for="checkOut">Check Out</label>
                        <input id="checkOut" name="checkOut" type="text" placeholder="Check out" value="<?php echo($row['checkOut']); ?>">
                    </div>
                    <div class="form-input">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" type="text" placeholder="Address"><?php echo($row['address']); ?></textarea>
                    </div>
                    <div class="form-input half">
                        <label for="bookingId">Booking ID</label>
                        <input id="bookingId" name="bookingId" type="text" placeholder="Booking ID" value="<?php echo($row['bookingId']); ?>">
                    </div>
                    <div class="form-input">
                        <label for="others">Others</label>
                        <textarea id="others" name="others" type="text" placeholder="others"><?php echo($row['others']); ?></textarea>
                    </div>
                    <div class="form-input">
                        <input class="button" type="submit" value="Save" />
                    </div>
                </form>
            </div>
        </div>
        
    </main>

    
    

    <script src="../js/core.js"></script>
    <script src="../js/tripstr.js"></script>

</body>
</html>