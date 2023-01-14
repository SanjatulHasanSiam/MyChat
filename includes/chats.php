<?php
$arr['userid'] = "null";
if(isset( $DATA_OBJ->find->userid)){
  $arr['userid'] = $DATA_OBJ->find->userid;
}

$refresh = false;
$seen = false;
if($DATA_OBJ->data_type=="chats_refresh"){
  $refresh = true;
  $seen = $DATA_OBJ->find->seen;
}
$sql = "select * from users where userid = :userid limit 1";
 $result=$DB->read($sql,$arr);
if(is_array($result)){
    $row = $result[0];
    $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
    if(file_exists($row->image)){
      $image = $row->image;
    }
  $row->image = $image;
  $mydata = "";
  if(!$refresh){
    $mydata = "Now chatting with:<br>
    <div id='active_contact'>
      <img src='$image'>
          $row->username<br><br>
          <span style='text-decoration:none;cursor:pointer;border-radius:3px;padding:1.5px;margin-top:2px;border:1px black solid;background-color:orange; color: white;font-weight: bold;'><a style='text-decoration:none;color: whitw;font-weight: bold' href='includes/block_user.php?u_id=$row->userid'>Remove User</a></span>
</div>";
  }
  $messages = "";
  $new_message = false;
  if(!$refresh){
  $messages = "
<div id='messages_holder_parent' onclick='set_seen(event)' style='height:630px;'>
<div id='messages_holder' style='height:460px;overflow-y:scroll;'>"; 
}
//read from db
$a['sender']=$_SESSION['userid'];
  $a['receiver'] = $arr['userid'];
  $sql = "select * from messages where (sender = :sender && receiver = :receiver && deleted_sender=0) OR (receiver  = :sender && sender = :receiver && deleted_receiver=0) order by id desc limit 10";
$result2=$DB->read($sql,$a);
 if (is_array($result2)) {
    $result2 = array_reverse($result2);
    foreach($result2 as $data){

      $myuser = $DB->get_user($data->sender);
      //check for new messages
      if($data->received==0 && $data->receiver == $_SESSION['userid']){
        $new_message = true;
      }
      if($data->receiver == $_SESSION['userid'] && $data->received == 1 && $seen){
        $DB->Write("update messages set seen = 1 where id = '$data->id' limit 1");
      }
      if($data->receiver == $_SESSION['userid']){
        $DB->Write("update messages set received = 1 where id = '$data->id' limit 1");
      }
      if($_SESSION['userid']==$data->sender){
        $messages .= message_right($data,$myuser);
      }
      else{
        $messages .= message_left($data,$myuser);
      }
    }
 }

  if (!$refresh) {
    $messages .= message_controls();
  }
    $info->user = $mydata;
    $info->messages = $messages;
    $info->data_type = "chats";
    $info->new_message = $new_message;
  if ($refresh) {
    $info->data_type = "chats_refresh";
  }
    echo json_encode($info);
}else{
  $a['userid']=$_SESSION['userid'];
  $sql = "select * from messages where (sender = :userid || receiver = :userid) group by msgid order by id asc limit 10";
 $result2=$DB->read($sql,$a);
  $mydata = "Previous Chats:<br>";
 if (is_array($result2)) {
    $result2 = array_reverse($result2);
    foreach($result2 as $data){
      $other_user=$data->sender;
      if($data->sender== $_SESSION['userid']){
        $other_user=$data->receiver;
      }
      $myuser = $DB->get_user( $other_user);
      $image =($myuser->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
      if(file_exists($myuser->image)){
        $image = $myuser->image;
      }
      $mydata .= "
      <div userid='$myuser->userid' id='active_contact'  onclick='start_chat(event)' style='cursor:pointer;'>
        <img src='$image'>
            $myuser->username<br>
         
      </div>";
    }
 }
//  <span style='font-size:11px;'>'$data->message'</span>
 $info->user = $mydata;
 $info->messages = "";
 $info->data_type = "chats";
 echo json_encode($info);
}
 
 ?>
