<?php 
include("../../Database/Connection.php");  
include("../../controls/edit-studentC.php");
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--using th same login and signup css page with addtional-->
    <link rel="stylesheet" href="../../CSS/login_and_singup.css"/>
    <link rel="stylesheet" href="../../CSS/editing.css"/>
    <!--icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Edit Profile</title>
   <html>
</head>

<style> 
    /* for show password */
    .form-field-signup.pass input::placeholder{
        font-size: 17px;
    }
    .form-field-signup.pass span{
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
        color: #222242;
        cursor: pointer;
        display: none;
    }
    .form-field-signup.pass input:valid ~ span{
        display: block;
    }
    .form-field-signup.pass span i.hide-btn::before{
        content: "\f070";
    }
</style>

<body >

  <div class="login-container">
      <p class="signup_text"><b>Edit Student</p>
    <form class="login-form"  method="POST" name="signup_form" enctype="multipart/form-data"  onsubmit="return check_Enter(this)">

  <!-- For circular image -->
  <div class="profile-pic-div"  >
    <?php echo"  <img src='../../sources/image/$img1' id='photo' height='120' width='120' > ' "?>
    <input type="file" id="file" name="u_img">
    <label for="file" id="uploadBtn">Choose Photo</label>
  </div>
        <!-- inputs  --> 
        <div class="form-field-signup">
        <input id="id" name="id" type="text"  placeholder="ID"  value="<?php  echo $id  ?>"  maxlength="8"/>
        </div>
        <div class="form-field-signup">
            <input id="name" name="name" type="text"  placeholder="Full Name"  value="<?php  echo $name  ?>" maxlength="30" />
        </div>
          
        <div class="form-field-signup pass">
        <input id="pass" type="password"  name="pass" placeholder="password"   maxlength="25" value="<?php  echo $pass  ?>" />
        <span class="show-btn"><i id="show-btn" class="fas fa-eye"></i></span>  
       </div>

          <div class="form-field-signup pass">
            <input id="conf_pass" type="password" name="cof-pass" placeholder="Confirm Password"  value="<?php  echo $pass  ?>" maxlength="25" />
            <span class="show-btn_conf"><i id="show-btn_conf" class="fas fa-eye conf_pass"></i></span>   
         </div>
         <div class="form-field-signup">
          <input id="spe" type="text" name="spe" placeholder="Specialization" value="<?php  echo $spe  ?>"maxlength="25"/>  
         </div>

         <div class="error" style="color: red; margin-left:30px;" > 
                   <?php echo $error ?>
                </div> 


                  <!-- For Errors -->
            <?php if(count($errors)> 0): ?>
                    <div class="msg error" style="color: #D92A2A; margin-bottom: 20px;"> 
                     <?php foreach($errors as $error): ?>
                        <li><i class="las la-exclamation-circle" style="color: #D92A2A;font-weight: 600; font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;<?php echo($error); ?></li>
                     <?php endforeach; ?>
                    </div> 
            <?php endif; ?> 
            <!----------------->
            
        <button type="submit" name="bts" onclick=""> Save</button>
    </form>
    </div>



<!-- check enter -->

  <!--   ********************************************* circular image *********************************    -->
  <script>
                 const imgDiv = document.querySelector('.profile-pic-div');
    const img = document.querySelector('#photo');
    const file = document.querySelector('#file');
    const uploadBtn = document.querySelector('#uploadBtn');

    //if user hover on img div 

    imgDiv.addEventListener('mouseenter', function(){
        uploadBtn.style.display = "block";
    });

    //if we hover out from img div

    imgDiv.addEventListener('mouseleave', function(){
        uploadBtn.style.display = "none";
    });

    //lets work for image showing functionality when we choose an image to upload

    //when we choose a foto to upload

    file.addEventListener('change', function(){
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader(); //FileReader is a predefined function of JS

            reader.addEventListener('load', function(){
                img.setAttribute('src', reader.result);
            });

            reader.readAsDataURL(choosedFile);
        }
    });

/*************************check fields****************************/
    function check_Enter() {
    const userID = document.getElementById("id").value;
    const full_name = document.getElementById("name").value;
    const spe = document.getElementById("spe").value;
    const pass = document.getElementById("pass").value;
    const conf_pass = document.getElementById("cof-pass").value;
    
    if(userID==""){
        alert(" Please enter UserID");
        return false;
    }
    if(full_name==""){
        alert(" Please enter Full name");
        return false;
    }
    const regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    if(!regName.test(full_name)){
        alert('the name is incorrect, Please rewrite your full name (first and last name).');
        return false;
    }
    if(pass==""){
        alert(" Please enter Password");
        return false;
    }
    if(conf_pass==""){
        alert(" Please enter Password again");
        return false;
    }
    if(conf_pass!=pass){
        alert(" the password is not equal ");
        return false;
    }
    }
/*****************************for show password********************************/
const passField = document.getElementById("pass");
    const showBtn = document.getElementById("show-btn");
    showBtn.onclick = (()=>{
    if(passField.type === "password"){
        passField.type = "text";
        showBtn.classList.add("hide-btn");
    }else{
        passField.type = "password";
        showBtn.classList.remove("hide-btn");
    }
    });
/***************************for show confirm password*************************/
    const confPassField = document.getElementById("conf_pass");
    const showBtn_conf = document.getElementById("show-btn_conf");
    showBtn_conf.onclick = (()=>{
        if(confPassField.type === "password"){
        confPassField.type = "text";
        showBtn_conf.classList.add("hide-btn");
        }else{
        confPassField.type = "password";
        showBtn_conf.classList.remove("hide-btn");
        }
    });
</script>


</body>
</html>
</head>