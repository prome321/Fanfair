<?php
 //session_start();

 include('config.php');
 //if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  //header('location:signin.php');
 //}
 

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "DELETE FROM product WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
   header('location:Products.php');


}


?>