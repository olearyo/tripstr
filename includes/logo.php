<?php 
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/base-css.css">

<style>
</style>
</head>
<body>

<div id="navbar">
    <a href="show-trips-dashboard.php"><img id="logo" src="../img/tripstr-logo.png"></a>
</div>


<script>
var beforeScroll = window.pageYOffset;
window.onscroll = function() {
var duringScroll = window.pageYOffset;
  if (beforeScroll > duringScroll) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-200px";
  }
  beforeScroll = duringScroll;
}
</script>

</body>
</html>