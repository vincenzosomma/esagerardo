<?php
include 'C:/xampp/htdocs/incl/db_conn.php';


if(isset($_POST['id'])) {
  $id = $_POST['id'];
 }



	$sql = "UPDATE `orders` SET `status` = 'Accepted' WHERE `orders`.`id` = $id";


	$stmt = $dbc->prepare($sql);
      $stmt->execute();
      if ($stmt->error) {
  		echo "FAILURE!!! " . $stmt->error;
		}
		else header("Location: ../../admin/pages/orders.php?succes=accepted");;
  	  //
		$stmt->close();