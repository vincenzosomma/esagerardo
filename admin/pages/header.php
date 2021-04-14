<?php 
 include 'C:/xampp/htdocs/incl/db_conn.php';
 session_start();
   $userid=$_SESSION['sessionid'];
  $username=$_SESSION['sessionuser'];
  $roles = $_SESSION['roles'];
  if ($roles != 1) {
    # Roles Check
     header("Location: ../admin/pages/login.php");
  }else{
        }
 ?>


<!DOCTYPE html>
<html>
<head>
<title>Admin - Esagerardo</title>
<link rel="shortcut icon" href="/imgs/favicon.ico" type="image/x-icon">
<link rel="icon" href="/imgs/favicon.ico" type="image/x-icon">
<meta charset="UTF-8">
  <meta name="author" content="Vincenzo Somma">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Script Charts -->
<!-- Pie  Overview orders-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Ordered'],
          			 <?php 
          			 $query = "SELECT `title`, SUM(`quantity`) 
						AS quantity FROM `orders` 
						INNER JOIN products ON orders.p_id = products.p_id
						GROUP BY `title`";
							$exec = mysqli_query($dbc,$query);
          				 while($row = mysqli_fetch_array($exec)){ 
          					echo "['".$row['title']."',".$row['quantity']."],";
          }
          ?>

        ]);
        var options = {
          title: 'Products Ordered',
          pieHole: 0.2,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
	//CHARt ORDER
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Date', 'Amount'],
<?php 
$query = "SELECT orders.`id`, users.`f_name`, (products.`price` * orders.`quantity`) as tot , orders.`created`
			FROM orders
			INNER JOIN users
			ON orders.`user_id` = users.`u_id`
            LEFT JOIN products ON orders.p_id = products.p_id
			ORDER BY orders.`created` DESC LIMIT 10 ";
							$exec = mysqli_query($dbc,$query);
          				 while($row = mysqli_fetch_array($exec)){ 
          					echo "['".$row['f_name']."',".$row['tot']."],";
          }
          ?>
        ]);

        var options = {
          legend: { position: 'none' },
          chart: {
            title: 'Last Orders',
            subtitle: 'Amount Last 10 ordes' },
          axes: {
            x: {
              0: { side: 'top', label: 'Sales'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>




</head>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><img alt="esagerardo" src="/imgs/full_lg_w2.png" width="100" height="auto"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left w3-padding-top-24" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">

    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php 
		echo$username; ?> </strong></span><br>
      <?php 
		echo date("Y-m-d") . "<br>";
		echo date("l") . "<br>"; ?>
      <a href="/incl/logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out" style="color:red"></i>Log out</a>
      <a href="/index.php" class="w3-bar-item w3-button"><i class="fa fa-desktop" style="color:blue"></i>Home website</a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="/admin/index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-eye fa-fw"></i>  Overview</a>
    <a href="/admin/pages/orders.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-clone"></i>  Orders</a>
    <a href="/admin/pages/users.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Users</a>
    <a href="/admin/pages/products.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> Products</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>



<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:10px;">

  <!-- Header  -->
  <header class="w3-container" style="padding-top:35px">
    <h5><b><i class="fa fa-dashboard"></i>Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class=" fa fa-clone w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php 
            $result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `orders` WHERE `status` = 'Pending'");
            $row = mysqli_fetch_array($result);
            $toatalCount = array_shift($row);
            echo $toatalCount;
           ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Pending Orders</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue-grey w3-padding-16">
        <div class="w3-left"><i class="	fa fa-clone w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php 
          	$result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `orders` WHERE `status` = 'Accepted'");
          	$row = mysqli_fetch_array($result);
          	$toatalCount = array_shift($row);
          	echo $toatalCount;
           ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Accepted Orders</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-dark-grey w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-money w3-xxxlarge"></i></div>
        <div class="w3-right">
            <h3>
            	<?php 

            $pricetot2=0;
          	$sum = 0;
			$result = mysqli_query($dbc, "
			SELECT products.`price` * orders.`quantity`
			FROM orders 
			INNER JOIN products ON orders.p_id = products.p_id 
			WHERE `status` = 'Accepted'");
			$row = mysqli_fetch_array($result);
        // output data of each row + total
			$pricetot = $row["products.`price` * orders.`quantity`"];
			$pricetot2 =$pricetot2 + $pricetot;
        	while ($row = mysqli_fetch_assoc($result)) {
            $pricetot = $row["products.`price` * orders.`quantity`"];
          	$pricetot2 =$pricetot2 + $pricetot;
	}		
	
    echo $pricetot2; 
        ?>
    </div>
        <div class="w3-clear"></div>
        <h4>Earned</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>
          	<?php 
           	$result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `users`");
           	$row = mysqli_fetch_array($result);
          	$usertot = array_shift($row);
          	echo $usertot;
           ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>