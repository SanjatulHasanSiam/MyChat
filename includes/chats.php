<?php
$arr['userid'] = "null";
if(isset( $DATA_OBJ->find->userid)){
  $arr['userid'] = $DATA_OBJ->find->userid;
}
$sql = "select * from users where userid = :userid limit 1";
 $result=$DB->read($sql,$arr);
if(isset($result)){
//user found
    //$mydata = $DATA_OBJ->find->userid;
    $row = $result[0];
    //$mydata = $result->username;
    $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
    if(file_exists($row->image)){
      $image = $row->image;
    }
    $mydata = "Now chatting with:<br>
    <div id='active_contact'>
      <img src='$image'>
          $row->username
</div>";

$messages = "
<div id='messages_holder_parent' style='height:630px;'>
<div id='messages_holder' style='height:490px;overflow-y:scroll;'>
<div id='message_left'>
<div></div>
  <img src='$image'>
     <b> $row->username</b><br>
      Hello this is a text. My name is siam, hello boys and girls<br><br>
      <span style='font-size:11px;color:#999;'>20 Jan 2022 10:00 AM</span>
</div>


<div id='message_right'>
<div></div>
  <img src='$image' style='float:right;'>
     <b> $row->username</b><br>
      Hello this is a text. My name is siam, hello boys and girls<br><br>
      <span style='font-size:11px;color:#999;'>20 Jan 2022 10:00 AM</span>
</div>

<div id='message_right'>
<div></div>
  <img src='$image' style='float:right;'>
     <b> $row->username</b><br>
      Hello this is a text. My name is siam, hello boys and girls<br><br>
      <span style='font-size:11px;color:#999;'>20 Jan 2022 10:00 AM</span>
</div>

<div id='message_right'>
<div></div>
  <img src='$image' style='float:right;'>
     <b> $row->username</b><br>
      Hello this is a text. My name is siam, hello boys and girls<br><br>
      <span style='font-size:11px;color:#999;'>20 Jan 2022 10:00 AM</span>
</div>

<div id='message_right'>
<div></div>
  <img src='$image' style='float:right;'>
     <b> $row->username</b><br>
      Hello this is a text. My name is siam, hello boys and girls<br><br>
      <span style='font-size:11px;color:#999;'>20 Jan 2022 10:00 AM</span>
</div>


<div id='message_right'>
<div></div>
  <img src='$image' style='float:right;'>
     <b> $row->username</b><br>
      Hello this is a text. My name is siam, hello boys and girls<br><br>
      <span style='font-size:11px;color:#999;'>20 Jan 2022 10:00 AM</span>
</div>

</div>
<div style='display:flex;width:100%;height:40px;'>
<input style='flex:6;border:none;font-size:14px;padding:4px;' type='text' placeholder='Type your message here...'>
<input style='flex:1:cursor:pointer;' type='button' value='Send'>
</div>
</div>
";
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
