<?php
sleep(1);
$mydata = $DATA_OBJ->find->userid;
    //$result = $result[0];
    
    $info->message = $mydata;
    $info->data_type = "contacts";
    echo json_encode($info);
  die;
   $info->message = "No contacts were found";
   $info->data_type = "error";
   echo json_encode($info);
 ?>
