<?php
include '../pages/header.php';

?>

<div class="w3-content" style="max-width:700px">
  <div class="w3-content" style="max-width:700px"><br><br>
         <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Hi <?php if(isset($_SESSION["sessionuser"])){ echo $_SESSION['sessionuser']; }else{} ?></h5>
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
	<a href="/pages/ordercast.php" class="w3-button w3-light-grey w3-block">Order Food</a>
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




 <!-- Footer -->

<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <div class="w3-row w3-center">
       <div class="w3-third">
        <span class="w3-tag">Working Hours</span><br><br>
        <i class="fa fa-clock-o w3-hover-opacity"></i>
       </div>
       <div class="w3-third">
      <span class="w3-tag">Social</span><br><br>
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-youtube w3-hover-opacity"></i>
      <i class="fa fa-whatsapp w3-hover-opacity"></i>
        </div>
      <div class="w3-third">
       <span class="w3-tag">Contact</span><br><br>
       <i class="fa fa-whatsapp w3-hover-opacity"></i>
       <i class="fa fa-envelope w3-hover-opacity"></i>

      </div>
    </div>
  <p class="w3-medium">Powered by <a href="visolab" target="_blank">Vincenzo Somma</a></p>
</footer>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>


<script>
  //script slider index
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>
