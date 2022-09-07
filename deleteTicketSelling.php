<?php
 //session_start();

 include('config.php');
 //if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  //header('location:signin.php');
 //}
 

if(isset($_GET['id'])){
    $ticket_id = $_GET['id'];
   $sql = "DELETE FROM ticket WHERE ticket_id='$ticket_id'";
   $result = mysqli_query($conn, $sql);
   header('location:ticketview.php');


}


?>