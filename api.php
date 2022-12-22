<?php
session_start();
$info=(object)[];
//check if logged in
if(!isset($_SESSION['userid'])){
  if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type !="login"){
    $info->logged_in = false;
    echo json_encode($info);
    die;
  }

}
require_once("classes/autoload.php");
$DB = new Database();
$DATA_RAW=file_get_contents("php://input");
$DATA_OBJ=json_decode($DATA_RAW);
$Error = "";
//process the data
if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="signup"){
  //sign up
 include("includes/signup.php");
}
else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="login"){
   //Log in
 include("includes/login.php");
 }
else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="user_info"){
 // echo "user_info";
}