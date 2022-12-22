<?php
session_start();
$DATA_RAW=file_get_contents("php://input");
$DATA_OBJ=json_decode($DATA_RAW);
$info=(object)[];
//check if logged in
if (!isset($_SESSION['userid'])) {
  if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type!= "login" && $DATA_OBJ->data_type!= "signup") {
    $info->logged_in = false;
    echo json_encode($info);
    die;
  }
}

require_once("classes/autoload.php");
$DB = new Database();

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
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="logout"){
  //  logout
  include("includes/logout.php");
 }
else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="user_info"){
 // user_info
 include("includes/user_info.php");
}
else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="contacts"){
  // user_info
  include("includes/contacts.php");
 }
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="chats"){
  // user_info
  include("includes/chats.php");
 }
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="settings"){
  // user_info
  include("includes/settings.php");
 }