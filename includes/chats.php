<?php
$arr['userid'] = "null";
if(isset( $DATA_OBJ->find->userid)){
  $arr['userid'] = $DATA_OBJ->find->userid;
}
$sql = "select * from users where userid = :userid limit 1";
 $result=$DB->read($sql,$arr);
if(is_array($result)){
//user found
    //$mydata = $DATA_OBJ->find->userid;
    $row = $result[0];
    //$mydata = $result->username;
    $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
    if(file_exists($row->image)){
      $image = $row->image;
    }
  $row->image = $image;
    $mydata = "Now chatting with:<br>
    <div id='active_contact'>
      <img src='$image'>
          $row->username
</div>";

  $messages = "
<div id='messages_holder_parent' style='height:630px;'>
<div id='messages_holder' style='height:490px;overflow-y:scroll;'>"; 

$messages .=message_controls();
    $info->user = $mydata;
    $info->messages = $messages;
    $info->data_type = "chats";
    echo json_encode($info);
}else{
//user not found
$info->message = "That contact was not found";
$info->data_type = "chats";
echo json_encode($info);
}
 
 ?>
