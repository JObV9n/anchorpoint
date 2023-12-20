<?php

include ("connection.php" );
$name= $_POST['name' ];
$email= $_POST['email' ];
$password= $_POST['password' ];
$address= $_POST['address' ];
$phone= $_POST['phone' ];
$id= $_POST['employee_id' ];
// $role= $_POST['role' ];
$sql= "UPDATE `employees`  SET  `name` = '". $name."'  , `email` =  '". $email."' , 
`password`='".$password."',`address`  =  '".$address ."' , `phone`  ='".$phone."',' WHERE `id` = $id " ;

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record updated succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record updated failed!'
    ];
    print_r(json_encode($response));
} 
?>