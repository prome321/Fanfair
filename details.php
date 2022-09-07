



<?php

//session_start();


include('config.php');
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "SELECT * FROM product  WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
//    header('location:products.php');

$row = mysqli_fetch_assoc($result);

$product_name  = $row['product_name'];
$cat_id  = $row['cat_id']; 
$price  = $row['price'];
$product_description  = $row['product_description'];
$thumb  = $row['thumb'];

}



?>















<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FANFAIR Product details</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="poop.css" rel="stylesheet">

    <meta name="robots" content="noindex,follow" />
    <head>
 
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

 <link rel="stylesheet" type="text/css" href="product-page/CSS/design.css">
 <link rel="stylesheet" type="text/css" href="CSS/design.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

  </head>

  <body>
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



  <div style="width: 100%;">
    

 
    <div class="container" style="padding-top: 100px" >



      <!-- Left Column / Headphones Image -->
      <div class="left-column" style="margin-top: 50px;">


        <img data-image="black"  src = "ADMIN/<?php echo $row['thumb']?>" alt ="product image" style="background: #323232;">
        <img data-image="blue" src = "ADMIN/<?php echo $row['thumb']?>"style="background: #314780;" alt="">
        <img data-image="red" class="active" src = "ADMIN/<?php echo $row['thumb']?>" style="background:#C91524;" alt="">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <!-- <span><?php echo $catname ?></span> -->
          <h1><?php echo $product_name ?></h1>
          <p><?php echo  $product_description?></p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>Color</span>

            <div class="color-choose">
              <div>
                <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                <label for="red"><span></span></label>
              </div>
              <div>
                <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                <label for="blue"><span></span></label>
              </div>
              <div>
                <input data-image="black" type="radio" id="black" name="color" value="black">
                <label for="black"><span></span></label>
              </div>
            </div>

          </div>

          <div class="cable-config">
            <span>Quantity</span>

         <div class="cable-choose">
             <form action='addToCart.php'>
   <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
        <input type="number" class='form-control' name='quantity' min="1" max="5" value="1" style="border:2px solid #C3073F;width: 100px;">
            </div>


           
          </div>

          

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Choose Size:</span>

            <div class="cable-choose">
              <button>S</button>
              <button>L</button>
              <button>XXL</button>
            </div>

           
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
          <span><?php echo $row["price"]?></span>
         <button type = "submit" class = "btn-cart" > <a type="submit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color: #fff">Add to cart</a>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
     

   
  </div>
  <div class="offcanvas-body">
    <div class="wrapper-cart">
    <h1>Shopping Cart</h1>
    
</div>


                                    <span><i class = "fas fa-plus"></i></span> 

                                </button>




      </div>
    </form>

                          
    </div>




   
      



    </div>

<div>
<h2 class = "lg-title" style="margin-top: 150px">Related Products</h2>


</div>


      <div class="product-items">



     
     

        <?php

                    $sql_related = "SELECT * FROM product WHERE product_id!='$product_id' order by rand() limit 3";

//$sql = "SELECT * FROM product";
$result_related= mysqli_query($conn, $sql_related); 
while($row_related = mysqli_fetch_assoc($result_related)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>


     <div class="product" style="margin-top: 200px;">

     
       <div class = "product-content" style="background: transparent;" >
                           <a class = "productdetails_view" href="details.php?id=<?php echo $row['product_id']?>">
                            <div class = "product-img">
                                <img src = "ADMIN/<?php echo $row_related['thumb']?>" alt = "product image">
                            </div>
                        </a>
                            <div class = "product-btns">


                               <button type = "button" class = "btn-cart" > <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color: #fff">Add to cart</a>
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
                            <a href = "#" class = "product-name" style="font-size:24px" ><?php echo $row_related['product_name']?></a>
                            
                            <p class = "product-price" style="font-size:24px" ><?php echo $row_related['price']?>TK</p>
                        </div>

                         
               
                    </div>
                    <?php
                  }  
                  ?>

</div>



    <!-- FOOTER -->
<footer class="footer-distributed"    style="margin-top: 100px;" >

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

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="ppp.js" charset="utf-8"></script>
  </body>
</html>
