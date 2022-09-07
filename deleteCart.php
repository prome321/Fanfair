<?php
 session_start();

 if(isset($_GET['id'])){
     $id = $_GET['id'];
     unset($_SESSION['poop'][$id]);

      header('location:cart.php');

 }

 ?>