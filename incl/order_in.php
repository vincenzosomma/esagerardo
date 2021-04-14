     <?php 
      include 'C:/xampp/htdocs/incl/db_conn.php';

 foreach ($_POST as $key => $value)
  {
      //we reprint user id because was boolean
      $user_id= $_POST['user_id'];
      $item_id = $_POST['item_id'];
      $value =$_POST['value'];
      $message= $_POST['message'];
      $dat= $_POST['postcode'];
      $postcode= $_POST['postcode'];
      $address= $_POST['addr'];
      $dat= $_POST['date'];
 } 
     
    $sql = "INSERT INTO `orders` (`id`, `p_id`, `quantity`, `user_id`, `address`, `postcode`, `notes`, `created`, `status`, `delivery`) VALUES (NULL, ?, ?, ?, ?, ?, ?, current_timestamp(), 'Pending', ?)";
      //bind parametres
	 
      	$stmt = mysqli_stmt_init($dbc);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "error";;
                  exit();
              } else {
              	mysqli_stmt_bind_param($stmt,"sssssss", $item_id, $value, $user_id, $address, $postcode, $message, $dat);
                mysqli_stmt_execute($stmt);
                header("Location: ../pages/orderhistory.php?error=registred");

  	}



  ?>