 <?php
 sleep(0.75);
 $myid = $_SESSION['userid'];
 $sql = "select * from users where userid !='$myid' limit 10";
 $myusers=$DB->read($sql,[]);
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
 <div style="text-align:center ; animation:appear 1s ease">';
 if (is_array( $myusers)) {
   foreach( $myusers as $row){
     $image =($row->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
     if(file_exists($row->image)){
       $image = $row->image;
     }
     $mydata .= "
      <div userid='$row->userid' id='contact'  onclick='start_chat(event)'>
        <img src='$image'><br>
            $row->username
 </div>";
 
   }
 }
 $mydata .= '
</div>';
    $info->message = $mydata;
    $info->data_type = "contacts";
    echo json_encode($info);
  die;

 ?>
