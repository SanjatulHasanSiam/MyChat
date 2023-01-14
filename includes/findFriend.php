<?php
 sleep(0.5);
 $myid = $_SESSION['userid'];

 $mydata = 
 '
 <style>
 @keyframes appear{
  0%{opacity:0;transform:translateY(50px)}
  100%{opacity:1;transform:translateY(0px)}
 }
 #contact{
  cursor:pointer;
  transition:all .5s cubic-bezier(0.68,-2,0.265,1.55);
 }
 #contact:hover{
  transform:scale(1.2);
 }
 </style> 
 <div style="text-align:center ; anidmation:appear 1s ease">';

 $sql = "select * from users where userid !='$myid' ";
 $myusers=$DB->read($sql,[]);
 
 if (is_array( $myusers)) {
  
   foreach( $myusers as $row){
     $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
     if(file_exists($row->image)){
       $image = $row->image;
     }
     $mydata .= "
      <div style='position:relative;' userid='$row->userid' id='contact'  onclick='start_chat(event)'>
        <img src='$image'><br>
        $row->username<br><br>
        <span style='text-decoration:none;cursor:pointer;border-radius:3px;margin-top:2px;border:1px black solid;background-color:orange; '><a style='text-decoration:none;padding:2px;color: white;' href='includes/adduser.php?u_id=$row->userid'>Add User </a></span>
        </div>";
   }
 }
 $mydata .= '
</div>';
    $info->message = $mydata;
    $info->data_type = "friend";
    echo json_encode($info);
  die;

 ?>
