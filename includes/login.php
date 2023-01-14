<?php
$info=(object)[];

 $data=false;
//Validate info
 $data['email'] = $DATA_OBJ->email;
 if(empty($DATA_OBJ->email)){
   $Error="Please enter a valid email.<br>";
 }
 else{
   if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$DATA_OBJ->email)){
     $Error="Please enter a valid email.<br>";
   }
 }

 if(empty($DATA_OBJ->password)){
   $Error="Please enter a valid password.<br>";
 }
 else{
   if(strlen($DATA_OBJ->password)<8){
     $Error="Password must be atleast 8 charachters long.<br>";
   }
 }
 if ($Error == "") {
   $query = "select * from users where email=:email limit 1";
   $result = $DB->read($query,$data);
   if (is_array($result)) {
    $result = $result[0];
    $verify = password_verify($DATA_OBJ->password, $result->password);
   // if($result->password == $DATA_OBJ->password){
      if($verify ){
      $_SESSION['userid'] = $result->userid;
      $info->message = "You're logged in successfully.";
      $info->data_type = "info";
      echo json_encode($info);
    }
    else{
      $info->message = "Wrong Password";
      $info->data_type = "error";
      echo json_encode($info);
    }
  } else {
     
     $info->message = "Wrong Email";
     $info->data_type = "error";
     echo json_encode($info);
   }
  }
  else{
   
  $info->message = $Error;
  $info->data_type = "error";
  echo json_encode($info);
 }