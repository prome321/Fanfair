<?php  





 
include('config.php');
// if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
//  header('location:mainusersignin.php');
// }
 ?>
<?php  

 session_start();
 

 

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';


$total = 0;
if(isset($_SESSION['poop'])){

$cart=$_SESSION['poop'];
	foreach($cart as $key => $value){
	 // echo $key ." : ". $value['quantity'] . "<br>";
	 
	 $sql_cart = "SELECT * FROM product where product_id = $key";
	$result_cart = mysqli_query($conn, $sql_cart);
	$row_cart = mysqli_fetch_assoc($result_cart);
	$total = $total +  ($row_cart['price'] * $value['quantity']);
}
}


$message  = '';


if(isset($_POST['submit'])){
	 
	
	$country = $_POST['country'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$companyName = $_POST['companyName'];
	$addr1 = $_POST['addr1'];
	$addr2 = $_POST['addr2'];
	$city = $_POST['city'];
	$state = '';
	$Postcode = $_POST['Postcode'];
	$Email = '';
	$Phone = $_POST['Phone'];
	$payment = $_POST['payment'];

	$cid = $_SESSION['customerid']; 
	$sql = "SELECT * FROM user_data where userid = $cid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if (mysqli_num_rows($result) == 1) {
//   update query
$up_sql = "UPDATE user_data SET firstname='$fname', lastname='$lname', company='$companyName', address1='$addr1', address2='$addr2', city='$city', zip='$Postcode', mobile='$Phone'  WHERE userid=$cid";

$Updated = mysqli_query($conn, $up_sql);
if($Updated){

	if(isset($_SESSION['poop'])){

		$total = 0;
		foreach($cart as $key => $value){
		 // echo $key ." : ". $value['quantity'] . "<br>";
		 
		 $sql_cart = "SELECT * FROM product where product_id = $key";
		$result_cart = mysqli_query($conn, $sql_cart);
		$row_cart = mysqli_fetch_assoc($result_cart);
		$total = $total +  ($row_cart['price'] * $value['quantity']);
	}
	}


	// echo 'order table and order items - updated';

	$insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode )
	VALUES ('$cid', '$total', 'Order Placed', '$payment')";  

	if(mysqli_query($conn, $insertOrder)){
	 
		$orderid = mysqli_insert_id($conn); 
		foreach($cart as $key => $value){ 
			$sql_cart = "SELECT * FROM product where product_id = $key";
		   $result_cart = mysqli_query($conn, $sql_cart);
		   $row_cart = mysqli_fetch_assoc($result_cart); 
			$price_product = $row_cart["price"];
			 $q  = $value["quantity"];
		   $insertordersItems = "INSERT INTO ordersItems (orderid, productid, quantity, productprice) 
		    VALUES ('$orderid', '$key', '$q', '$price_product')";
		   
		   if(mysqli_query($conn, $insertordersItems)){
			//    echo 'inserted on both table orders and ordersItems';
			unset($_SESSION['poop']);
			// header("location:myaccount.php");
			echo '<script>window.location.href = "product.php";</script>';

		
		   }


	   }

	

	}
}
}




  else {

 $country = $_POST['country'];
 	$fname = $_POST['fname'];
 	$lname = $_POST['lname'];
 	$companyName = $_POST['companyName'];
 	$addr1 = $_POST['addr1'];
	$addr2 = $_POST['addr2'];
 	$city = $_POST['city'];
 	$state = '';
	$Postcode = $_POST['Postcode'];
 	$Email = '';
 	$Phone = $_POST['Phone'];
 	$payment = $_POST['payment'];

 	$cid = $_SESSION['customerid']; 


   $ins_sql = "INSERT INTO user_data (userid, firstname, lastname, company, address1, address2, city,  zip, mobile)
   VALUES ('$cid', '$fname', '$lname', '$companyName', '$addr1', '$addr2', '$city',  '$Postcode', '$Phone')"; 
$inserted = mysqli_query($conn, $ins_sql);
if($inserted){
	 echo 'order table and order items - inserted';
	
 	if(isset($_SESSION['poop'])){
 		$total = 0;
		foreach($cart as $key => $value){
 		  echo $key ." : ". $value['quantity'] . "<br>";
		 
		 $sql_cart = "SELECT * FROM product where product_id = $key";
		$result_cart = mysqli_query($conn, $sql_cart);
	$row_cart = mysqli_fetch_assoc($result_cart);
 		$total = $total +  ($row_cart['price'] * $value['quantity']);
 	}
	}


 echo 'order table and order items - updated';

	$insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode )
	VALUES ('$cid', '$total', 'Order Placed', '$payment')";  

 	if(mysqli_query($conn, $insertOrder)){
	 
		$orderid = mysqli_insert_id($conn); 
		foreach($cart as $key => $value){ 
			$sql_cart = "SELECT * FROM product where product_id = $key";
		   $result_cart = mysqli_query($conn, $sql_cart);
		   $row_cart = mysqli_fetch_assoc($result_cart); 
 			$price_product = $row_cart["price"];
 			 $q  = $value["quantity"];
 		   $insertordersItems = "INSERT INTO ordersItems (orderid, productid, quantity, productprice) 
		    VALUES ('$orderid', '$key', '$q', '$price_product')";
		   
 		   if(mysqli_query($conn, $insertordersItems)){
 			   echo 'inserted on both table orders and ordersItems';
 			unset($_SESSION['poop']);
			// header("location:myaccount.php");
			echo '<script>window.location.href = "index.php";</script>';

		
		   }


 	   }

	

 	}
}

 }
  }






// $cid =$_SESSION['customerid'];

// $sql = "SELECT * FROM user_data where userid = $cid";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);


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

 <!-- Music button html -->

  <!-- Music button html -->

 <section class="main-section">

  <div class="banner">
    <div class="slider">
      <img src=  "Images/First/hi1.png" alt="" id="slideImg">
    </div>
   

  
  
 

  </div>

    </div>
  </div>

 </section>



 
 

<div class="container text-black">

	<?php
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";



if(isset($_SESSION['poop'])){
	$total = 0;
	foreach($cart as $key => $value){
	 // echo $key ." : ". $value['quantity'] . "<br>";
	 
	 $sql_cart = "SELECT * FROM product where product_id = $key";
	$result_cart = mysqli_query($conn, $sql_cart);
	$row_cart = mysqli_fetch_assoc($result_cart);
	$total = $total +  ($row_cart['price'] * $value['quantity']);
}
}



?>

    <section id="content">
		<div class="content-blog">
					<div class="page_header text-center  py-5">
						<h2 style="color: #C3073F">FANFAIR SHOP - Checkout</h2>
						
					</div>

<div class="container px-4">
			<div class="row gx-5" style="border: 5px solid #c3073f ; background: #FDEEF4;" >
				<div  class="col  p-3"  >
					<div class="billing-details p-3">
						<h4 class="uppercase" style="color: #C3073F">Billing Details</h4>
					
						<form method="post">
							<label class="">Country </label>
							<select class="form-control" name='country'>
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select>

						
							<div class="row" style="margin-top: 10px!important;">
								<div class="col-md-6" >
									<label>First Name </label>
									<input class="form-control" name='fname' placeholder="" value="<?php if(isset($row['firstname'])) { echo $row['firstname']; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input class="form-control" name='lname' placeholder="" value="<?php if(isset($row['lastname'])) {echo $row['lastname']; } ?>" type="text">
								</div>
							</div>
							
							<label style="margin-top: 10px!important;">Company Name</label>
							<input class="form-control" name='companyName' placeholder="" value="<?php if(isset($row['company'])) {echo $row['company']; } ?>" type="text">
							
							<label style="margin-top: 10px!important;">Address </label>
							<input class="form-control" name='addr1' placeholder="Street address" value="<?php if(isset($row['address1'])) {echo $row['address1']; } ?>" type="text">
						
							<input class="form-control" style="margin-top: 10px!important;"  name='addr2' placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(isset($row['address2'])) {echo $row['address2'];  } ?>" type="text">
						
							<div class="row" style="margin-top: 10px!important;">
								<div class="col-md-4">
									<label>Town / City </label>
									<input class="form-control" name='city' placeholder="Town / City" value="<?php if(isset($row['city'])) {echo $row['city']; } ?>" type="text">
								</div>
								
								<div class="col-md-4" >
									<label>Postcode </label>
									<input class="form-control" name='Postcode' placeholder="Postcode / Zip" value="<?php if(isset($row['zip'])) {echo $row['zip']; } ?>" type="text">
								</div>
							</div>
						
							
							
							<label style="margin-top: 10px!important;">Phone </label>
							<input class="form-control" name='Phone'  id="billing_phone" placeholder="" value="<?php if(isset($row['mobile'])) {echo $row['mobile']; } ?>" type="text">
						
					</div>
				</div>
				
				
			</div>
			
			
			<h4 class="heading" style="margin-top: 50px!important;">Your order</h4>
			
			<table class="table text-dark" style="border: 5px solid #c30735;background: #FDEEF4;">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount"><?php echo $total?>.00/-</span></td>
					</tr>
					<tr>
						<th>Shipping and Handling</th>
						<td>
							Free Shipping				
						</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount"><?php echo $total?>.00/-</span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			
			
			<div class="payment-method mt-5" style="margin-top: 20px!important;border: 5px solid #c3073f;background: #FDEEF4;" >
                
				<div class="row d-flex">
				
						<div class="col-md-4">
							<input name="payment" value='COD'  id="radio1" class="mr-2 css-checkbox" type="radio"><span>COD</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value='Cheque'  id="radio2" class="mr-2 css-checkbox" type="radio"><span>Cheque Payment</span>
							<div class="space20"></div>
							<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
						</div>
						<div class="col-md-4">
							<input name="payment" value='Paypal'  id="radio3" class="mr-2 css-checkbox" type="radio"><span>Paypal</span>
							<div class="space20"></div>
							<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
						</div>
				
                </div>
           
				
        </div>		
        
        <div class="row">
            <div class="space30"></div>
				
				<input type="submit" name="submit" value='Pay Now' class="btn" style="border: 2px solid  #FDEEF4;background: #c3073f;max-width: 25%;  margin-left: 400px;">
			</div>
        </div>
		
		</div>
	</section>
</div>
</form>

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


  
        





  


    






    






		
		




<!-- For Music Button js -->
<script>
  function playMusic(){
  var music = new Audio('Songs/Ei Obelay - Shironamhin(sumirbd.mobi).mp3');
  music.play();
  }
</script>



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