  <?php 
include '../pages/header.php';
 ?>



  
  <hr>
  <div class="w3-container">
  	<h5>Orders - Dashboard</h5>
          </td></tr><table class="w3-table w3-striped w3-white">
          <tr>
           <td><i class="  fa fa-clone w3-text-green w3-xxlarge"></i></td>
            <td>Pending ordes</td>
            <td><i>
            <?php $result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `orders` WHERE `status` = 'Pending'");
            $row = mysqli_fetch_array($result);
            $toatalCount = array_shift($row);
            echo '<b>'.$toatalCount.'</b>';
            ?>
            </i></td>
          </tr>
          <tr>
            <td><i class="  fa fa-check-square-o w3-text-red w3-xxlarge"></i></td>
            <td>Closed ordes</td>
            <td><i>
            <?php $result = mysqli_query($dbc, "SELECT COUNT(*) AS total FROM `orders` WHERE `status` = 'Accepted'");
            $row = mysqli_fetch_array($result);
            $toatalCount = array_shift($row);
            echo '<b>'.$toatalCount.'</b>';
            ?>
            </i></td>
        </table>
        <hr>  
        <?php if (isset($_GET['row'])){
		if($_GET['row'] == 'deleted'){
		echo '<b style="color:red;">Order Deleted!</b>';}}
        if (isset($_GET['succes'])){
        if($_GET['succes'] == 'edited'){
        echo '<b style="color:Green;">Order Edited!</b>';}}
        if (isset($_GET['succes'])){
        if($_GET['succes'] == 'accepted'){
        echo '<b style="color:Green;">Order Accepted!</b>';}}
        ?>
        <a href="/pages/ordercast.php"><button class="w3-button w3-green">Place an order</button></a>
        <hr>
<?php 

// Perform query with inner join to import name product
$result = mysqli_query($dbc, "
			SELECT orders.`id`, users.`f_name`, (products.`price` * orders.`quantity`) as tot , orders.`created`, `products`.`title`,
            orders.`address`,  orders.`notes`,  orders.`created`,  orders.`status`,  orders.`delivery`, orders.`quantity`
            FROM orders
            INNER JOIN users
            ON orders.`user_id` = users.`u_id`
            LEFT JOIN products ON orders.p_id = products.p_id
            ORDER BY  `orders`.`status`DESC");


		if($row = mysqli_fetch_array($result)) {
      // output table tag
        
        echo '<table class="w3-table w3-striped w3-white w3-hoverable w3-bordered w3-centered w3-table-all w3-card ">';

        // output table header first row

        echo '<thead><tr>'; // table row
        echo '  <th>Order ID</th>';
        echo '  <th>User</th>';
        echo '  <th>Product ID</th>';
        echo '  <th>Quantity</th>';
        echo '  <th>Address</th>';
        echo '  <th>Notes</th>';
        echo '  <th>Date</th>';
        echo '  <th>total</th>';
        echo '  <th>Status</th>';
        echo '  <th>Delivery</th>';
        // the edit/delete buttons column
        echo '  <th>Actions</th>';
        echo '</tr></thead>';
        // output table header others rows

        echo '<tr>';
            echo '  <td>'. $row["id"].'</td>';
            echo '  <td>'. $row["f_name"].'</td>';
            echo '  <td>'. $row["title"].'</td>';
            echo '  <td>'. $row["quantity"].'</td>';
            echo '  <td>'. $row["address"].'</td>';
            echo '  <td>'. $row["notes"].'</td>';
            echo '  <td>'. $row["created"].'</td>';
            echo '  <td><b>£'. $row["tot"].'</b></td>';
            echo '  <td>'. $row["status"].'</td>';
            echo '  <td>'. $row["delivery"].'</td>';
        echo '  <td> ';
            //  Order status editable
            //accept button
            echo '    <form action="/incl/a_incl/acceptord.php" method="post">';
            echo '      <input name="id" type="hidden" value ="' . $row["id"].'">';
            echo '      <button class="w3-button w3-green" type="submit" value="Del">Accept</button>';
            echo '    </form>';
            // edit button
            echo '    <form action="/admin/pages/editorder.php" method="post">';
            echo '      <input name="id" type="hidden" value ="'. $row["id"].'">';
            echo '      <button class="w3-button w3-orange" type="submit" value="Edit">Edit</button>';
            echo '    </form>';
            // delete button
            echo '    <form action="/incl/a_incl/cancel_order.php" method="post">';
            echo '      <input name="id" type="hidden" value ="' . $row["id"].'">';
            echo '      <button class="w3-button w3-red" type="submit" value="Del">Cancel</button>';
            echo '    </form>';
            echo '  </td>';
            echo '</tr>';

        // output data of each row + total
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '  <td>'. $row["id"].'</td>';
            echo '  <td>'. $row["f_name"].'</td>';
            echo '  <td>'. $row["title"].'</td>';
            echo '  <td>'. $row["quantity"].'</td>';
            echo '  <td>'. $row["address"].'</td>';
            echo '  <td>'. $row["notes"].'</td>';
            echo '  <td>'. $row["created"].'</td>';
            echo '  <td><b>£'. $row["tot"].'</b></td>';
            echo '  <td>'. $row["status"].'</td>';
            echo '  <td>'. $row["delivery"].'</td>';
            
            // the edit/delete buttons
            echo '  <td> ';
            //	Order status editable
            //accept button
            echo '    <form action="/incl/a_incl/acceptord.php" method="post">';
            echo '      <input name="id" type="hidden" value ="' . $row["id"].'">';
            echo '      <button class="w3-button w3-green" type="submit" value="Del">Accept</button>';
            echo '    </form>';
            // edit button
            echo '    <form action="/admin/pages/editorder.php" method="post">';
            echo '      <input name="id" type="hidden" value ="'. $row['id'].'">';
            echo '      <button class="w3-button w3-orange" type="submit" value="Edit">Edit</button>';
            echo '    </form>';
            // delete button
            echo '    <form action="/incl/a_incl/cancel_order.php" method="post">';
            echo '      <input name="id" type="hidden" value ="' . $row["id"].'">';
            echo '      <button class="w3-button w3-red" type="submit" value="Del">Cancel</button>';
            echo '    </form>';
            echo '  </td>';
            echo '</tr>';
        }

        // close table tag
        echo "</table>";
    } else {
        echo "<p>No results returned</p>";
 }
?>

  <hr>


 <?php 
include '../pages/footer.php';
 ?>