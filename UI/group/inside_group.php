<?php 
include("../../path.php"); 
include(MAIN_PATH."/controls/inside_group.php");
/////////////////////
$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
$groupNumber=$_SESSION['g_no'];
////////////////////

//to get group name
$sql="SELECT g_name FROM groups Where g_no='$groupNumber';";
$result_g_name = $conn->query($sql);
if ($result_g_name->num_rows == 1) {
    while($row = $result_g_name->fetch_assoc()) {
      $g_name=$row["g_name"];
    }
}
///////////////////////////

?>

<!DOCTYPE html>
<head>
    <title>Group</title>
    <meta name="descreption " content=" " />
    <link rel="stylesheet" href="../../css/inside_groups.css">
    <!--icon8-->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<!-- to add a library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <style>
     
        .header-div{background-color: #fff;}

        .dropdown{
            display:inline-block;
            position:relative;
        }
        .dropdown div{
            background-color:#fff;
            box-shadow:0 4px 8px rgba(0,0,0,0.2);
            z-index:1;
            visibility:hidden;
            position:absolute;
            min-width:100%;
            opacity:0;
            transition:.3s;
        }
        .dropdown:hover div{
            visibility:visible;
            opacity:1;
        }
        .dropdown div a{
            display:block;
            text-decoration:none;
            padding:8px;
            color:#000;
            transition:.1s;
            white-space:nowrap;
            margin-left:0px;
        }
        .dropdown div a:hover{
            background-color:#222242;
            color:#fff;
        }

    </style>

    </head>    
<html>
<body>
<!------------Navigation Bar ----------->  
<!-- <nav class="navbar">
      <ul class="lift-side">
          -------back------
          <li><div class="back"><a href="../group/main page for group.php"><i class="las la-arrow-left"></i></a></div></li>
          -----------------

          -------logo------
          <li><div class="brand-title"><img src="../../sources/image/logo_dark.png" style="width: 100px;" /></div></li>
          -----------------

      </ul>
      <div class="navbar-links">
        <ul>
          ----group name---
          <li><a href="../group/inside_group.php?data= /* $g_name */?>&number= /* $groupNumber */?>" style="padding-top:.5rem;"> /* echo $g_name  */?></a></li>
          -----------------

          -----students---
           /* if ($_SESSION['role']=="teacher"): */?> 
          <li><a href=" /* echo BASE_URL . '/UI/teacher/testreqest.php'  */?>"  style="font-size: 1.5rem;"><i class="las la-user-friends"></i></a></li>
          /*  endif; */ ?>  
          -----------------

          ------HOME------
          <li><a href=" /* echo BASE_URL . '/UI/group/main page for group.php' */ ?>" style="font-size: 1.5rem;"><i class="las la-home"></i></a></li>
          ----------------

          --Notification--
          <li><a href="#" class="notification" style="font-size: 1.5rem;"><i class="las la-bell"></i><span class="badge">3</span></a></li>
          ----------------

          ------Logout-----
          <li><a href="..\..\logout.php" style="color:#FFBA5F;font-size: 1.5rem;"><i class="las la-sign-out-alt"></i></a></li>
          -----------------
        </ul>
      </div>
    </nav> -->


    <!----------------side bar------------------->
    <input type="checkbox" name="" id="menu-toggle">

    <div class="overlay">
        <label for="menu-toggle">
            <span class="las la-cance"></span>
        </label>
    </div>

    <div class="sidebar">

        <div class="sidebar-container">

            <div class="brand">
                <h2>
                    <img src="../../sources/image/logo_dark.png" alt="" style="width: 100px;">
                </h2>
            </div>

            <!--menu profile photo -->
            <div class="sidebar-avartar" style="margin-top:20px">
                <div>
                    <a href="" alt=" " style="width: 70px; height:70px ;"></a>
                </div>

                <div class="avartar-info">
                    <div class="avartar-text">
                        <h4><?php echo $username;?></h4>
                        <p>Id : <?php echo $user_id;?> </p>
                    </div>
                </div>
            </div>

            <!-- menu items -->
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="<?php echo BASE_URL . '/UI/control_panel/groups_control_panel.php' ?>">
                            <span class="las la-user-friends"></span>
                            <span>Groups</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . '/UI/control_panel/teacher_control_panel.php' ?>">
                            <span class="las la-user-tie"></span>
                            <span>Teachers</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . '/UI/control_panel/student_control_panel.php' ?>">
                            <span class="las la-user-alt"></span>
                            <span>Students</span>
                        </a>
                    </li>                
                    <li>
                    <a href="..\..\logout.php">
                            <span class="las la-sign-out-alt" style="color:#FFBA5F;"></span>
                            <span style="color:#FFBA5F;">LogOut</span>
                        </a>

                </ul>
            </div>
            <!--menu admen -->
            <div class="sidebar-card">
                <img src="../../sources/image/admin_image_3d.png">  
            </div>
            <div class="sidebar-card-btn">
                <a href="<?php echo BASE_URL . '/UI/control_panel/admin_control_panel.php' ?>">
                    <button  class="btn btn-admin">Admin</button>
                </a>
            </div>

        </div>

    </div>
    <!----------------End side bar------------------->

    <!------------------------------------>
    <div class="main-content">
       <!-- header div-->
       <div class="header-div">
			 
            <h1><?php echo $data ?></h1>
			<div class="group_info">
             <h3>Teacher Name: <?php echo  $teacher_name ?></h3>
			 <h3>Group Code:    <?php echo $group_no ?></h3>
			</div>
            
            <!-------------------- (+) button------------------------------->
            <?php if($role==""):?>
            <a href="../student/add asignment.php?g_no=<?= $group_no?>">
                <button class="btn-create">+</button>
            </a>
            <?php endif;?>
            
            <?php if($role=="teacher"):?>
                <div class="dropdown">
                    <button class="btn-create">+</button>
                    <div>
                        <a href="../teacher/add.php?g_no=<?= $group_no?>">Material</a>
                        <a href="../teacher/add announcement.php?g_no=<?= $group_no?>">Announcement</a>
                         <a href="../teacher/add_announcement_assignment.php?g_no=<?= $group_no?>">Assignment</a>
                    </div>
                </div>
            <?php endif;?>    
            <!------------------------------------------------------------->
        </div>
     
         <!-- ************************************************************************************* -->
		 <main>
		 <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
       <div class="carousel">

	   <a href="<?php echo BASE_URL . '/UI/student/materials.php' ?>">
		<img id="img1" onmouseover="setNewImage1(this)" onmouseout="setOldImage()" src="../../sources/image/m1Dark.png" alt="img" draggable="false">
        </a>
    	<a href="<?php echo BASE_URL . '/UI/student/assignment.php' ?>">
		<img id="img2" onmouseover="setNewImage2(this)" onmouseout="setOldImage()" src="../../sources/image/A2Dark.png" alt="img" draggable="false">
        </a>
		<a href="<?php echo BASE_URL . '/UI/student/add asignment.php' ?>">
		<img id="img3" onmouseover="setNewImage3(this)" onmouseout="setOldImage()" src="../../sources/image/N3Dark.png" alt="img" draggable="false">
        </a>
		<a href="<?php echo BASE_URL . '/UI/student/add asignment.php' ?>">
		<img id="img4" onmouseover="setNewImage4(this)" onmouseout="setOldImage()" src="../../sources/image/E4Dark.png" alt="img" draggable="false">
        </a>
             
      </div>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    <main>    
        


</div>


<!-- java script for current date -->
<!---js section for image slider--->
    <script>
     const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");
let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;
const showHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
}
arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the carousel scroll left else add to it
        carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});
const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if(carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) > -1 || carousel.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;
    if(carousel.scrollLeft > prevScrollLeft) { // if user is scrolling to the right
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
    }
    // if user is scrolling to the left
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
}
const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}
const dragging = (e) => {
    // scrolling images/carousel to left according to mouse pointer
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}
const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
}
carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);
document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);
 //-------------------------------------------------------------------------------
 function setNewImage1(){  document.getElementById("img1").src="../../sources/image/M1light.png";} 
 function setNewImage2(){document.getElementById("img2").src="../../sources/image/A2light.png";}
 function setNewImage3(){document.getElementById("img3").src="../../sources/image/N3light.png";}
 function setNewImage4(){document.getElementById("img4").src="../../sources/image/E4light.png";}

 function setOldImage(){
    document.getElementById("img1").src="../../sources/image/m1Dark.png";
    document.getElementById("img2").src="../../sources/image/A2Dark.png";
    document.getElementById("img3").src="../../sources/image/N3Dark.png";
    document.getElementById("img4").src="../../sources/image/E4Dark.png";
 }
    </script>
      
</body>
</html>