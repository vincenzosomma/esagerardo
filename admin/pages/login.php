<!DOCTYPE html>
<html>
<title>Admin - Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<div class="w3-container" id="where" style="padding:32px;">
  <div class="w3-content" style="max-width:700px">
         <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Log in</span></h5>

           <form action="/incl/a_incl/a_login_inc.php" method="post"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="user" placeholder="Insert Username or First Name"required>
             <input class="w3-input w3-padding-16 w3-border" type="password" name="password" placeholder="Password"required><br>
             <button class="w3-center w3-button w3-black" type="submit" name="submit">Register</button>
        <?php  
        if (isset($_GET['error'])){
					if($_GET['error'] == 'wrongpass'){
					echo "Invalid Password!";
					}elseif ($_GET['error'] == 'nomember'){
					echo '<span style="color:red;">Invalid email</span>';	
					}
				}
				?>
          </form>
</div>
</div>

</body>
</html>