<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chat</title>
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
        display: flex;
        margin: auto;
        color: white;
        font-family: myFont;
        font-size: 13px;
    }
    
    #left_pannel {
        min-height: 500px;
        background-color: #27344b;
        flex: 1;
        text-align: center;
    }
    
    #profile_image {
        width: 50%;
        border: solid thin white;
        border-radius: 50%;
        margin: 10px;
    }
    
    #left_pannel label {
        width: 100%;
        height: 20px;
        display: block;
        background-color: #404b56;
        border-bottom: solid thin #ffffff55;
        cursor: pointer;
        padding: 5px;
        transition: all 1s ease 0.3s;
    }
    
    #left_pannel label:hover {
        background-color: #778593;
    }
    
    #left_pannel label img {
        float: right;
        width: 25px;
    }
    
    #right_pannel {
        min-height: 500px;
        flex: 4;
        text-align: center;
    }
    
    #header {
        background-color: #485b6c;
        height: 70px;
        font-size: 40px;
        text-align: center;
        font-family: headFont;
        position: relative;
    }
    
    #inner_left_pannel {
        background-color: #383e48;
        flex: 1;
        min-height: 430px;
    }
    
    #inner_right_pannel {
        background-color: #f2f7f8;
        flex: 2;
        min-height: 430px;
        transition: all 2s ease;
    }
    
    #radio_contacts:checked~#inner_right_pannel {
        flex: 0;
    }
    
    #radio_settings:checked~#inner_right_pannel {
        flex: 0;
    }
    
    #radio_blocked:checked~#inner_right_pannel {
        flex: 0;
    }
    #contact{
        width: 100px;
        height: 120px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
        overflow: hidden;
    }
    #contact img{
        width:100px;
        height: 100px;
        border-radius: 50%;
    }
    .loader_on{
        position: absolute;
        width: 30%;
    }
    .loader_off{
        display:none;
    }
</style>

<body>
    <div id="wrapper">
        <div id="left_pannel">
            <div id="user_info" style="padding: 10px;">
                <img id="profile_image" src="ui/images/user_male.jpg" alt=""><br>
                 <span id="username"> Username</span> <br>
                <span id="email" style="font-size: 12 px; opacity:0.5;"> user@email.com</span>
                <br><br><br>
                <div>
                    <label id="label_chat" for="radio_chat">Chat <img src="ui/icons/chat.png" alt=""></label>
                    <label id="label_contacts" for="radio_contacts">Contact<img src="ui/icons/contacts.png" alt=""></label>
                    <label id="label_settings" for="radio_settings">Settings<img src="ui/icons/settings.png" alt=""></label>
                    <label id="label_blocked" for="radio_blocked">Blocked Users<img src="ui/icons/settings.png" alt=""></label>

                    <label id="logout" for="radio_logout">Logout<img src="ui/icons/logout1.png" alt=""></label>
                </div>

            </div>
        </div>
        <div id="right_pannel">
                <div id="header">
                <div id="loader_holder" class="loader_on"><img src="ui/icons/giphy.gif" style="width:70px;"></div>
                    My Chat
                </div>
                <div id="container" style="display:flex">
                
                    <div id="inner_left_pannel">
                   
                </div>

                <input type="radio" id="radio_chat" name="myradio" style="display:none">
                <input type="radio" id="radio_contacts" name="myradio" style="display:none">
                <input type="radio" id="radio_settings" name="myradio" style="display:none">
                <input type="radio" id="radio_blocked" name="myradio" style="display:none">
                <div id="inner_right_pannel"></div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    function _(element) {
        return document.getElementById(element);
    }
    var logout=_("logout");
    logout.addEventListener("click",logout_user);
    var label_contacts=_("label_contacts");
    label_contacts.addEventListener("click",get_contacts);
    var label_contacts=_("label_chat");
    label_chat.addEventListener("click",get_chats);
    var label_contacts=_("label_settings");
    label_settings.addEventListener("click",get_settings);

    function get_data(find,type){

            var xml=new XMLHttpRequest();
            var loader_holder=_("loader_holder");
            loader_holder.className="loader_on";
            xml.onload=function(){
                if(xml.readyState==4 || xml.status==200){
                    loader_holder.className="loader_off";
                   handle_result(xml.responseText,type); 
                }
            }
            var data={};
            data.find=find;
            data.data_type=type;
            data=JSON.stringify(data);
            xml.open("POST","api.php",true);
            xml.send(data);
    }
   function handle_result(result,type){
   
    if(result.trim()!=""){
    var obj=JSON.parse(result);
    if(typeof(obj.logged_in)!="undefined" && !obj.logged_in ){
        window.location="login.php";
    }else{
        switch(obj.data_type){
            case "user_info":
                var username=_("username");
                var email=_("email");
                username.innerHTML=obj.username;
                email.innerHTML=obj.email;
                break;
            case "contacts":
                var inner_left_pannel=_("inner_left_pannel");
                inner_left_pannel.innerHTML=obj.message;
                break;
            case "chats":
                var inner_left_pannel=_("inner_left_pannel");
                inner_left_pannel.innerHTML=obj.message;
                break;
            case "settings":
                var inner_left_pannel=_("inner_left_pannel");
                inner_left_pannel.innerHTML=obj.message;
                break;
        }
    }
    }
   }
   function logout_user(){
    var answer=confirm("Are you sure you want to log out?");
    if(answer){
        get_data({},"logout");
    }
  
   }
   get_data({},"user_info");
   function get_contacts(e){
    get_data({},"contacts");
   }
   function get_chats(e){
    get_data({},"chats");
   }
   function get_settings(e){
    get_data({},"settings");
   }
</script>