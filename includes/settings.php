<?php
sleep(1);
$sql = "select * from users where userid=:userid limit 1";
$id=$_SESSION['userid'];
$data= $DB->read($sql,['userid'=>$id]);
$mydata = "";
if(is_array($data)){
        $data = $data[0];

        //Check if image exsits
        $image =($data->gender=="Male")? 'ui/images/user_male.jpg':'ui/images/user_female.jpg';
        if(file_exists($data->image)){
          $image = $data->image;
        }
    $gender_male = "";
    $gender_female = "";
    if($data->gender=="Male"){
        $gender_male = "checked";
    }else{
        $gender_female = "checked";
    }
        $mydata = 
        '<style type="text/css">
            form {
            text-align:left;
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
                width: 200px;
                border: solid 1px grey;
                border-radius: 5px;
            }
            
            input[type=button] {
                width: 225px;
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
                <div id="error" style="">error</div>
                <div style="display:flex;">
                <div>
                <img src="'.$image.'" 
                style="width:200px;height:200px;margin:10px;">
                <label for="change_image_input" id="change_image_button" style="background-color:#9b9a80;display:inline-block;padding:10px;border-radius:5px;cursor:pointer;">
                Change Image
                </label>
                <input type="file" id="change_image_input" style="display:none;" onchange="upload_profile_image(this.files)">
                </div>
                <form id="myForm" action="">
                    <input type="text" name="username" placeholder="Enter Username" value="'.$data->username.'"><br>
                    <input type="text" name="email" placeholder="Enter Email" value="'.$data->email.'"><br>

                    <div style="padding:10px">
                        <br>Gender: <br>
                        <input type="radio" value="Male" name="gender" id="" '.$gender_male.'>Male <br>
                        <input type="radio" value="Female" name="gender" id="" '.$gender_female.'>Female <br>
                    </div>

                    <input type="password" name="password" placeholder="Enter new password" value="'.$data->password.'"><br>
                    <input type="password" name="password2" placeholder="Retype password" value="'.$data->password.'"><br>
                    <input type="button" value="Save Settings" id="save_settings_button" onclick="collect_data(event)">
                </form>
                </div>
        ';
}
    $info->message = $mydata;
    $info->data_type = "contacts";
    echo json_encode($info);
  die;
   $info->message = "No contacts were found";
   $info->data_type = "error";
   echo json_encode($info);
 ?>
