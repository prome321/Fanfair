

<?php 


session_start();
include('config.php');
$c_cart=$_SESSION['c_cart'];
print_r($c_cart);

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
          <li><a href="#">Profile</a></li>
          <li><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add to cart</a>

         

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
     

   
  </div>
  <div class="offcanvas-body">
    <div class="wrapper-cart">
    <h1>Shopping Cart</h1>
    
</div>



          </li>
          
          
          <li><a href="#">Channels</a></li>
          <li>
            <a href="#" class="desktop-link">Settings</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Settings</label>
            <ul><div class="icons">
              <div class=".pp1 pop">
             <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg ">Log in</button>
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
     <div class="conty">
    <div class="styleform sign-in">
      <h2>Sign In</h2>
      <label style="display: block;">
        <span>Email Address</span>
        <input type="email" name="email">
      </label>
      <label style= "margin-left: 157px;margin-bottom: 50px; display: inherit;" >
        <span>Password</span>
        <input type="password" name="password" >
      </label>
      <button class="submit" type="button" >Sign In</button>
      <p class="forgot-pass">Forgot Password ?</p>

      <div class="social-media">
        <ul style="top: 380px;  opacity: 1; visibility: visible; right: 245px; background:transparent;">
          <li><img src="Images/facebook.png"></li>
          <li><img src="Images/google.png"></li>
         
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="styleform sign-up">
        <h2>Sign Up</h2>
        <label style="display: block;">
          <span>Name</span>
          <input type="text">
        </label>
        <label style="display: block;">
          <span>Email</span>
          <input type="email">
        </label>
        <label style="display: block;">
          <span>Password</span>
          <input type="password" >
        </label>
        <label style="display: block; margin-bottom: 50px;">
          <span>Confirm Password</span>
          <input type="password">
        </label>
        <button type="button" class="submit "style="margin-right: 156px;">Sign Up Now</button>
      </div>
    </div>
  </div>
    </div>
  </div>
</div>
</div>
              <li><a href="#"><i class="fas fa-edit" style="padding-right: 9px;"></i>Sign up</a></li>
              <li><a href="#"><i class="fa fa-language" aria-hidden="true" style="padding-right: 9px;"></i>Language</a></li>
              <li><a href="#"><i class="fa fa-bullhorn" aria-hidden="true" style="padding-right: 9px;"></i>Announcements</a></li>
               <li><a href="#"><i class="fa fa-caret-square-o-down" aria-hidden="true"style="padding-right: 9px;"></i>Mode</a></li>
               <li><a href="#"><i class="fas fa-sign-out-alt" style="padding-right: 9px;"></i>Logout</a></li>
              </div>
            </ul>
          </li>
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
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


<div class="container">
    <h2 class='text-center' style="color: #C3073F; margin: 50px 80px;">Cart Items</h2>

   <table class="table table-bordered bg-black" style="border: 2px solid #000;">
       <tr  style="border: 2px solid #000; background: #C3073F; text-align: center;">
           <th  style="border: 2px solid #000; ">Image</th>
           <th  style="border: 2px solid #000;">Product</th>
           <th  style="border: 2px solid #000;">Price</th>
           <th  style="border: 2px solid #000;">Quantity</th>
           <th  style="border: 2px solid #000;">Total</th>
           <th  style="border: 2px solid #000;">Action</th>
       </tr>
     
  <?php
       $total = 0;
       foreach($cart as $key => $value){



        $sql = "SELECT * FROM product WHERE product_id = '$key2' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result)
        ?>


            <tr  style="border: 2px solid #000; text-align: center;">
           <td  style="border: 2px solid #000;"><img src="ADMIN/<?php echo $row['thumb']?> " alt="" style="width: 100px;height:100px"></td>
           <td  style="border: 2px solid #000; "><button style="background:#C3073F;border:1px solid #000;"><a href="details.php?id=<?php echo $row['product_id']?>" style="color: #000"><?php echo $row['product_name']?></a></button></td>
           <td  style="border: 2px solid #000;"><?php echo $row['price']?> </td>
           <td  style="border: 2px solid #000;"><?php echo $value2['c_quantity']?></td>
           <td  style="border: 2px solid #000;"><?php echo $row['price'] * $value['quantity'] ?></td>
            <td  style="border: 2px solid #000;"><button style="background:#C3073F;border:1px solid #000;"><a href='deleteCart.php?id=<?php echo $key; ?>' style="color: #000" >Remove</a></button></td>
            </tr>

        <?php

$total = $total +  ($row['price'] * $value['c_quantity']);
    }

    ?>

   </table>

 
<div class="card" style="border: 2px solid #000;">
<div class="card-header" style="background: #C3073F;border-bottom: 2px solid #000;">Total</div>
<div class="card-body">
Total Amount: BDT <?php echo $total2; ?>.00/-
</div>
</div>

  <div class="text-right" style="display: flex;justify-content: center;align-items: center;margin:50px 50px;">
    <!-- <button class="btn mr-3">Update Cart</button> -->

    <button class="btn" style="background:#C3073F;border:1px solid #000;color:#000;font-size:20px;font-family: 'GALACTIC VANGUARDIAN NCV';" >Checkout</button>
</div>

</div>      








 


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