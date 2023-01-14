<?php
session_start();
include_once('../classes/autoload.php');
if(!($_SESSION['userid'])){
  echo "<script>window.location='login.php';</script>";
}
$arr = false;
$arr['userid'] = $_SESSION['userid'];
$arr['curr_userid'] = $_GET['u_id'];
//echo $userid . " " . $curr_userid;
$sql = "DELETE FROM friend_list WHERE (added_by=:userid && added=:curr_userid) || (added_by=:curr_userid && added=:userid)";
$DB = new Database();
  $result = $DB -> write($sql,$arr);
  if($result){
    $delete = "DELETE FROM messages WHERE (sender=:userid && receiver=:curr_userid) || (sender=:curr_userid && receiver=:userid)";
    $DB = new Database();
    $result = $DB -> write($delete,$arr);
    if($result){
      echo "<script>alert('Sccuessfully removed user')</script>";
      echo "<script>window.location='../index.php';</script>";
    }else{
      echo "<script>alert('Something went wrong.Please try again later')</script>";
    echo "<script>window.location='../index.php';</script>";
    }
   
  }
  else{
    echo "<script>alert('Something went wrong.Please try again later')</script>";
    echo "<script>window.location='../index.php';</script>";
  }

?> 