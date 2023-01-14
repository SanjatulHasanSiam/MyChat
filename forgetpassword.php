<?php
session_start();
require_once('./mailer.php');
require_once("./classes/autoload.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
        $query = "select * from users where email='$email' limit 1";
        $DB = new Database();
        $result = $DB->read($query, []);
        
        if(is_array($result)){
        $otp = rand(1000,2000);
        $_SESSION['email'] = $email;
        $query = "UPDATE `users` SET `OTP`='$otp' WHERE email='$email'";
        $DB = new Database();
        $result = $DB->read($query, []);
        sendMail($email,$otp,"Resetting Password");
            header("Location: http://localhost/MyChat/changepassword.php");
            
        }else{
            echo "<script>alert('Email id not found','_self')</script>";
        }
    
    function generateNumericOTP($n)
    {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        return $result;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat | Forget Password</title>
</head>
<style type="text/css">
    @font-face {
        font-family: headFont;
        src: url(ui/fonts/Summer-Vibes-OTF.otf);
    }
    
    @font-face {
        font-family: myFont;
        src: url(ui/fonts/OpenSans-Regular.ttf);
    }
    
    #wrapper {
        max-width: 900px;
        min-height: 500px;
        margin: auto;
        color: grey;
        font-family: myFont;
        font-size: 13px;
    }
    
    #header {
        background-color: #485b6c;
        font-size: 40px;
        text-align: center;
        font-family: headFont;
        width: 100%;
        color: white;
    }
    
    form {
        margin: auto;
        padding: 10px;
        width: 60%;
        max-height: 400px;
    }
    
    input[type=email],
    input[type=password],
    input[type=submit],input[type=submit] {
        padding: 10px;
        margin: 10px;
        width: 98%;
        border: solid 1px grey;
        border-radius: 5px;
    }
    
    input[type=submit] {
        width: 103%;
        cursor: pointer;
        background-color: #2b5488;
        color: white;
    }
    
    input[type=radio] {
        transform: scale(1.2);
        cursor: pointer;
    }
    #error{
        text-align:center; 
        padding: 0.5em; 
        background-color: #ecaf91; color: white;  
        display:none;
    }
</style>

<body>
    <div id="wrapper">
        <div id="header">My Chat
            <div style="font-size: 20px; font-family:myFont; padding-bottom:10px;">Forget Password?</div>
        </div>
        <div id="error" style=""></div>
        <form id="myForm" action="" method="POST">
            <input type="email" name="email" placeholder="Enter Email" required><br>
            <!-- <input type="password" name="password" placeholder="Enter new password" required><br> -->

            <input type="submit" name="submit" value="Submit" id="submit_button"><br>
            <br>
            <a href="signup.php" style="text-decoration:none;display:block;text-align:center;">Don't have an account? SignUp here</a>
        </form>
    </div>
</body>

</html>