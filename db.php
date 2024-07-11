<?php session_start(); ?>
<?php
 $result = array('error'=> false);
 $host_name ="localhost";
 $host_user ="root";
 $host_pass="";
 $host_db="technohope";
 
$conn = new mysqli ($host_name,$host_user,$host_pass,$host_db);



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

?>
