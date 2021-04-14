  <?php 
include '../pages/header.php';
 ?>




  <hr>
  <div class="w3-container">
	<div class="w3-dropdown-click">

  <button onclick="myFunction()" class="w3-button w3-blue w3-xlarge">Register new user</button>
  <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border w3-large">
			<form action="/incl/a_incl/register_inc.php" method="post">
             <input class="w3-input w3-padding-8 w3-border" type="text" name="f_name" placeholder="First Name"required>
             <input class="w3-input w3-padding-8 w3-border" type="text" name="l_name" placeholder="Last Name"required>
             <input class="w3-input w3-padding-8 w3-border" type="email" name="email" placeholder="Email"required>
			 <input class="w3-input w3-padding-8 w3-border" type="tel" id="phone" name="phone" placeholder="Format: 07000000000" pattern="[0-9]{11}"required>
			 <input class="w3-input w3-padding-8 w3-border" type="text" name="address" placeholder="Address"required>
             <input class="w3-input w3-padding-8 w3-border" type="text" name="postcode" placeholder="Postcode"required>
             <input class="w3-input w3-padding-8 w3-border" type="password" name="password" placeholder="Password"required>
             <input class="w3-input w3-padding-8 w3-border" type="password" name="confirmpassword" placeholder="Confirm Password"required><br>
             <button class="w3-center w3-button w3-black" type="submit" name="submit">Register</button>
          </form>

  </div>
</div>
<hr>
  	        <?php
  	        //messages for actions
  	        if (isset($_GET['row'])){
				if($_GET['row'] == 'deleted'){
				echo '<b style="color:red;">User Deleted!</b>';}}
       			 if (isset($_GET['succes'])){
       			 if($_GET['succes'] == 'edited'){
       			 echo '<b style="color:Green;">User Edited!</b>';}}
       			  if (isset($_GET['succes'])){
       			 if($_GET['succes'] == 'Pedited'){
       			 echo '<b style="color:Green;">Password Edited!</b>';}}


				if (isset($_GET['error'])){
					if($_GET['error'] == 'emptyfields'){
					echo "All fields must be Required!";
					}elseif ($_GET['error'] == 'invalidname'){
					echo '<span style="color:red;">Invalid Charatcter</span>';	
					}elseif ($_GET['error'] == 'invalidphone'){
					echo '<span style="color:red;">Invalid Phone number </span>';	
					}elseif ($_GET['error'] == 'passwordsdonotmatch'){
					echo '<span style="color:red;">Passwords do not Match</span>';	
					}elseif ($_GET['error']== 'alreadymember') {
					echo '<span style="color:red;">Already member<?span>';
					}elseif ($_GET['error']== 'SQLerror') {
					echo '<span style="color:red;">Someting went wrong, Try again!<?span>';
					}elseif ($_GET['error'] == 'registred'){
					echo '<span style="color:green;">Signed up, Thank you!<?span>';
					}
				}
		?>
<?php 

// Perform query with inner join to import name product
$result = mysqli_query($dbc, "
			SELECT *
			FROM users

			ORDER BY `date` DESC");
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
            echo '  <td> '.$row["u_id"].'</td>';
            echo '  <td> '.$row["f_name"].'</td>';
            echo '  <td> '.$row["l_name"].'</td>';
            echo '  <td> '.$row["email"].'</td>';
            echo '  <td> '.$row["phone"].'</td>';
            echo '  <td> '.$row["address"].'</td>';
            echo '  <td> '.$row["postcode"].'</td>';
            echo '  <td><form action="/incl/a_incl/chagepass.php" method="post">';

            echo '      <input name="p_id" type="password" value ="">
           				 <input name="u_id" type="hidden" value ="' .$row["u_id"].'">
          				<button class="w3-button w3-red" type="submit" value="Del">Change Pass</button>
            		</form></td>';
			echo '  <td> '.$row["date"].'</td>';
			echo '  <td> '.$row["roles"].'</td>';
        echo '  <td> ';
            // edit button
                    // Chage password button

            echo '    <form action="/admin/pages/edituser.php" method="post">';
            echo '      <input name="u_id" type="hidden" value ="'.$row['u_id'].'">';
            echo '      <button class="w3-button w3-orange" type="submit" value="Edit">Edit</button>';
            echo '    </form>';
            // delete button
            echo '    <form action="/incl/a_incl/usercanc.php" method="post">';
            echo '      <input name="id" type="hidden" value ="' .$row["u_id"].'">';
            echo '      <button class="w3-button w3-red" type="submit" value="Del">Cancel</button>';
            echo '    </form>';
            echo '  </td>';
            echo '</tr>';
        }else{
          echo '<br><br><br></td>';
            echo '</tr>';
          }

        // output data of each row + total
        while ($row = mysqli_fetch_assoc($result)) {
 			echo '<tr>';
            echo '  <td> '.$row["u_id"].'</td>';
            echo '  <td> '.$row["f_name"].'</td>';
            echo '  <td> '.$row["l_name"].'</td>';
            echo '  <td> '.$row["email"].'</td>';
            echo '  <td> '.$row["phone"].'</td>';
            echo '  <td> '.$row["address"].'</td>';
            echo '  <td> '.$row["postcode"].'</td>';
            echo '  <td><form action="/incl/a_incl/chagepass.php" method="post">';

            echo '   <input name="password" type="password" value ="">
           			 <input name="u_id" type="hidden" value ="' .$row["u_id"].'">
          			<button class="w3-button w3-red" type="submit" value="Del">Change Pass</button>
            		</form></td>';
			echo '  <td> '.$row["date"].'</td>';
			echo '  <td> '.$row["roles"].'</td>';
            
            // the edit/delete buttons
            echo '  <td> ';
            //	Order status editable
            // edit button
            echo '    <form action="/admin/pages/edituser.php" method="post">';
            echo '      <input name="u_id" type="hidden" value ="'.$row['u_id'].'">';
            echo '      <button class="w3-button w3-orange" type="submit" value="Edit">Edit</button>';
            echo '    </form>';
            // delete button
            echo '    <form action="/incl/a_incl/usercanc.php" method="post">';
            echo '      <input name="id" type="hidden" value ="' .$row['u_id'].'">';
            echo '      <button class="w3-button w3-red" type="submit" value="Del">Cancel</button>';
            echo '    </form>';
            echo '  </td>';
            echo '</tr>';
        }

        // close table tag
        echo "</table>";
?>

<hr>


 <?php 
include '../pages/footer.php';
 ?>


