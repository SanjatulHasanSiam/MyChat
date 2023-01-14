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
$query = "insert into users (userid,username,gender,email,password,date) values (:userid,:username,:gender,:email,:password,:date)";
$sql = "INSERT INTO block_list (blocked_by, blocked) VALUES (:userid,:curr_userid)";
$DB = new Database();
  $result = $DB -> write($sql,$arr);
  if($result){
    echo "<script>alert('User blocked sccuessfully')</script>";
    echo "<script>window.location='../index.php';</script>";
  }
  else{
    echo "<script>alert('Something went wrong.Please try again later')</script>";
    echo "<script>window.location='../index.php';</script>";
  }

?> 