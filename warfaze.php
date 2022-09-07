
<?php

include('config.php');





?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Fan Based Website</title>
	<!-- CSS LINK -->
	<link rel="stylesheet" type="text/css" href="stylewar.css">
  <link rel="stylesheet" href="CSS/responsive.css">
  <link rel="stylesheet" type="text/js" href="JS/design.js">
	<!-- JAVASCRIPT LINK -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Josefin+Sans:wght@100&family=Merriweather:ital,wght@0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Signika+Negative:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>

<body onload="slider()">

<!-- Navigation Bar -->

<?php 

include ('config.php');


$name = "";
$email = "";
$number = "";
$message = "";
$errorMessage = "";
if (isset($_GET['$error'])) {
    $errorMessage = $_GET['$error'];
}

if(isset($_SESSION['customer']))
{

if (isset($_POST['Send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number =  $_POST['phone'];
    $message = $_POST['message'];
    $userId = $_SESSION['customerid'];
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message'])) {
        $errorMessage .= "*Please fillup all the fields!";
    } elseif (strlen($number) != 11 or $number[0] != '0' or $number[1] != '1') {
        $errorMessage .= "*Invalid phone number!<br>";
    }
    if ($errorMessage == "") {
        $quer = "INSERT INTO support(userid,name,email,phone,message) VALUES('$userid','$name','$email','$number','$message')";
          $result = mysqli_query($conn, $quer);

      
    
        if ($result) {
            header("Location:index.php");
            die;
        }
    }
}
}

?>















<?php
  
    include 'config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usering WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE usering SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: signin.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM usering WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                header("Location: form.php");
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }
?>

<?php
$error='';




  
 include 'config.php';
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
                      //Load Composer's autoloader
require 'vendor/autoload.php';

function clean_text($string)
{
    $string=trim($string);
    $string=stripcslashes($string);
    $string=htmlspecialchars($string);
    return $string;


}

if(isset($_POST['submit1']))
{
  if(empty($_POST["name"]))
    {
         $error = "<div class='alert alert-danger'>{$name} - Please Enter Your Name.</div>";

    }
    else
    {
        $name=clean_text($_POST["name"]);
        if(!preg_match("/^[a-zA-Z]*$/",$name))
        {
                 $error = "<div class='alert alert-danger'> Please Enter Your Name.</div>";
        }

    }
    
     if(empty($_POST["email"]))
    {
        $error .='<p><label class="text-danger">Please Enter Email No.</label></p>';

    }
    else
    {
        $email=clean_text($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
                $error .='<p><label class="text-danger">Invalid Email Format</label></p>';
        }

    }
       if(empty($_POST["password"]))
    {
        $error = "<div class='alert alert-danger'> Please Enter Your Email.</div>";

    }
    else
    {
        $password=clean_text($_POST["password"]);
        if(!filter_var($password, 
  FILTER_VALIDATE_REGEXP,
  array( "options"=> array( "regexp" => "/.{6,25}/"))))
        {
              $error = "<div class='alert alert-danger'>Invalid Password</div>";


    }


    
    

}
if($error=='')
{



       $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
        $code = mysqli_real_escape_string($conn, md5(rand()));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mainuser WHERE email='{$email}'")) > 0) {
            $error = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO mainuser (name, email, password, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div style='display: none;'>";
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'fanfair7890@gmail.com';                     //SMTP username
                        $mail->Password   = 'kjnuxzofnrxxfxss';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('fanfair7890@gmail.com');
                        $mail->addAddress($email);

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Welcome to fanfair';
                        $mail->Body    = 'Thank you for registering into FANFAIR.<b><a href="http://localhost/ADMIN/signin.php?verification='.$code.'">CLICK HERE</a></b>';
                         $error = "<div class='alert alert-info'>We've sent a verification link on your email address.</div>";
                        $mail->send();

                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                   
                } else {
                    $error = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            } else {
                $error = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }

               
                 

                
                 } 



                   




    





    }








?>




  <!-- Body Part -->
<div id="content_wrapper">
 <div id="band_sidebar">
   <div class="band_name_img">
     <a class="image" id="logo" title="Warfaze" href="https://www.metal-archives.com/images/1/4/7/9/14796_logo.jpg?4709">
      <img src="Imageswar/logoo.jpg" title="Click to zoom" alt="Warfaze - Logo" border="0">
    </a>
   </div>
   <div class="band_img">
     <a class="image" id="photo" title="Warfaze" href="https://www.metal-archives.com/images/1/4/7/9/14796_photo.jpg?4543">
       <img src="Imageswar/photo.jpg" title="Click to zoom" alt="Warfaze - Photo" border="0">
     </a>
   </div>
   <script defer src="https://partner.linkfire.com/channel_partners/script.js" type="text/javascript"></script>
   <div id="affiliation-links">
     <span class="merch_title"><strong>Buy their Stuff</strong></span>
     <br>
     <ul id="buyLinks" class="menu_style_5">
       <li>
         <a target="_blank" href="product.php"><strong>Search Here</strong></a>
       </li>
     </ul>
   </div>
 </div>



 <div id="band_content">
<?php

                    $sql = "SELECT * FROM warfaze";
if(isset($_GET['id'])){
    $bid = $_GET['id'];
    $sql .= " WHERE bid= '$bid'";
}

//$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql); 
while($row = mysqli_fetch_assoc($result)) {
// echo $row['id'] ." ". $row['name'] ." ". $row['image'] ." ". $row['price']."<br>";
?>

   <div id="band_info">
     <h1 class="band_name">
       <a href="">Warfaze</a>
     </h1>
     <div class="clear block_spacer_5"></div>
     <div id="band_stats">
       <dl class="float_left">
         <dt>Country of Origin: </dt>
         <dd>
           <a href=""><?php echo $row['origin']?></a>
         </dd>
         <dt>Location: </dt>
         <dd><?php echo $row['location']?></dd>
         <dt>Status: </dt>
         <dd class="active"><?php echo $row['status']?></dd>
         <dt>Formed in: </dt>
         <dd><?php echo $row['formed']?></dd>
       </dl>
       <dl class="float_right">
         <dt>Genre: </dt>
         <dd><?php echo $row['genre']?></dd>
         <dt>Lyrical Themes: </dt>
         <dd><?php echo $row['theme']?></dd>
         <dt>Current Label: </dt>
         <dd>
           <a href=""><?php echo $row['label']?></a>
         </dd>
       </dl>
       <dl style="width:100%;" class="clear">
       <dt>Years Active: </dt>
       <dd> <?php echo $row['yearactive']?></dd>
     </dl>
     </div>
     <div class="band_comment clear">
      <h2><strong>Summary: </strong></h2>
      <br>
       <p><?php echo $row['summary']?></p>
       <br>
       
       <h2><strong>Compilation Appearances: </strong></h2>
       <p><?php echo $row['appearance']?></p>
        <div class="tool_strip bottom right">
          <a href="#" onclick="if (!window.__cfRLUnblockHandlers) return false; readMore('band/read-more/id/14796'); return false;" class="btn_read_more">Read more</a>
        </div>
     </div>
   </div>
   <div class="container2">
      <div class="tabs">
        <h3 class="active">Discography</h3>
        <h3>Members</h3>
      </div>
      <div class="tab-content">
        <div class="active">
          <h4>Complete Discography: </h4>
          <p>
            <?php echo $row['discography']?>
          </p>
        </div>
        <div>
          <h4>Band Members: </h4>
          <p>
             <?php echo $row['members']?>
          </p>
        </div>
    
      </div>
    </div>
  
 </div>
 <?php
                      }
                  
                  
                  ?>
</div>
 <div class="container3" style="margin-top:-50px">
      <div class="tabss">
        <h3 class="activee">Media</h3>
      </div>
      <div class="tabs-content">
        <div class="activee">
         
        <a class="image" id="photo" title="Warfaze" href="https://www.flickr.com/photos/tags/warfaze/">
       <img src="Imageswar/img.jpg" title="Click to zoom" alt="Warfaze - Photo" border="0">
        </a>
            
        </div>
      </div>
    </div>

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


<!--   <div class="tenor-gif-embed" data-postid="13404771" data-share-method="host" data-aspect-ratio="1" data-width="100%"></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script> -->



        




  








       






  
      





  


    






    






		
		











<script>
 var slideImg = document.getElementById("slideImg");
 var Images = new Array(
      "Images/15.png",
      "Images/16.png",
      "Images/33.png"

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

<script src="scriptwar.js"></script>
</body>