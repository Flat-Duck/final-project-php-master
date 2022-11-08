<?php
require("Connection.php");


function dd($value){
    echo"<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuery($sql,$data)
{
    global $conn;
    $pre=$conn->prepare($sql);
    $values=array_values($data);  //to get the values without keys 
    $types=str_repeat('s',count($values)); //get types of the value
    $pre->bind_param($types, ...$values);
    $pre->execute();
    return $pre;
}

/* SELECT All FUNCTIONS */

function selectAll($table,$condition=[]) //اختياري اي يمكن عدم تمرير قيمة له  condition الاقواس لجعل الباراميتر  
{
    global $conn; //لازم يكون معرف في الدالة لانه بيستخدمه
    $sql = "SELECT * FROM $table";
    if(empty($condition)){
        $pre = $conn->prepare($sql);
        $pre->execute();
        $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{
        $c=0;
        foreach($condition as $key => $value){
            if ($c === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql=$sql . " AND $key=?";
            }
            $c++;
        }
        $pre = executeQuery($sql,$condition);
        $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

/* SELECT All Student Info FUNCTIONS */

function selectAllStudentInfo(){ 

    global $conn; //لازم يكون معرف في الدالة لانه بيستخدمه
    $sql = "SELECT student.stu_id,user.full_name,user.u_img,student.stu_Specialization FROM student,user WHERE user.user_id=student.user_id;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}



/* SELECT ONE RECORD */
function selectOne($table,$condition) 
{
    global $conn; 
    $sql = "SELECT * FROM $table";

    $c=0;
    foreach($condition as $key => $value){
        if ($c === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql=$sql . " AND $key=?";
        }
        $c++;
    }
    
    $pre = executeQuery($sql,$condition);
    $records=$pre->get_result()->fetch_assoc();
    return $records;
}


/* $test = selectAll("user");
dd($test);
 */