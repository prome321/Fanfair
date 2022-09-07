<?php


include('config.php')
?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Fan Based Website</title>
	<!-- CSS LINK -->
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="CSS/responsive.css">
  <link rel="stylesheet" type="text/js" href="JS/design.js">
	<!-- JAVASCRIPT LINK -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Josefin+Sans:wght@100&family=Merriweather:ital,wght@0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Oleo+Script+Swash+Caps:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Signika+Negative:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body onload="slider()">

<!-- Navigation Bar -->

<div class="wrapper position-fixed">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">FANFAIR</a></div>
        <ul class="links">
          <li><a href="index.php">Home</a></li>

          <li><a href="bandchannels.php">Channels</a></li>
            


          <li><a href="Ticket.php">Tickets</a></li>

          <li><a href="product.php">Merch</a></li>

         

    
          
          
          <li>
            <a href="#" class="desktop-link">Settings</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Settings</label>
            <ul><div class="icons">
              <div class=".pp1 pop">
           <li><a href="mainusersignin.php"><i class="fas fa-edit" style="padding-right: 9px;"></i>Log in</a></li>
    
              <li><a href="mainusersignup.php"><i class="fas fa-edit" style="padding-right: 9px;"></i>Sign up</a></li>
              
               <li><a href="logout.php"><i class="fas fa-sign-out-alt" style="padding-right: 9px;"></i>Logout</a></li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
     
    </nav>
  </div>
  <!-- Body Part -->

 <section style="margin-bottom: -150px;" class="main-section">

  <div class="banner">
    <div class="slider">
     <img src="Images/banner.png" alt="" id="slideImg">
    </div>
    

    </div>
  </div>

 </section>


<section class="movie-ticket">
  <!-- <div class="movie-image">

    
  </div> -->
  <div class="ticket-flex">
   
  <h2>PICK YOUR VENUE!</h2>
 <?php

                    $sql = "SELECT * FROM ticket";
if(isset($_GET['id'])){
    $ticketID = $_GET['id'];
    $sql .= " WHERE ticket_id = '$ticketID'";
}

//$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_assoc($result)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>


  
  <div class="ticket-display">
   <div class="ticket-header">
      
       <div class="date-ticket">
          <h6><?php echo  $row["ticket_name"] ?></h6>
        </div>
        <div class="date-ticket">
          <h6><?php echo  $row["ticket_date"] ?></h6>
        </div>
        <div class="stadium-ticket">
          <h6><?php echo  $row["ticket_venue"] ?></h6>
        </div>
         <div class="stadium-ticket">
          <h6><?php echo  $row["ticket_price"] ?></h6>
        </div>
        <div>
          <button class="ticket-button" style="vertical-align:middle"><span><a href="ticketsystem.php"> Buy Tickets</a> </span></button>
        </div>
        
      
    </div>
     
  </div>
     <?php
                      }
                  
                  
                  ?>
  
</div>
  





</section>

<section id="featured-video" class="ds parallax section_padding_top_10 section_padding_bottom_150" style="background-position: 50% -23px;">
        <div class="conti">
          <div class="row">
            <div class="col-sm-12 text-center"> <a href="https://www.youtube.com/watch?v=Au1MPNOdP4Y" class="theme_button inverse round_button margin_0" data-gal="prettyPhoto[gal-video]">
          <i class="fa fa-play" aria-hidden="true"></i>
        </a>
              <h2 class="section_header bottommargin_0" style="color:#C3073F"> Coke Studio Bangla Live Concert</h2>
            </div>
          </div>
        </div>
      </section>



<!-- Latest News Start -->
<section id="news" class="ds ms section_padding_top_150 section_padding_bottom_130">
 <?php

                    $sql = "SELECT * FROM list";
if(isset($_GET['id'])){
    $listID = $_GET['id'];
    $sql .= " WHERE list_id = '$listID'";
}

//$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_assoc($result)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>


  <div class="container">
      <div class="row">
          <div class="col-sm-12 text-center">
              <h2 class="section_header with_line">Latest News</h2>
              <div class="owl-carousel topmargin_60 owl-loaded owl-drag owl-theme" data-responsive-lg="3" data-dots="true">
                  
                  
                  
              <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1170px;"><div class="owl-item active" style="width: 360px; margin-right: 30px;"><article class="vertical-item content-padding with_background rounded text-center offset_button">
                      <div class="item-media top_rounded overflow_hidden"><img src="ADMIN/<?php echo $row['listimage']?>">
                          <div class="media-links"> <a href="" class="abs-link"></a> </div>
                      </div>
                      <div class="item-content">
                          <header class="entry-header">
                              <div class="entry-meta small-text content-justify"> <span class="greylinks">
                          <a href="blog-single-right.html">
                              <time datetime="2017-10-03T08:50:40+00:00">
                               <?php echo  $row["listdate"] ?>
                              </time>
                          </a>
                      </span> <span class="categories-links highlightlinks">
                          <a href="#0"><?php echo  $row["listcategory"] ?></a>
                      </span> </div>
                              <h4 class="entry-title"> <a href=""><?php echo  $row["listname"] ?></a> </h4>
                          </header>
                          <div class="entry-content">
                              <p class="content-3lines-ellipsis"><?php echo  $row["listtext"] ?></p> <span class="button_wrap">
                      <a href="<?php echo  $row["listtextarea"] ?>" class="theme_button color1">Read More</a>
                  </span> </div>
                      </div>
                  </article></div></div></div>
          </div>
      </div>
  </div>
</section>
<?php

}
?>
</section>
<!-- Latest News End -->


<!-- FOOTER -->
<footer class="footer-distributed">

        <div class="footer-left">
            <h3>FANFAIR</h3>

            <p class="footer-links">
                <a href="#">Home</a>
                |
                <a href="#">Contact Us</a>
                
            </p>

            <p class="footer-company-name">Copyright © 2022 <strong>FANFAIR</strong> All rights reserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Mohammadpur</span>
                    Dhaka</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>01755221663</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:Fairuznaba03@gmail.com">FANFAIR@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About the Website</span>
                <strong>FANFAIR</strong> is an e-commerce site for fans all around the world. Official artist merch to exclusive CDs, DVDs and products as well as concert tickets will be accessible on this website. This website also focuses on the artist-to-fan communications for musicians and bands.
            </p>
            <div class="footer-icons">
                <a href="#"><i  class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer> 

    


  
        





  


    






    






		
		








<script type="text/javascript" src="JS/design.js"></script>

<script>
 var slideImg = document.getElementById("slideImg");
 var Images = new Array(
      "Images/First/hi1.png",
      "Images/First/hi2.png",
      "Images/First/hi3.png"
);

var len = Images.length;
var i = 0;

function slider(){
    if(i > len-1){
      i = 0;
    }
    slideImg.src = Images[i];
    i++;
    setTimeout('slider()',3000);
}

</script>
<script >
  filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}




</script>

	<!-- JS Link up -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

</body>
</html>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>

</body>