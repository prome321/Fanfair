<?php
 //session_start();

 include('config.php');
 //if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  //header('location:signin.php');
 //}



if(isset($_GET['id'])){
    $list_id = $_GET['id'];
   $sql = "DELETE FROM list WHERE list_id='$list_id'";
   $result = mysqli_query($conn, $sql);
   header('location:listtable.php');


}


?>