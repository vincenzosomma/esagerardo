 <?php 
include 'C:/xampp/htdocs/incl/db_conn.php';

if(isset($_POST['u_id'])) {
  $id = $_POST['u_id'];
}
 if(isset($_POST['f_name'])) {
  $fname = $_POST['f_name'];
}
 if(isset($_POST['l_name'])) {
  $lname= $_POST['l_name'];
}
if(isset($_POST['email'])){
  $eml= $_POST['email'];
 }
 if(isset($_POST['phone'])){
  $ph= $_POST['phone'];
}
if(isset($_POST['address'])){
  $adr = $_POST['address'];
  }
if(isset($_POST['postcode'])){
  $post = $_POST['postcode'];
 }
 if(isset($_POST['roles'])){
  $rl = $_POST['roles'];
 }

	$sql = "UPDATE `users` SET `f_name` = ?, `l_name` = ?, `email` = ?, `phone` = ?, `address` = ? ,`postcode` = ?, `roles` = ? WHERE `users`.`u_id` = $id";


	$stmt = $dbc->prepare($sql);

      //bind parametres
      $stmt->bind_param("sssssss", $fname, $lname, $eml, $ph, $adr, $post, $rl);
      $stmt->execute();
      if ($stmt->error) {
  		echo "FAILURE!!! " . $stmt->error;
		}
		else header("Location: ../../admin/pages/users.php?succes=edited");
  	  //
		$stmt->close();
