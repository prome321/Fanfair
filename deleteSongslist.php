<?php
 //session_start();

 include('config.php');
 //if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  //header('location:signin.php');
 //}
 

if(isset($_GET['id'])){
    $song_id = $_GET['id'];
   $sql = "DELETE FROM songs WHERE song_id='$song_id'";
   $result = mysqli_query($conn, $sql);
   header('location:Musicviewlist.php');


}


?>