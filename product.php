





<?php
$cart="";
$count=0;
$valo="";
$valo1="";
$valo2="";
$total=0;
session_start();
include('config.php');
if(isset($_SESSION['poop']))
{
  $cart=$_SESSION['poop'];
}
if(isset($row['product_name']))
{
  $valo=$row['product_name'];
}
if(isset($row['price']))
{
  $valo1=$row['price'];
}
if(isset($value['quantity']))
{
  $valo2=$value['quantity'];
}




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
<link rel="stylesheet" type="text/css" href="CSS/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="CSS/owl.theme.default.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="CSS/design.css">
<link rel="stylesheet" type="text/css" href="product-page/CSS/design.css">
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
        <li><a href="ticket.php">Ticket</a></li>
         <li><a href="product.php">Merch</a></li>
         
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

       <li><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color: #C3073F; font-size: 20px; font-weight: 800;">
          <?php 
           if(isset($_SESSION['poop']))
{
  $cart=$_SESSION['poop'];
  $count = count($cart);
}
         
          ?>
             <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">
           <?php echo $count?> </span>
          </a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
  </div>
  <div class="offcanvas-body">
    
    <div class="wrapper-cart">
    <h1 style="color: #C3073F; font-size: 28px;margin-bottom: 30px;">Shopping Cart</h1>
    <div>
     <?php
       $total = 0;
       foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql = "SELECT * FROM product where product_id = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result)
        ?>
          
           
       <div class="row cart-detail" style="border-bottom: 2px solid #000;">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                  <img src="ADMIN/<?php echo $row['thumb']?> " >
                </div>
                  <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                 <h2><a href="details.php?id=<?php echo $row['product_id']?>" style="color: #C3073F;font-size: 18px;"><?php echo $row['product_name']?></a></h2>
                  <span style="padding-bottom: 10px;"> BDT <?php echo $row['price']?></span> 
                <p  > Quantity : <span style="color:#C3073F;"><?php echo $value['quantity']?></span></p>
                </div>
  </div>
     <?php
            $total = $total +  ($row['price'] * $value['quantity']);
     }
            ?>
    <div>

                <div class="row total-header-section">
                  <div class="col-lg-6 col-sm-6 col-6">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">
                 <?php echo $count?>
                  </span>
                  </div>
                  <div>
                    <p style="text-align: center;"> Total: <span style="color:#C3073F;">BDT <?php echo $total ?>.00</span></p>
                  </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                 <a href='checkout.php' class="btn btn-primary btn-block"  style="background:#C3073F;">Checkout</a>
                <a href='cart.php' class="btn btn-primary btn-block"  style="background:#C3073F;">Cart</a>
                </div>
              </div>

            </div>
            </div>
  </div>   
</div>
    </li>
      





     
      
       
    </nav>
  </div>
  

  <!-- Body Part -->

 <section  class="main-section" >

  <div class="banner">
    <div class="slider">
     <img src="Images/banner.png" alt="" id="slideImg">
    </div>
    

    </div>
  </div>

 </section>

<style type="text/css">
  
.tab {
  overflow: hidden;
 
  background-color: transparent;
}

/* Style the buttons that are used to open the tab content */
.tab button {
 background-color:#C3073F;
  float: left;
  border-right: 1px solid #fff;
  border-left: 1px solid #000;

  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;

  
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #000;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}




</style>


<section class = "products">
            <div class = "contii">
                <h1 class = "lg-title">Special Merchandise Products</h1>


                 <div class="tab" style="text-align: : center; display: flex; justify-content: center; align-items: center;margin-bottom: 30px; overflow: hidden;
    background-color: transparent;">
     <?php
      {
                  
        
                  $sql2 = "SELECT * FROM categories";
                  $result2 = mysqli_query($conn, $sql2);
              
                
                      // output data of each row
                      while($row2 = mysqli_fetch_assoc($result2)) {
              
                          ?> 
                          <button class="tablinks" onclick="openCity(event, '<?php echo  $row2["cat_name"] ?>')" 

  

  

  ><a href="?id=<?php echo $row2["cat_iD"]?>" style="color: #FFF"><?php echo  $row2["cat_name"] ?></a></button>

                        
             
      
                      <?php
                      }
                  }
                  
                  ?>
  
  <!-- <button class="tablinks" onclick="openCity(event, 'Caps')" style=" background-color:#C3073F;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;">Caps</button>
  <button class="tablinks" onclick="openCity(event, 'bandana')" style=" background-color:#C3073F;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;">Bandana</button> -->
</div>
               

                <div class = "product-items">
                    <?php

                    $sql = "SELECT * FROM product";
if(isset($_GET['id'])){
    $catID = $_GET['id'];
    $sql .= " WHERE cat_id = '$catID'";
}

//$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_assoc($result)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>




                    <!-- single product -->
                    <div class = "product" >
                        <form> 
                        <div class = "product-content" >
                           <a class = "productdetails_view" href="">
                            <div class = "product-img" sty>
                                <img src = "ADMIN/<?php echo $row['thumb']?>" alt = "product image">
                            </div>
                        </a>
                            <div class = "product-btns">

                                <button type = "button" class = "btn-cart" > <a href="details.php?id=<?php echo $row['product_id']?>"offcanvas data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color: #fff">Details</a>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
     

   
  </div>
  <div class="offcanvas-body">
    <div class="wrapper-cart">
    <h1>Shopping Cart</h1>
    
</div>


                                    <span><i class = "fas fa-plus"></i></span> 

                                </button>
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class = "fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class = "product-info" style="text-align: center;">
                            <div class = "product-info-top">
                                <!-- <h2 class = "sm-title">T-shirt</h2> -->
                                <!-- <div class = "rating">
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "fas fa-star"></i></span>
                                    <span><i class = "far fa-star"></i></span>
                                </div> -->
                            </div>
                            <div class="cable-choose">
             <form action='addToCart.php'>
    <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
        
            </div>
                            <a href = "#" class = "product-name" style="font-size:24px" ><?php echo $row['product_name']?></a>
                            
                            <p class = "product-price" style="font-size:24px" ><?php echo $row['price']?>TK</p>
                        </div>

                         
               
                    </div>
                    <?php
                  }  
                  ?>
                    <!-- end of single product -->
                </div>
            </div>
        </section>

      








 


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
<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript" src="JS/owl.carousel.js"></script>
<script type="text/javascript">
  
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})



</script>

</body>

