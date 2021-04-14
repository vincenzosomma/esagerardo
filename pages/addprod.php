<?php
require '../pages/header.php';

?>


<div class="w3-container" id="where" style="padding:32px;">
  <div class="w3-content" style="max-width:700px">
  	<br>
         <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Add product</span></h5>
           <form action="/incl/addprod_inc.php" method="post"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="title" placeholder="Name Dish"required>
             <input class="w3-input w3-padding-16 w3-border" type="text" name="desc" placeholder="Descrition"required><br>
  			<label>Please select the category:</label>
			  <input class="w3-input w3-padding-8 w3-border" type="radio" id="starter" name="categ" value="starter">
			  <label for="starter">Starter</label>
			  <input  class="w3-input w3-padding-8 w3-border" type="radio" id="main" name="categ" value="main">
			  <label for="female">Main</label>
			  <input  class="w3-input w3-padding-8 w3-border" type="radio" id="other" name="categ" value="pasta">
			 <label  vfor="other">Pasta</label>
			 <input class="w3-center w3-input w3-padding-8 w3-border" type="radio" id="other" name="categ" value="sides">
			 <label for="other">Sides</label>
			 <br>
			 <br>
			 <input class="w3-input w3-padding-16 w3-border" type="number" name="price" placeholder="Price" step="any"required>
			 <input class="w3-input w3-padding-16 w3-border" type="text" name="img" placeholder="Imagename"required>
             <!--<input class="w3-input w3-padding-16 w3-border" type="file" name="img" placeholder="Image"required>-->
             <button class="w3-center w3-button w3-black" type="submit" name="submit">ADD Product</button>
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
