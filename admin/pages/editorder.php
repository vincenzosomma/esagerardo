  <?php 
include '../pages/header.php';
 ?>




  <hr>
  <div class="w3-container">
        <form action="/incl/a_incl/editorder_inc.php" method="post">
<?php 
if(isset($_POST['id'])) {
  $id = $_POST['id'];
// Perform query with inner join to import name product
$result = mysqli_query($dbc, "
			SELECT orders.`id`, products.`title`, products.`price`, orders.`quantity`, orders.`user_id`, 
			orders.`address`, orders.`postcode`, orders.`notes`, orders.`created`, orders.`status`, orders.`delivery`
			FROM orders
			INNER JOIN products
			ON orders.p_id = products.p_id
      WHERE orders.`id` = $id");
		if($row = mysqli_fetch_array($result)) {
      // output table tag
        
        echo '<table class="w3-table w3-striped w3-white w3-hoverable w3-bordered w3-centered w3-table-all w3-card w3-small">';

        // output table header first row

        echo '<thead><tr>'; // table row
        echo '  <th>Order ID</th>';
        echo '  <th>Quantity</th>';
        echo '  <th>Address</th>';
        echo '  <th>Postcode</th>';
        echo '  <th>Notes</th>';
        echo '  <th>Date</th>';
        echo '  <th>total</th>';
        echo '  <th>Delivery</th>';
        // the edit/delete buttons column
        echo '</tr></thead>';
        
        // output table header others rows

        echo '<tr>';
            echo '  <td><input name="id" type="hidden" value ="'. $row["id"].'">'. $row["id"].'</td>';
            echo '  <td><input id="'.$row["id"].'" name="quantity" type="number" value="'.$row["quantity"].'"></td>';
            echo '  <td><input id="'. $row["address"].'" name="address" type="text" value="'. $row["address"].'"></td>';
            echo '  <td><input id="'. $row["postcode"].'" name="postcode" type="text" value="'. $row["postcode"].'"></td>';
            echo '  <td><input id="'. $row["notes"].'" name="notes" type="text" value="'. $row["notes"].'"></td>';
            echo '  <td>'. $row["created"].'</td>';
            echo '  <td><input id="'. $row["status"].'" name="status" type="text" value="'. $row["status"].'">Pending/Accepted</td>';
            echo '  <td><input id="'. $row["delivery"].'" name="delivery" type="datetime-local" value="'. $row["delivery"].'"></td>';
            echo '</tr></tbody> </table>';
    } else {
        echo "<p>No results returned</p>";
 }
}
?>
                  <button class="w3-button w3-grey w3-section" type="order">EDIT ORDER</button>
                 </form>
                 </div>
  <hr>


 <?php 
include '../pages/footer.php';
 ?>