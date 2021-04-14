<?php

if (isset($_POST['submit'])) {
  //add database connections
 include 'C:/xampp/htdocs/incl/db_conn.php';

  $fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $postcode = $_POST['postcode'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];

  if (empty($fname) || (empty($lname)) || (empty($email)) || (empty($phone)) || (empty($address)) || (empty($postcode)) || empty($password) || empty($confirmpassword))
  {
    //link header return error
          header("Location: ../../admin/pages/users.php?error=emptyfields&=" . $fname);
     
          exit();
  } elseif (!preg_match("/^[a-zA-Z0-9]*/", $fname)) {
    //       //control charateers on the fname...
          header("Location: ../../admin/pages/users.php?error=invalidname&fname=" . $fname);
          exit();
  } elseif (!preg_match("/^[a-zA-Z0-9]*/", $lname)) {
    //       //control charateers on the lname...
          header("Location: ../../admin/pages/users.php?error=invalidsurname&lname=" . $lname);
          $message = "Invalid Charatcter";
          exit();
} elseif (!preg_match("/^[0-9]*/", $phone)) {
    //       //control charateers on the phone...
          header("Location: ../../admin/pages/users.php?error=invalidphone&phone=" . $fname);
          exit();
  } elseif ($password != $confirmpassword) {
    // check if the passwords are the same
        header("Location: ../../admin/pages/users.php?error=passwordsdonotmatch&fname=" . $fname);
        exit();
  } else {
          // check if the fname is aleady on the database
          $r_sql = "SELECT email FROM `users` WHERE email = ?";
           // in the end of the code we use the symbols  =? (placed olders) to prevent malicius query into the DB
          $stmt = mysqli_stmt_init($dbc);
          // we use the $stmt (statment) equal to a function that stand for inizialize
          //connection on the SQLiteDatabase
          if (!mysqli_stmt_prepare($stmt, $r_sql)) {
          //if the connection to the connectoin to the database don't go true
          //and we cannot match, we print an error message
          header("Location: ../../admin/pages/users.php?error=SQLerror1");
          exit();
        }else {
          // bind the $stmt statement   //"s" stand for string
            mysqli_stmt_bind_param($stmt, "s", $email);
            //execute $stmt
            mysqli_stmt_execute($stmt);
            //store the result
            mysqli_stmt_store_result($stmt);
            //check how many row we get back from the database (if there are another email)
            //if we get 0 row back frim the database the email do not exist
            $rowcount = mysqli_stmt_num_rows ($stmt);
          if ($rowcount > 0){
            header("Location: ../../admin/pages/users.php?error=alreadymember");
            exit();
          }else{
            //insert fname and password into the database
            $r_sql = "INSERT INTO `users` (`u_id`, `f_name`, `l_name`, `email`, `phone`, `address`, `postcode`, `password`, `date`, `roles`) VALUES (NULL,?, ? , ?, ?, ?, ?, ?, current_timestamp(), '2')";
            //VALUES(?, ?) placed orders
              $stmt = mysqli_stmt_init($dbc);
              if (!mysqli_stmt_prepare($stmt, $r_sql)) {
                  header("Location: ../../admin/pages/users.php?error=SQLerror2");
                  exit();
              } else {
              /* we have insert password an "s" because we insert the data into the SQLiteDatabase
                //we need to put one more s becouse we are writhing another string and the order needs to be as writen into the quesi INSERT */
                //hashing the psaword (encrypt)
                //we using bcrypt instead md5 or md7 bacuse bcrypt is updated
                $hashedpass = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $email, $phone, $address, $postcode, $hashedpass);
                mysqli_stmt_execute($stmt);
                header("Location: ../../admin/pages/users.php?error=registred");
                exit();

              }
          }
        }

  }
  //closing database connections
  mysqli_stmt_close($stmt);
  mysqli_close($dbc);

}


 ?>
