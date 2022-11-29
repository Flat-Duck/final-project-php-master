
<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/main_group_page.php");
$user_id=$_SESSION['user_id'];

//------for get image---------
$sql="SELECT u_img FROM user Where user_id='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
      $img=$row["u_img"];
    }
}
//----------------------
//------foreach loop---------
$groupsInfo=selectGroupName();
?>
<!DOCTYPE html>
<head>
    <title>Main page </title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../css/main_page.css">
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!--icon8-->
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
<html>
<body>
       <!-- header div-->
       <div class="header-div">
              <img class="logo" src="../../sources/image/logo_light.png" alt="" style="width: 100px;">
             <h5 id="date" style="font-size:24px; padding-bottom: 10px; padding-left:14px;">  </h5>
            <form class="example"  method="POST" action="" onsubmit="return check_Enter(this)">
            <div class="full_name">
            <h1> Hello , <?php echo $username;?></h1>
            </div>
            <div class="search">
            <input type="text" placeholder=" Enter Group Code" name="search" >
            <button type="submit" name="submit">Join</button>
            </div>
               <!--  Errors -->
               <?php include("../../controls/errors.php")?>
            <!--********************-->
            </form> 
           

             <div class="photo-div">
                <a href="..\student\student-profile.php"><img class="img-user" src="<?php echo BASE_URL . '/sources/image/'.$img  ?> " style="border-radius: 100%; width: 150px; height:150px" /></a>
            </div>
        </div>
           
         <!-- ************************************************************************************* -->


<!-- cards section-->
 <!-----------------Dynamically Create Card-----------------> 
 <main>

    
 <div class="container">
            
     
  <div class="cards">
  <?php foreach($groupsInfo as $key => $Info):?>
    <div href="" class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ9rxpEwZKZ7rQBK0TXlgL8yRNXeABSaOf07X0U-DKjQ&s" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          
          <div class="card__header-text">
            <h3  class="card__title"><?php echo $Info['g_name'] ?></h3>            
          </div>
        </div>
      </div>
  </div>  
  <?php endforeach; ?>    
   </div>
 </div>
</main>



    
<!-- java script for current date -->
    <script>
        const month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
            var dt = new Date();
            let name = month[dt.getMonth()];
           /*  var date = dt.getDate()+'-'+name+'-'+dt.getFullYear(); */
            var date =name+'   '+dt.getDate()+','+dt.getFullYear();
            document.getElementById('date').innerHTML=date;
    </script>
      
</body>
</html>