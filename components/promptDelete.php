<?php
$yes = $_GET['yes'];
$no = $_GET['no'];
$tripId = $_GET['tripId'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prompt</title>
    <link rel="stylesheet" href="../css/base-css.css">

</head>
<body>
<div id="popup" class="prompt-container">
        <div class="prompt-content">
            <p>Are you sure you want to delete the record?</p>
            <a id="no" class="button" href="<?php echo $no.'&tripId='.$tripId ?>">Cancel</a>
            <a id="yes" class="button secondary" href="<?php echo $yes ?>">Delete</a>
        </div>
</div>
</body>
</html>
