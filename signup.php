<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat | Sign Up</title>
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
    input[type=button] {
        padding: 10px;
        margin: 10px;
        width: 98%;
        border: solid 1px grey;
        border-radius: 5px;
    }
    
    input[type=button] {
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
            <div style="font-size: 20px; font-family:myFont; padding-bottom:10px;">Sign Up</div>
        </div>
        <div id="error" style=""></div>
        <form id="myForm" action="">
            <input type="text" name="username" placeholder="Enter Username"><br>
            <input type="text" name="email" placeholder="Enter Email"><br>

            <div style="padding:10px">
                <br>Gender: <br>
                <input type="radio" value="Male" name="gender_male" id="">Male <br>
                <input type="radio" value="Female" name="gender_female" id="">Female <br>
            </div>

            <input type="password" name="password" placeholder="Enter new password"><br>
            <input type="password" name="password2" placeholder="Retype password"><br>
            <input type="button" value="Sign up" id="signup_button"><br>
            <a href="login.php" style="text-decoration:none;display:block;text-align:center;">Already have an account? Log In here</a>
        </form>
    </div>
</body>

</html>
<script type="text/javascript">
    function _(element) {
        return document.getElementById(element);
    }
    var signup_button=_("signup_button");
    signup_button.addEventListener("click",collect_data);
    function collect_data(){
        signup_button.disabled=true;
        signup_button.value="Loading... Please wait...";
        var myForm=_("myForm");
        var inputs=myForm.getElementsByTagName("INPUT");
        var data={};
      for(var i=inputs.length-1;i>=0;i--){
            var key=inputs[i].name;
            switch(key){
                case "username":
                 data.username=inputs[i].value;
                 break;   
                case "email":
                    data.email=inputs[i].value;
                 break;  
                case "gender_male":
                case "gender_female":
                    if(inputs[i].checked){
                        data.gender=inputs[i].value;
                    }
                    break;
                case "password":
                    data.password=inputs[i].value;
                 break;  
                case "password2":
                    data.password2=inputs[i].value;
                 break;  
            }
      }
      send_data(data,"signup");
      
    }

    function send_data(data,type){

        var xml=new XMLHttpRequest();
        xml.onload=function(){
            if(xml.readState==4 || xml.status==200){
                handle_result(xml.responseText);
                signup_button.disabled=false;
                signup_button.value="Sign Up";
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