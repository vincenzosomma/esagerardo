<?php
include 'C:/xampp/htdocs/incl/db_conn.php';
if(isset($_POST['u_id'])) {
  $id = $_POST['u_id'];
}
 if(isset($_POST['password'])) {
  $password = $_POST['password'];
}

            $sql = "UPDATE `users` SET `password` = ? WHERE `users`.`u_id` = $id";

			$stmt = $dbc->prepare($sql);
	  $hashedpass = password_hash($password, PASSWORD_DEFAULT);
      $stmt->bind_param("s", $hashedpass);
      $stmt->execute();
      if ($stmt->error) {
  		echo "FAILURE!!! " . $stmt->error;

              }else header("Location: ../../admin/pages/users.php?succes=Pedited");
				$stmt->close();


















?>