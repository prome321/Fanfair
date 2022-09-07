<?php 



$serverName = "localhost";
$userName = "root";
$password = "";
$database = "login";



$conn = mysqli_connect($serverName, $userName, $password, $database);

  if(!$conn){
    die("Sorry: ".mysqli_connect_error());
}
else{

echo "";
}?>