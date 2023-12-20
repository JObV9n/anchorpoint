<?php

// header('Content-Type: application/json');


 include ("connection.php" ); 
$name =  $_POST['name' ]; 
$email =  $_POST['email' ]; 
$address =  $_POST['address' ]; 
$phone =  $_POST['phone' ]; 
$role =  $_POST['role' ]; 
$sql=  "INSERT  INTO `employees`(`name` , `email` , `address` , `phone`,`role`)
 VALUE  (' {$name} ' , ' {$email } ' , ' {$address } ' , ' {$phone } ',' {$role } ')" ; 

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 