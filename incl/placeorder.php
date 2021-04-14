<?php
require '../pages/header.php';

  $total = 0;
  //for each inpput we se a key to increment the value end run the query
 
  foreach ($_POST as $key => $value)
  {
    $result = mysqli_query($dbc, "SELECT * FROM products WHERE p_id = $key");
    
      if (!is_numeric($value)) {
      exit();
      }else{
    while($row = mysqli_fetch_array($result))
    {

      $price = $row['price'];
      $item_name = $row['title'];
      $item_id = $row['p_id'];
      $address= $_POST['address'];
      $message= $_POST['message'];
      $postcode= $_POST['postcode'];
      $date = $_POST['datetime'];
      //we reprint user id because was boolean
      $user_id= $userid;
      

      }
  }
      $price = $value * $price;
      $stmt = $dbc->prepare ("INSERT INTO `orders`(`id`, `p_id`, `quantity`, `user_id`, `address`, `postcode`, `notes`, `created`, `status`, `delivery`) VALUES (NULL, ? , '1' , ?, ?, ?, ?, current_timestamp(), 'Pending', ?)");
      //bind parametres
      $stmt->bind_param("ssssss", $item_id, $user_id, $address, $postcode, $message, $date);
      $stmt->execute();
  header("Location: ../pages/orderhistory.php?succes=ordered");
}

 ?> 
