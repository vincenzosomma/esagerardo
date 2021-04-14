<?php
include 'pages/header.php';

?>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
<!-- Header -->
	<header class="w3-display-container w3-content w3-wide" style="max-width:100%;min-width:100%" id="home">
  <img class="imain" src="/imgs/main.png" alt="esagerardo-BS" width="100%" height="auto">
	</header>
</div>
  
<hr>

 <!-- Services Section -->
<div class="w3-center w3-content w3-padding" style="max-width:1600px;">
    <div class="w3-row w3-center">
       <div class="w3-third iconh">
        <h4>Delivery</h4>
        <img src="/imgs/icons/delivery.svg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:18%">
       </div>
       <div class="w3-third iconh">
        <h4>Take Away</h4>
        <img src="/imgs/icons/take-away.svg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:18%">
        </div>
      <div class="w3-third iconh">
        <h4>Catering</h4>
        <img src="/imgs/icons/catering.svg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:18%">
      </div>
    
    </div>
  </div> 
<hr>

<!-- Services Section -->
<div class="w3-center w3-content w3-padding" style="max-width:1600px;">
    <div class="w3-row w3-center">
     <div class="w3-center w3-content" style="max-width:1200px;">
<!-- Gallery Section -->
        <?php
        //we print all the menu by category
        $result = mysqli_query($dbc, "SELECT * FROM products ORDER by categ");
        while($row = mysqli_fetch_array($result))
        {
          $id=$row['img'];
          $tt=$row['title'];
echo '<div class="w3-third">
    <div class="w3-card w3-hover-opacity">
    <hr>
      <p><a href="/pages/ordercast.php"><img src="/imgs/photos_men/'.$id.'.jpg" style="width:95%; align-item:center"></a>
      <div class="w3-container">
        <h5>'.$tt.'</h5></p>
      </div>
    </div>
  </div>';
  }
        ?>



</div>

    
    </div>
  </div>

<hr>

<!-- About Section -->
	<div class="b_div w3-center">
	 	<div class="w3-container w3-content w3-wide" id="about"><br><br>

		<hr>
	 	<h1 class="w3-center w_text">Our Traditions</h1>
		<hr>   
			<div class="w3-col m6 ">
				<img src="imgs/gerardo.jpg" class=" sticky img_about center" alt="Gerardophoto" width="100%" height="auto">
			</div>

    			<div class="w3-col m6 ">
      				 <h5 class="m6 w_text" style="padding-left: 20px">
		      		From the traditional Italian kitchen,<br>
					Gerardo Nuzzo is proudly ready to launch Esagerardo.<br>
					Delightful home made dishes, prepared with passion devotion and care delivered at yours!

					“ The journey started since my young age trough restaurants, large foods hospitality fairs, hotels.
					Searching for new experiences, new flavours and innovation all over Italy to then arrive in London!
					After spending years working hard,putting effort on my job and passion, looking for an idea, I found “EsaGerardo”my home made Italian kitchen.<br>
					The aim it’s to feed you with great Italian courses from the traditional kitchen straight to your tables .
					Simply, authentic, tasty.<br><br>
					Made with the same heart love and passion as our grandma’s used to.”
					<img class="img_about center" alt="esagerardo" src="/imgs/full_lg_w2.png" width="70%" height="auto">
					</h5>	

<br><br>
    			</div>
  		</div>
	</div>
<br><br>

  </div>
 </div>
</div>

<hr>

<?php
  include 'pages/footer.php';
?>






