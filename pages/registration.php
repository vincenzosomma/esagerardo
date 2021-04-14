<?php
require '../pages/header.php';

?>


<div class="w3-container" id="where" style="padding:32px;">
  <div class="w3-content" style="max-width:700px">
  	<br>
         <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Sign up</span></h5>
         <p>Already have an account <a href="/pages/login.php">Log in!</a> </p>
           <form action="/incl/register_inc.php" method="post">
             <input class="w3-input w3-padding-16 w3-border" type="text" name="f_name" placeholder="First Name"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="l_name" placeholder="Last Name"required>
             <input class="w3-input w3-padding-16 w3-border" type="email" name="email" placeholder="Email"required>
			 <input class="w3-input w3-padding-16 w3-border" type="tel" id="phone" name="phone" placeholder="Format: 07000000000" pattern="[0-9]{11}"required>
			 <input class="w3-input w3-padding-16 w3-border" type="text" name="address" placeholder="Address"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="postcode" placeholder="Postcode"required>
             <input class="w3-input w3-padding-16 w3-border" type="password" name="password" placeholder="Password"required>
             <input class="w3-input w3-padding-16 w3-border" type="password" name="confirmpassword" placeholder="Confirm Password"required><br>

             <button class="w3-center w3-button w3-black" type="submit" name="submit">Register</button>
                         <?php
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
          </form>
</div>
</div>

<?php
  include '../pages/footer.php';
?>
