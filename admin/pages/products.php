  <?php 
include '../pages/header.php';
 ?>


<div class="w3-container">
	  <hr>
	
  <button onclick="myFunction()" class="w3-button w3-blue w3-xlarge">Add new Product</button>
  <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border w3-large">
           <form action="/incl/addprod_inc.php" method="post"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="title" placeholder="Name Dish"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="desc" placeholder="Descrition"required><br>
  			<label>Please select the category:</label>
  			<table>
			  <tr><td><input class="w3-input w3-padding-8 w3-border" type="radio" id="starter" name="categ" value="starter"></td></tr>
			 <td><label for="starter">Starter</label></td>
			 <tr><td> <input  class="w3-input w3-padding-8 w3-border" type="radio" id="other" name="categ" value="pasta"></td></tr>
			  <td><label  vfor="other">Pasta</label></td>
			  <tr><td><input class="w3-center w3-input w3-padding-8 w3-border" type="radio" id="other" name="categ" value="sides"></td></tr>
			  <td><label for="other">Sides</label></td>
			 </table>
			 <input class="w3-input w3-padding-16 w3-border" type="number" name="price" placeholder="Price" step="any"required>
			 <input class="w3-input w3-padding-16 w3-border" type="text" name="img" placeholder="Name Imagename"required>
             <button class="w3-center w3-button w3-black" type="submit" name="submit">ADD Product</button>
                         
          </form>

</div>
 <?php
				if (isset($_GET['error'])){
					if($_GET['error'] == 'emptyfields'){
					echo "All fields must be Required!";
					}elseif ($_GET['error'] == 'invalidchar'){
					echo '<span style="color:red;">Invalid Charatcter</span>';	
					}elseif ($_GET['error']== 'alreadyonthedb') {
					echo '<span style="color:red;">Already Added<?span>';
					}elseif ($_GET['error']== 'SQLerror') {
					echo '<span style="color:red;">Someting went wrong, Try again!<?span>';
					}else{
					echo '<b><span style="color:green;">Added!</span></b>'; 
					}
				}
				?>
  
  <div class="w3-container">

        <?php if (isset($_GET['row'])){
		if($_GET['row'] == 'deleted'){
		echo '<b style="color:red;">Product Deleted!</b>';}}
        if (isset($_GET['succes'])){
        if($_GET['succes'] == 'edited'){
        echo '<b style="color:Green;">Product Edited!</b>';}}
        if (isset($_GET['succes'])){
        if($_GET['succes'] == 'accepted'){
        echo '<b style="color:Green;">Order Accepted!</b>';}}
        ?>
        <hr>
        <table class="w3-table w3-striped w3-white w3-centered w3-hoverable w3-table-all w3-card">
        	<thead>
        		<tr><td>Photos</td>
        		<td>Category</td>
        		<td>Name</td>
        		<td>Description</td>
        		<td>Price</td>
        		<td>Action</td></tr>

        	</thead>
				<?php
        //we print all the menu by category
				$result = mysqli_query($dbc, "SELECT * FROM products ORDER by categ;");
				while($row = mysqli_fetch_array($result))
				{
					$id=$row['p_id'];
					echo '<tr><td>
          				<img src="/imgs/photos_men/'.$row["img"].'.jpg" alt="'.$row["img"].'"style="width:200px;height:auto;"></td><td>'.$row["categ"].'</td>
          				<td>'.$row["title"].'</td>' .'<td>'.$row["desc"].' <td>£' . $row["price"].'</td>';
					echo '<td>';
				    // edit button
				    echo '    <form action="/admin/pages/editprod.php" method="post">';
				    echo '      <input id="id" name="id" type="hidden" value ="'.$id.'">';
				    echo '      <button class="w3-button w3-orange" type="submit" value="Edit">Edit</button>';
				    echo '    </form>';
				    // delete button
				    echo '    <form action="/incl/a_incl/cancel_prod.php" method="post">';
				    echo '      <input id="id" name="id" type="hidden" value ="'.$id.'">';
				    echo '      <button class="w3-button w3-red" type="submit" value="Del">Cancel</button>';
				    echo '    </form>';
				    echo '  </td>';
				    echo '</tr>';
				}
				?>
			</table>

  <hr>


 <?php 
include '../pages/footer.php';
 ?>