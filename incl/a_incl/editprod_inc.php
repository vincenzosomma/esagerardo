<?php
include 'C:/xampp/htdocs/incl/db_conn.php';


if(isset($_POST['id'])) {
  $id = $_POST['id'];
}
 if(isset($_POST['title'])) {
  $tit= $_POST['title'];
}
if(isset($_POST['desc'])){
  $des= $_POST['desc'];
 }
 if(isset($_POST['categ'])){
  $cat= $_POST['categ'];
}
if(isset($_POST['price'])){
  $pri = $_POST['price'];
  }
if(isset($_POST['img'])){
  $img = $_POST['img'];
 }



	$sql = "UPDATE `products` SET `title` = ?, `desc` = ?, `categ` = ?, `price` =?, `img` = ? WHERE `products`.`p_id` = ?";


	$stmt = $dbc->prepare($sql);

      //bind parametres
      $stmt->bind_param("ssssss", $tit, $des, $cat, $pri, $img, $id);
      $stmt->execute();
      if ($stmt->error) {
  		echo "FAILURE!!! " . $stmt->error;
		}
		else header("Location: ../../admin/pages/products.php?succes=edited");;
  	  //
		$stmt->close();