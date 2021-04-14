<?php 
include '../admin/pages/header.php';
 ?>


  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Charts - Most Products Ordered </h5>
         <div id="donutchart" style="max-width: 500px; height:auto;"></div>
      </div>
      <div class="w3-twothird">
         <h5>Charts - Orders overview </h5>
  		<div id="top_x_div" style="max-width: 100%; height:auto;"></div>


      </div>
    </div>
  </div>
  
  <hr>
  <div class="w3-container">
          </td></tr><table class="w3-table w3-striped w3-white w3-hoverable w3-table-all w3-card">
          <tr>
            <td><i class="  fa fa-clone w3-text-blue w3-large"></i></td>
            <td>All ordes</td>
            <td><i>
            <?php $result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `orders`");
            $row = mysqli_fetch_array($result);
            $toatalCount = array_shift($row);
            echo $toatalCount;
            ?>
            </i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>Users</td>
            <td><i> <?php 
            $result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `users`");
            $row = mysqli_fetch_array($result);
            $usertot = array_shift($row);
            echo $usertot;
           ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-diamond w3-text-red w3-large"></i></td>
            <td>Products</td>
            <td><i><?php 
            $result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `products`");
            $row = mysqli_fetch_array($result);
            $usertot = array_shift($row);
            echo $usertot;
           ?></i></td>
          </tr>
        </table>
  <hr>
    <div class="w3-container">
    <h5>Best 5 Clients</h5>
    <table class="w3-table w3-striped w3-white w3-centered w3-hoverable w3-table-all w3-card">
    	<thead><tr><td>User ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Tot orders</td></tr>
            </thead>
        <?php 
            $result = mysqli_query($dbc, "
									SELECT users.u_id, users.f_name, users.l_name, users.email,
									COUNT(DISTINCT orders.id) as count 
									FROM users
									INNER JOIN orders ON orders.user_id = users.u_id
									GROUP BY users.f_name  
									ORDER BY `count`  DESC LIMIT 5");
            $row = mysqli_fetch_array($result);
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $eml = $row['email'];
            $id = $row['u_id'];
            $cnt = $row['count'];
            echo '
            <tr><td><i class="fa fa-user-circle"></i>
            '.$id.'</td>
            <td>'. $fname.'</td>
            <td>'. $lname.'</td>
            <td>'. $eml.'</td>
            <td>'. $cnt.'</td></tr>';
            while($row = mysqli_fetch_array($result))
           {
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $eml = $row['email'];
            $id = $row['u_id'];
            $cnt = $row['count'];
            echo '
            <tr><td><i class="fa fa-user-circle"></i>
            '.$id.'</td>
            <td>'. $fname.'</td>
            <td>'. $lname.'</td>
            <td>'. $eml.'</td>
            <td>'. $cnt.'</td></tr>';
          }
           ?>
        
</table>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
   <table class="w3-table w3-striped w3-white w3-centered w3-hoverable w3-table-all w3-card">
        <?php 
            $result = mysqli_query($dbc, "SELECT * FROM `users` ORDER BY `date` DESC LIMIT 3");
            $row = mysqli_fetch_array($result);
            $users = $row['f_name'];
            $datus = $row['date'];
            $eml =  $row['email'];
            echo '
            <tr><td><i class="fa fa-user-circle-o"></i>
            '.$users.'
            </td><td>'. $datus.'</td><td>'.$eml.'</td></tr>';
            while($row = mysqli_fetch_array($result))
           {
           $users = $row['f_name'];
            $datus = $row['date'];
            $eml =  $row['email'];
           echo '
            <tr><td><i class="fa fa-user-circle-o"></i>
            '.$users.'
            </td><td>'. $datus.'</td><td>'.$eml.'</td></tr>';
          }
           ?>
        
</table>
  </div>
  <hr>

 <?php 
include '../admin/pages/footer.php';
 ?>