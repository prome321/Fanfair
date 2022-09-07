
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

if(isset($_POST['submit']))
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

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM usering WHERE email='{$email}'")) > 0) {
            $error = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO usering (name, email, password, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
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
                        $mail->Body    = 'Thank you for registering into FANFAIR.<b><a href="http://localhost/FINALSD/ADMIN/signin.php?verification='.$code.'">CLICK HERE</a></b>';
                         $error = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
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







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin SIGNUP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"> FANFAIR</i></h3>
                            </a>
                            <h3>Register Now</h3>
                           
                        </div>
                   
                       
                             
                        <form method="post" >
                        <?php echo $error; ?>
                      
                         <div class="form-floating mb-3">
                              
                            <input  type="text" class="form-control" id="floatingInput" placeholder="name" name="name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required >
                      
                            <label for="floatingInput">Your Name</label>
                        </div>
                        <div class="form-floating mb-3">
                             
                            <input name="email" type="email" class="form-control" placeholder="name@example.com" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required >
                            
                            <label for="floatingInput">Email address</label>
                       
                        </div>
                        <div class="form-floating mb-4">
                               
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"  >
                         
                            <label for="floatingPassword">Password</label>
                      
                        </div>
                         <div class="form-floating mb-4">
                              
                            <input name="confirm-password" type="password" class="form-control" id="floatingPassword" placeholder="Password" >
                           
                            <label for="floatingPassword">Confirm Password</label>
                        
                        </div>
                     
                        <button name="submit" value="submit" type="submit"  class="btn btn-primary py-3 w-100 mb-4" style="background-color: #C3073F">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="signin.php" >Sign In</a></p>
                    </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
      <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>

</html>