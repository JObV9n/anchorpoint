<?php

// header('Content-Type: application/json');

include ("connection.php" );    
include ("./function.php");
session_start();

if(!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}
$user_id= $_SESSION['id'];

$sql= "SELECT *  FROM `tb_user` WHERE `id`=$user_id" ; 
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 