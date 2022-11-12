
<?php
include("../../Database/db.php");
?>
<!DOCTYPE html>
<head>
    <title>student-profile</title>
    <meta name="descreption " content=" " />
    <script src="https://kit.fontawesome.com/e1ca29be31.js" crossorigin="anonymous"></script>
    </head>

    <!--  style for profile student -->
<style>
body{
    background-color: #A4D2F0;
    display: flex;
    flex-direction: row;
    justify-content: center;
}

div{
    width: 40%;
    height: 500px;

}
.div-photo{
    background-color: #222242;
    border-radius: 10px 0px 0px 10px;
    box-shadow: -3px 3px 10px rgb(0 0 0 / 0.2);
    z-index: 1;
    margin-left: 5%;
    margin-top: 5%;
    text-align: center;
    color: white;
    position: relative;

}
.div-data{
    background-color: white;
    border-radius: 0px 15px 15px 0px;
    box-shadow: 3px 3px 10px rgb(0 0 0 / 0.2);
    margin-right: 5%;
    margin-top: 5%;
    z-index: 0;
    position: relative;
    text-align: center;
    

}
.photo{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%);

}
.lable-edit-phto{
position: absolute;
top: 70%;
left: 52%;
transform: translate(-80% ,-52%);
margin-left: 4%;
}

#img1{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 21%;

}
#img2{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 30%;
}
#img3{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 40%;
}
#img4{
    width: 7%;
    height: 7%;
    position: absolute;
    left: 35%;
    top: 50%;
}

.l1{

    position: absolute;
    left: 45%;
    top: 20%;
}
.l2{

position: absolute;
left: 45%;
top: 30%;
}
.l3{

position: absolute;
left: 45%;
top: 40%;
}
.l4{

position: absolute;
left: 45%;
top: 50%;
}
.l1,.l2,.l3,.l4{
    font-size: 22px;
}

.bt1{

position: absolute;
left: 25%;
top: 70%;
width: 20%;
border: none;
background-color: #222242;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;

}
.bt1:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 
    color: #222242;
    background-color: white;
    font-weight: bolder;
    border: 2px solid #222242;
    cursor: pointer;

}
.bt2{

position: absolute;
left: 55%;
top: 70%;
width: 20%;
border: none;
background-color: #e72121;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;

}
.bt2:hover{
    box-shadow: 4px 4px 4px rgb(135, 134, 134); 
    color: red;
    background-color: white;
    font-weight: bolder;
    border: 2px solid red;
    cursor: pointer;

}
label{
    font-size: 25px;
}
@media(max-width:740px)
{


    label{
    font-size: 18px;
}

.bt1{

position: absolute;
left: 35%;
top: 70%;
width: 30%;
border: none;
background-color: #222242;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;

}

.bt2{

position: absolute;
left: 35%;
top: 80%;
width: 30%;
border: none;
background-color: #e72121;
height: 35px;
color: white;
border-radius: 25px;
text-align: center;
}
}
@media(max-width:700px)
{
  label{
    font-size: 18px;
}
.div-data{
    width: 70%;
}
.div-photo{
    width: 30%;
}
.photo{
    width: 62%;
    height: 18vh;
}
.lable-edit-phto{
    margin-left: 11%;
}
}





</style>
    <html>
        <body>
            <div class="div-photo">
                <img class="photo" src="../../sources/image/user-weman.png" /><br>
                <label class="lable-edit-phto">Edit Photo</label>
            </div>
            <div class="div-data">
                
                <form method="get" action="edit profile.php">
                <i id="img3"  class="fa-regular fa-user"></i>
                <i id="img4" class="fa-solid fa-lock"></i>



             <?php

                        global $conn;

                        $sqln="SELECT  `full_name`, `password`, `admin` FROM `user` WHERE user.admin=1;";

                        $result= mysqli_query($conn,$sqln);
                        $row =mysqli_fetch_row($result);
                        $name=$row[0];
                        $pass=$row[1];


                        echo " <lable class='l3'>" .$name ."</lable>"  ."<lable class='l4'>".$pass."</lable>" ;

                                        
             ?>
                <a href="edit admin.php?&name=<?php echo $name ?>&password=<?php echo $pass?>" >
                <input name="bts" class="bt1"  type="button" value="Edit"/></a>
                <input class="bt2" name="edit" type="button" value="Logout"/>
                </form>


            </div>
        </body>
    </html>