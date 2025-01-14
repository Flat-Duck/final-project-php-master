
<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/main_group_page.php");
$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];

//------for get image---------
$sql="SELECT u_img FROM user Where user_id='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $img=$row["u_img"];
    }
}
//----------------------
?>

<!DOCTYPE html>
<head>
    <title>Main page </title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../css/main_page_.css">
    <link rel="stylesheet" href="../../css/inside_groups.css">

    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <style>
        * {
      list-style-type: none;
      }
          
     
    </style>
         
    </head>
   
   
<html>
<body>
   <!------------Navigation Bar ----------->  
<nav class="navbar">
      <ul class="lift-side">
          <!-------back------>
          <li><div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li>
          <!----------------->

          <!-------logo------>
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          <!----------------->

      </ul>
      <div class="navbar-links">
        <ul>
          
          <!------HOME------>
          <li><a href="<?php echo BASE_URL . '/UI/group/main page for group.php' ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
          <!---------------->

          <!--Notification-->
          <li><a href="#" class="notification" style="font-size: 1.5rem;"><i class="las la-bell"></i><span class="badge">3</span></a></li>
          <!---------------->

          <!------Logout----->
          <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
          <!----------------->
        </ul>
      </div>
    </nav>
    <!------------------------------------>
       <!-- header div-->
       <div class="header-div">
              <img class="logo" src="../../sources/image/logo_light.png" alt="" style="width: 100px;">
             <h5 id="date" style="font-size:24px; padding-bottom: 10px; padding-left:14px;">  </h5>
            <form class="example"  method="POST" action="" onsubmit="return check_Enter(this)">
            <div class="full_name">
            <h1> Hello , <?php echo $full_name;?></h1>
            </div>

            <!--------------join------------------>
           <?php if($role==""):?>
            
            <div class="search">
            <input type="text" placeholder=" Enter Group Code" id="search" name="search" onkeypress="return onlyNumberKey(event)" >
            <button type="submit" name="submit">Join</button>
            </div>
            <?php search()?> 
            <?php endif;?>

               <!--  Errors -->
               <?php include("../../controls/errors.php")?>
            <!--********************-->
            </form> 
            <!-------------------------------------->
           

             <div class="photo-div">
                <a href="..\student\student-profile.php"><img class="img-user" src="<?php echo BASE_URL . '/sources/image/'.$img  ?> " style="border-radius: 100%; width: 150px; height:150px" /></a>
            </div>
            <!-- ************************************************************************************* -->
            <!-- ****************image section for teacher************************* -->
            <?php if($role=="teacher"):?>
                 <div class="photo-div">
                <a href="..\teacher\profile teacher.php"><img class="img-user" src="<?php echo BASE_URL . '/sources/image/'.$img  ?> " style="border-radius: 100%; width: 150px; height:150px" /></a>
            </div>
            <?php endif;?>
        </div>

        <h1  style=" padding:3% 18% 0% 18%;"> Groups </h1>

                <!-- For Succes -->
                <?php if (isset($_SESSION['message'])): ?>
            <div class="msg success" style="color: #5a9d48; margin-bottom: 20px; padding:3% 18% 0% 18%;">
                <li><i class="las la-check-circle" style="color: #5a9d48 ;font-weight: 600; font-size: 20px; "></i>&nbsp;&nbsp;<?php echo $_SESSION['message']; ?></li>
                <?php
                /* لالغاء الرسالة عند عمل اعادة تحميل للصفحة */
                unset($_SESSION['message']);
                ?>
            </div>
          <?php endif; ?>
        <!----------------->
           
         <!-- ************************************************************************************* -->


 <!-- cards section-->
 <!-----------------Dynamically Create Card------------------------------->
 <!-------------------for student  section--------------------------------> 
 <?php if($role==""):?>
  <!------foreach loop--------->
  <?php $groupsInfo=selectGroupName();?>
 <main>  
 <div class="container">
  <div class="cards">
  <?php foreach($groupsInfo as $key => $Info):?>
    <div href="" class="card">
      <img src="../../sources/image/background.png" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          
          <div class="card__header-text">
            <a href="inside_group.php?data=<?= $Info['g_name']?>&number=<?= $Info['g_no']?>"  style=" color:#000;
          text-decoration:none;"><h3 class="card__title"><?php echo $Info['g_name'] ?></h3> </a>        
          </div>
        </div>
      </div>
  </div>  
  <?php endforeach; ?>    
   </div>
 </div>
</main>
<?php endif;?>
<!-------------------------------------------------------------------->
<!-------------------for Teacher  section----------------------------->
<?php if($role=="teacher"):?>
  <?php $groupsInfoForTeacher=selectGroupNameForTeacher()?>
  <main>
<div class="container">      
 <div class="cards">
 <?php foreach($groupsInfoForTeacher as $key => $Info):?>
   <div href="" class="card">
     <img src="../../sources/image/background.png" class="card__image" alt="" />
     <div class="card__overlay">
       <div class="card__header">
         <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
         
         <div class="card__header-text">
         <?php $_SESSION['g_no']=$Info['g_no']?>
           <a href="inside_group.php?data=<?= $Info['g_name']?>&number=<?= $Info['g_no']?>"  style=" color:#000; text-decoration:none;"><h3 class="card__title"><?php echo $Info['g_name'] ?></h3> </a>        
         </div>
       </div>
     </div>
 </div>  
 <?php endforeach; ?>    
  </div>
</div>
</main>
<?php endif;?>
<!-------------------------------------------------------------------->


    
<!-- java script for current date -->
    <script>
        const month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
            var dt = new Date();
            let name = month[dt.getMonth()];
           /*  var date = dt.getDate()+'-'+name+'-'+dt.getFullYear(); */
            var date =name+'   '+dt.getDate()+','+dt.getFullYear();
            document.getElementById('date').innerHTML=date;

            function check_Enter() {
  const search = document.getElementById("search").value;
  
  if(search==""){
  alert(" you should Enter Group Code");
  return false
  }}

  /* when do not enter number */
  function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
            alert(" pleas enter Just Number");
            return false;
        }
        return true;
    }

    </script>
      
</body>
</html>