  <?php 
include '../pages/header.php';
 ?>
  <div class="w3-container">

        <hr>
        <form action="/incl/a_incl/editprod_inc.php" method="post">
        <table class="w3-table w3-striped w3-white w3-centered w3-hoverable w3-table-all w3-card">
        	<thead>
        		<tr>
        		<td>ID</td>
        		<td>Name</td>
        		<td>Description</td>
        		<td>Category</td>
        		<td>Price</td>
        		<td>Photos</td></tr>

        	</thead>
				<?php
				if(isset($_POST['id'])) {
  				$id = $_POST['id'];
        //we print all the menu by category
				$result = mysqli_query($dbc, "
					SELECT * FROM products
      				WHERE p_id = $id");
					while($row = mysqli_fetch_array($result))
				{
					echo '<tr>';
			        echo '  <td><input id="id" name="id" type="hidden" value ="'.$id.'">'. $id.'</td>';
			        echo '  <td><input id="'.$row["title"].'" name="title" type="text" value="'.$row["title"].'"></td>';
			        echo '  <td><input id="'. $row["desc"].'" name="desc" type="text" value="'. $row["desc"].'"></td>';
			        echo '  <td><input id="'. $row["categ"].'" name="categ" type="text" value="'. $row["categ"].'"></td>';
			        echo '  <td><input id="'. $row["price"].'" name="price" type="number" value="'. $row["price"].'"></td>';
			        echo '  <td><input id="'. $row["img"].'" name="img" type="text" value="'. $row["img"].'"><br>Name Image</td>';
				}
			}
				?>
			</table>
                  <button class="w3-button w3-grey w3-section" type="order">EDIT PRODUCT</button>
                 </form>
                 </div>
  <hr>


 <?php 
include '../pages/footer.php';
 ?>