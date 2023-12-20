<?php
require_once('vendor/autoload.php');
use Dotenv\Dotenv as Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ .'/');

$dotenv->load();

// $database_name= "ajax";
// $server_name= "localhost";
// $user_name= "root";
// $password= "";

$server_name= $_ENV['host'];
$user_name= $_ENV['username'];
$password= $_ENV['password'];
$database_name= $_ENV['dbname'];
$conn= mysqli_connect($server_name , $user_name , $password , $database_name); 
if ($conn) { 
// echo "connected" ; 
}
?> 