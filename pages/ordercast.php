<?php
require '../pages/header.php';

?>
<div class="w3-content" style="max-width:700px">
  <div class="w3-content" style="max-width:700px"><br><br>
         <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Hi 
          <?php if(isset($_SESSION["sessionuser"])){
          echo $_SESSION['sessionuser']; 
          }else{} ?></span></h5>
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
	<a href="/pages/ordercast.php" class="w3-button w3-light-grey w3-block">Order Food</a>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
	<a href="/pages/orderhistory.php" class="w3-button w3-light-grey w3-block">Order History</a>
    </div>

  </div>
</div>
</div>
<div class="w3-display-container w3-content w3-wide w3-padding-8">
    <h5 class="w3-center w3-padding-8"><span class="w3-tag w3-wide">Order your food here!</span></h5>
<div class="w3-center w3-padding-8">
	<form action="/incl/placeorder.php" method="post">
    <table id="itemorder" class="w3-center w3-padding-12" cellspacing="5">
    <thead>
      <tr>
        <th>Photos</th>
        <th>Category</th>
        <th>Name</th>
        <th>Item Price</th>
        <th>Select</th>
      </tr>
     </thead>

      <tbody>

				<?php
        //we print all the menu by category
				$result = mysqli_query($dbc, "SELECT * FROM products ORDER by categ;");
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td>
          <img src="/imgs/photos_men/'.$row["img"].'.jpg" alt="'.$row["img"].'"style="width:40%;height:auto;"></td><td>'.$row["categ"].'</td>
          <td>'.$row["title"].'</td>' . '<td>£' . $row["price"].'</td>';
					echo '<td>';

					echo '<input id="'.$row["p_id"].'" name="'.$row['p_id'].'" type="checkbox" value="1">
          </div>
          </td></tr>';
				}



				?>
        </tbody>
		    <div class="w3-center w3-padding-4">
			      <tr><td><p>Any note(optional) / Allergy</p></td>
			      <td><input class="w3-input w3-border we-hidden" type="text" placeholder="WRITE HERE" name="message">
            </td></tr>
			      <tr><td>Address</td><td><input class="w3-input w3-border we-hidden" type="text" name="address"  placeholder="Address"required>
            <tr><td>To be Delivered</td><td><input class="w3-input w3-border we-hidden" type="datetime-local" name="datetime"  placeholder="date"required>
            <tr><td>Postcode</td><td><input class="w3-input w3-border we-hidden" type="text" name="postcode"  placeholder="postcode"required>
            </td></tr></table>

      			  <button class="w3-button w3-light-grey w3-section" type="order">SEND ORDER</button><h4>*Cash payment</h4>
      			 </form>
      			 </div>
	</div>
</div>


<?php
  include '../pages/footer.php';
?>