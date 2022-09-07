<?php
 session_start();
if(isset($_GET['id'])){

    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    }else{
        $quantity = 1;
    }
     $id = $_GET['id'];

   $_SESSION['poop'][$id] = array('quantity2' => $quantity);
    header('location:ticketbilling.php');

 
 }
?>