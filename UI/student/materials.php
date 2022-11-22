<?php 
/include("../../path.php"); 
include(MAIN_PATH."/controls/materials_and_Assignments.php");
$table="files";
$files=selectAll($table);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../css/materrials_Assignments.css"> -->
      <!--icon8-->
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Add Materials</title>
    
</head>
<body>
 <!--------------------navigation_bar ----------------------->  
 <?php include(MAIN_PATH."/common/navigation.php"); ?> 
 <!---------------------------------------------------------->
  <!-------------------- materials -------------------------> 

<div class="header-div">
                 
           <h1>Materials </h1>
 </div>
 <!-----------------Dynamically Create Card-----------------> 
 <main>

    
 <div class="group-cards">
            
        <?php foreach($files as $key => $file):?>
            
                <div class="group-card">
                <a href="">
                    <div class="group-card-info">
                        <h3><?php echo $file['f_name'] ?></h3>
                        <p>Group ID:<?php echo $file['title'] ?></p>
                        <p>Tr Name: <?php echo $file['description'] ?></p>
                    </div>
                </div>
                <div class="group-card-num">
                        <a onclick="return confirmDelete()" href="groups_control_panel.php?deleteID=<?php echo $file['f_name']; ?>"><i class="las la-trash-alt ticon delet" style="margin-left: 0px;padding:0px; margin-top:20px;"></i></a>
                        <a  href="Edit-Group.php"><i class="las la-trash-alt ticon delet" style="margin-left: 2px;padding:0px; margin-top:5px;"></i></a>
                       
                        </div>
                 </div>
                </a>
                </div>
            
            <?php endforeach; ?>

 </div>

</main>

 
</body>
</html>