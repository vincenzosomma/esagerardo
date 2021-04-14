  <?php 
include '../pages/header.php';
 ?>




  <hr>
  <div class="w3-container">
  <form action="/incl/a_incl/useredit_inc.php" method="post">
<?php 
if(isset($_POST['u_id'])) {
  $id = $_POST['u_id'];

// Perform query with inner join to import name product
$result = mysqli_query($dbc, "
			SELECT * FROM `users`
      		WHERE `u_id` = $id");
		if($row = mysqli_fetch_array($result)) {
      // output table tag
        
        echo '<table class="w3-table w3-striped w3-white w3-hoverable w3-bordered w3-centered w3-table-all w3-card w3-small w3-responsive">';

        // output table header first row

      	echo '<thead><tr>'; // table row
        echo '  <th>User ID</th>';
        echo '  <th>First Name</th>';
        echo '  <th>Last Name</th>';
        echo '  <th>Email</th>';
        echo '  <th>Phone</th>';
        echo '  <th>Address</th>';
        echo '  <th>Postcode</th>';
        echo '  <th>Password</th>';
        echo '  <th>Date</th>';
        echo '  <th>Role</th>';
        // the edit/delete buttons column
        echo '</tr></thead>';
        // output table header others rows
 			echo '<tr>';
            echo '  <td> <input name="u_id" type="hidden" value ="'.$row["u_id"].'">'.$row["u_id"].'</td>';
            echo '  <td> <input name="f_name" type="text" value ="'.$row["f_name"].'"></td>';
            echo '  <td> <input name="l_name" type="text" value ="'.$row["l_name"].'"></td>';
            echo '  <td> <input name="email" type="text" value ="'.$row["email"].'"></td>';
            echo '  <td> <input name="phone" type="text" value ="'.$row["phone"].'"></td>';
            echo '  <td> <input name="address" type="text" value ="'.$row["address"].'"></td>';
            echo '  <td> <input name="postcode" type="text" value ="'.$row["postcode"].'"></td>';
            echo '  <td> <input name="password" type="password" value ="'.$row["password"].'"></td>';
			echo '  <td> <input name="date" type="hidden" value ="'.$row["date"].'">'.$row["date"].'</td>';
			echo '  <td> <input name="roles" type="text" value ="'.$row["roles"].'"></td>';
    		echo '</tr></tbody> </table>';
    } else {
        echo "<p>No results returned</p>";
 }
}
?>
                  <button class="w3-button w3-grey w3-section" type="order">EDIT USER</button>
                 </form>
                 </div>
  <hr>


 <?php 
include '../pages/footer.php';
 ?>