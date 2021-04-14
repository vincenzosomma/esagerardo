<?php
include 'C:/xampp/htdocs/incl/db_conn.php';


if(isset($_POST['id'])) {
  $id = $_POST['id'];
}
 if(isset($_POST['quantity'])) {
  $qnt= $_POST['quantity'];
}
if(isset($_POST['address'])){
  $adr= $_POST['address'];
 }
 if(isset($_POST['notes'])){
  $nt= $_POST['notes'];
}
if(isset($_POST['delivery'])){
  $del = $_POST['delivery'];
  }
if(isset($_POST['postcode'])){
  $post = $_POST['postcode'];
 }



	$sql = "UPDATE `orders` SET `quantity` = ?, `address` = ?, `postcode` = ?, `notes` = ?, `delivery` = ? WHERE `orders`.`id` = ?";


	$stmt = $dbc->prepare($sql);

      //bind parametres
      $stmt->bind_param("ssssss", $qnt, $adr, $post, $nt, $del, $id);
      $stmt->execute();
      if ($stmt->error) {
  		echo "FAILURE!!! " . $stmt->error;
		}
		else header("Location: ../pages/orderhistory.php?succes=edited");;
  	  //
		$stmt->close();