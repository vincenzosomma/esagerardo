<?php
  session_start();
  include 'C:/xampp/htdocs/incl/db_conn.php';
  if (isset($_SESSION['sessionid'])) {
  $userid=$_SESSION['sessionid'];
  $username=$_SESSION['sessionuser'];
  $roles = $_SESSION['roles'];}else{
  }

?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">
<link rel="icon" href="/imgs/favicon.ico" type="image/x-icon">
<meta name="author" content="Vincenzo Somma">
<title>Esagerardo - Italian Kitchen</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button"><b>Close Menu</b></a>
  <a href="/index.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
    <?php if(isset($_SESSION["sessionuser"]) && $roles === 1){
   echo '<a href="/pages/ordercast.php" onclick="w3_close()" class="w3-center w3-button w3-black">you are logged in! <br>' . $_SESSION['sessionuser']. '</a>' .
   '<a href="/pages/ordercast.php" onclick="w3_close()" class="w3-bar-item w3-button">Order</a>' . '<a href="/incl/logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Log out!</a>'.' <a href="/admin/index.php" onclick="w3_close()" class="w3-bar-item w3-button"><b class="w3-red">ADMIN</b></a>';
    }elseif(isset($_SESSION["sessionuser"])) {
    echo '<a href="/pages/ordercast.php" onclick="w3_close()" class="w3-center w3-button w3-black">you are logged in! <br>' . $_SESSION['sessionuser']. '</a>' .
   '<a href="/pages/ordercast.php" onclick="w3_close()" class="w3-bar-item w3-button">Order</a>' . '<a href="/incl/logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-border">Log out!</a>';
 }else{
    echo '<a href="/pages/login.php" onclick="w3_close()" class="w3-bar-item w3-button">Log in</a>
    <a href="/pages/registration.php" onclick="w3_close()" class="w3-bar-item w3-button">Sign up!</a>';
 }
   ?>

  <!--<a href="../pages/booknow.php" onclick="w3_close()" class="w3-bar-item w3-button">Book Now</a>-->
  
  


</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="navc w3-xlarge" style="max-width:100%;margin:auto">
    <div class="w3-button imen w3-padding-top-32 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-32" style="margin-right:1%">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
  		<i class="fa fa-instagram w3-hover-opacity"></i>
  		<i class="fa fa-youtube w3-hover-opacity"></i>
  		</div>
    <div class="w3-center w3-padding-16">
    	<a href="../index.php">
		<img border="0" alt="esagerardo" src="/imgs/full_lg_b2.png" width="220" height="auto" style="margin-left:55px">
</a></div>
  </div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">⇪</button>