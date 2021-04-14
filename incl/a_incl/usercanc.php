<?php
include 'C:/xampp/htdocs/incl/db_conn.php';

if(isset($_POST['id'])) {
  $id = $_POST['id'];

 $resulto = mysqli_query($dbc, "DELETE FROM `users` WHERE `u_id` = $id");
		if($row = mysqli_fetch_array($resulto)) {
	header('location: ../../admin/pages/users.php?row=deleted');
  }else {
    echo "Order does not exist!";
  }

  header('location: ../../admin/pages/users.php?row=deleted');
}
