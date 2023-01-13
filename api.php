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
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="chats" || $DATA_OBJ->data_type=="chats_refresh"){
  // user_info
  include("includes/chats.php");
 }
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="settings"){
  // user_info
  include("includes/settings.php");
 }
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="save_settings"){
  // user_info
  include("includes/save_settings.php");
 }
 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="send_message"){
  include("includes/send_message.php");
 }

 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="delete_message"){
  include("includes/delete_message.php");
 }

 else if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type=="delete_thread"){
  include("includes/delete_thread.php");
 }
 
 function message_left($data,$row){
  $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
     if(file_exists($row->image)){
       $image = $row->image;
     }
  return "
  <div id='message_left'>
  <div></div>
    <img id='prof_img' src='$image'>
       <b> $row->username</b><br>
       $data->message<br><br>
        <span style='font-size:11px;color:white;'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
        <img id='trash' onclick='delete_message(event)' msgid='$data->id' src='ui/icons/trash.png'>
  </div>";
 }

 function message_right($data,$row){
  $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
     if(file_exists($row->image)){
       $image = $row->image;
     }
  $a= "
  <div id='message_right'>
  <div>";
  if($data->seen){
    $a.="<img id='prof_img' src='ui/icons/blue check mark.png' style=''>";
  }else if($data->received){
    $a.="<img src='ui/icons/check mark.png' style=''>";
  }
  $a.=" </div>
    <img src='$image' style='float:right;'>
       <b> $row->username</b><br>
       $data->message<br><br>
        <span style='font-size:11px;color:#888;'>".date("jS M Y H:i:s a",strtotime($data->date))."</span>
        <img id='trash' onclick='delete_message(event)' msgid='$data->id' src='ui/icons/trash.png'>
  </div>";
  return $a;
 }

 function message_controls(){
  return "
  </div>
  <span style='color:purple;cursor:pointer;' onclick='delete_thread(event)' >Delete this conversation</span>
  <div style='display:flex;width:100%;height:40px;margin:5px;cursor:pointer;'>
  <label for='message_file'><img src='ui/icons/clip.png' style='opacity:0.8;width:30px;margin:5px;cursor:pointer;'></label>
  <input id='message_file' type='file' name='file' style='display:none;'>
  <input id='message_text' onkeyup='enter_pressed(event)'  style='flex:6;border:solid thin #ccc;border-bottom:none;font-size:14px;padding:4px;' type='text' placeholder='Type your message here...'>
  <input style='flex:1:cursor:pointer;' type='button' value='Send' onclick='send_message(event)'>
  </div>
  </div>";
 }