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
        $tripId = $_GET["tripId"];
        $category = $_GET["category"];
        $categoryId = $_GET["categoryId"];
        include("../includes/db-config.php");
        // http://localhost/tripstr/tripstr/edit-trip/upload-file.php?accoId=1&tripId=1&category=1&categoryId=1

    ?>
    <header>
        <!-- TOP NAVIGATION -->
    </header>
    <main>
        <div class="container">
            <h1>Upload file
            <?php 
                $deleteUrl = '../edit-trip/process-delete-accommodation.php?accoId='.$accoId;
                $backUrl = '../edit-trip/edit-accommodation.php?accoId='.$accoId;
            ?>
            </h1>
            <div class="form-container">
                <form action="process-upload.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="accoId" value="<?php echo($accoId); ?>">
                    <input type="hidden" name="tripId" value="<?php echo($tripId); ?>">
                    <input type="hidden" name="category" value="<?php echo($category); ?>">
                    <input type="hidden" name="categoryId" value="<?php echo($categoryId); ?>">
                    <div class="form-input">
                        <label>File Name</label>
                        <input required id="fileName" name="fileName" type="text" placeholder="Give a name to your file"/>
                    </div>
                    <div class="form-input">
                        <label>Select file</label>
                        <input id="travelFile" name="travelFile" type="file" />
                    </div>
                    
                    <div class="form-input">
                        <input class="button" type="submit" value="Upload" />
                    </div>
                </form>
            </div>
        </div>
        
    </main>

    <script src="../js/core.js"></script>
    <script src="../js/tripstr.js"></script>

</body>
</html>