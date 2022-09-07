<?php 
session_start();
include('config.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = $_POST['password'];

     $sql = "SELECT * FROM signinuser WHERE code='' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

 //$dbStoredPASSWORD = $row['password'];

if ($result) {
     $_SESSION['custom'] = $email;
     $_SESSION['customerid']=$row['id'];
     header('location:checkout.php');
  } else {
    header('location:mainusersignin.php?message=1');
//    $message =  'incorrect Credentials';
  }





}




?>