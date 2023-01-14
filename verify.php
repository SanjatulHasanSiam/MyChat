<?php
require_once('./classes/autoload.php');
$otp = $_GET['otp'];
echo $otp;
if(!empty($otp)){
  $sql = "UPDATE `users` SET `isVerified`='1' WHERE `OTP`='$otp'";
  $res = $DB->write($sql,[]);
  header("Location: http://localhost/MyChat/login.php");
  die();
}
header("Location: http://localhost/MyChat/login.php");
die();

?>