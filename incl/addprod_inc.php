<?php

if (isset($_POST['submit'])) {
  //add database connections
  require '../incl/db_conn.php';
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $categ = $_POST['categ'];
  $price = $_POST['price'];
  $img = $_POST['img'];

  if (empty($title) || empty($desc) || empty($categ) || empty($price) || empty($img))
  {
    //link header return error
          header("Location: ../admin/pages/products.php?error=emptyfields");
     
          exit();
  } elseif (!preg_match("/^[a-zA-Z0-9]*/", $title)) {
    //       //control charateers on the fname...
          header("Location: ../admin/pages/products.php?error=invalidchar");
          exit();
  } else {
          // check if the fname is aleady on the database
          $p_sql = "SELECT title FROM `products` WHERE title = ?";
           // in the end of the code we use the symbols  =? (placed olders) to prevent malicius query into the DB
          $stmt = mysqli_stmt_init($dbc);
          // we use the $stmt (statment) equal to a function that stand for inizialize
          //connection on the SQLiteDatabase
          if (!mysqli_stmt_prepare($stmt, $p_sql)) {
          //if the connection to the connectoin to the database don't go true
          //and we cannot match, we print an error message
          header("Location: ../admin/pages/products.php?error=SQLerror");
          exit();
        }else {
          // bind the $stmt statement   //"s" stand for string
            mysqli_stmt_bind_param($stmt, "s", $title);
            //execute $stmt
            mysqli_stmt_execute($stmt);
            //store the result
            mysqli_stmt_store_result($stmt);
            //check how many row we get back from the database (if there are another email)
            //if we get 0 row back frim the database the email do not exist
            $rowcount = mysqli_stmt_num_rows ($stmt);
          if ($rowcount > 0){
            header("Location: ../admin/pages/products.php?error=alreadyonthedb");
            exit();
          }else{
            $p_sql = "INSERT INTO `products` (`p_id`, `title`, `desc`, `categ`, `price`, `img`) VALUES (NULL, ?, ? , ?, ?, ?)";
            //VALUES(?, ?) placed orders
              $stmt = mysqli_stmt_init($dbc);
              if (!mysqli_stmt_prepare($stmt, $p_sql)) {
                  header("Location: ../admin/pages/products.php?error=SQLerror2");
                  exit();
              } else {
                mysqli_stmt_bind_param($stmt, "sssss", $title, $desc, $categ, $price, $img);
                mysqli_stmt_execute($stmt);
                header("Location: ../admin/pages/products.php?error=registredsucces");
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
