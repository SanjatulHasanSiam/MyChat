<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat | Log In</title>
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
    
    input[type=text],
    input[type=password],
    input[type=submit] {
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
            <div style="font-size: 20px; font-family:myFont; padding-bottom:10px;">Log In</div>
        </div>
        <div id="error" style=""></div>
        <form id="myForm" action="">
            <input type="text" name="email" placeholder="Enter Email"><br>
            <input type="password" name="password" placeholder="Enter new password"><br>
            <input type="submit" value="Log In" id="login_button"><br>
            <br>
            <a href="forgetpassword.php" style="text-decoration:none;display:block;text-align:center;"> Forgot password?</a>
            <a href="signup.php" style="text-decoration:none;display:block;text-align:center;">Don't have an account? Sign Up here</a>
        </form>
    </div>
</body>

</html>
<script type="text/javascript">
    function _(element) {
        return document.getElementById(element);
    }
    var login_button=_("login_button");
    login_button.addEventListener("click",collect_data);
    function collect_data(e){
        e.preventDefault();
        login_button.disabled=true;
        login_button.value="Loading... Please wait...";
        var myForm=_("myForm");
        var inputs=myForm.getElementsByTagName("INPUT");
        var data={};
      for(var i=inputs.length-1;i>=0;i--){
            var key=inputs[i].name;
            switch(key){
                case "email":
                    data.email=inputs[i].value;
                 break;  
                case "password":
                    data.password=inputs[i].value;
                 break;    
            }
      }
      send_data(data,"login");
      
    }

    function send_data(data,type){

        var xml=new XMLHttpRequest();
        xml.onload=function(){
            if(xml.readState==4 || xml.status==200){
                handle_result(xml.responseText);
                login_button.disabled=false;
                login_button.value="Log In";
            } 
        }
            data.data_type=type;
            var data_string=JSON.stringify(data);
            xml.open("POST","api.php",true);
            xml.send(data_string);
    }
    function handle_result(result){
        var data=JSON.parse(result);
        if(data.data_type=="info"){
            window.location="index.php";
        }else{
            var error=_("error");
            error.innerHTML=data.message;
            error.style.display="block";
        }
    }
</script>