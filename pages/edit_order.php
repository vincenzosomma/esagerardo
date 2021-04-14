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
  	<a href="#" class="w3-button w3-light-grey w3-block">Messages</a>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
	<a href="/pages/orderhistory.php" class="w3-button w3-light-grey w3-block">Order History</a>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <a href="#" class="w3-button w3-light-grey w3-block">Edit Details</a>
    </div>
  </div>
</div>
</div>
<div class="w3-display-container w3-content w3-wide w3-padding-8">
    <h5 class="w3-center w3-padding-8"><span class="w3-tag w3-wide">Order your food here!</span></h5>
<div class="w3-center w3-padding-8">
	<form action="/incl/edit_inc.php" method="post">
    <table id="itemorder" class="w3-center w3-padding-12" cellspacing="5">

      <tbody>

				<?php


        if(isset($_POST['id']))
        {
          $id = $_POST['id'];

    $result = mysqli_query($dbc, "SELECT * FROM orders WHERE id = $id");
    
    $row = mysqli_fetch_array($result);
        echo '<div>';
      // output table tag
        
        echo '<table class=" w3-padding-12">';

        // output table header first row

        echo '<thead><tr>'; // table row
        echo '  <th>Order ID</th>';
        echo '  <th>Quantity</th>';
        echo '  <th>Address</th>';
        echo '  <th>Postcode</th>';
        echo '  <th>Notes</th>';
        echo '  <th>Date</th>';
        echo '  <th>Status</th>';
        echo '  <th>Delivery</th>';
        // the edit/delete buttons column
        echo '</tr></thead>';

        // output table header others rows

        echo '<tbody><tr></tr>';
            echo '  <td><input name="id" type="hidden" value ="'. $row["id"].'">'. $row["id"].'</td>';
            echo '  <td>
                    <input id="'.$row["id"].'" name="quantity" type="number" value="'.$row["quantity"].'"></td>';
            echo '  <td><input id="'. $row["address"].'" name="address" type="text" value="'. $row["address"].'"></td>';
            echo '  <td><input id="'. $row["postcode"].'" name="postcode" type="text" value="'. $row["postcode"].'"></td>';
            echo '  <td><input id="'. $row["notes"].'" name="notes" type="text" value="'. $row["notes"].'"></td>';
            echo '  <td>'. $row["created"].'</td>';
            echo '  <td>'. $row["status"].'</td>';
            echo '  <td><input id="'. $row["delivery"].'" name="delivery" type="datetime-local" value="'. $row["delivery"].'"></td>';
            echo '</tr></tbody> </table>';
}

?>
      			  <button class="w3-button w3-light-grey w3-section" type="order">SEND ORDER</button><h4>*Cash payment</h4>
      			 </form>
      			 </div>
	</div>
</div>


<?php
  include '../pages/footer.php';
?>