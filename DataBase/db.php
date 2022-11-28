<?php

session_start();//يمكن تعريف الجلسات على انها طريقة لتخزين المعلومات في متغييرات  ونقلها  بين صفحات موقعك المختلفة لتكون متاحة للاستخدام

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

/* SELECT All Student Info FUNCTIONS */
function selectAllStudentInfo(){ 

    global $conn;
    $sql = "SELECT student.stu_id,user.user_id,user.full_name,user.u_img,student.stu_specialization FROM student,user WHERE user.user_id=student.user_id;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

/* SELECT All Teachers Info with Group name FUNCTIONS */
function selectAllTeacherInfo(){ 

    global $conn; 
    $sql = "SELECT teacher.tr_id,user.user_id,user.full_name,user.u_img,teacher.tr_phone_no,groups.g_name from teacher,user,groups WHERE user.user_id=teacher.user_id AND teacher.tr_id=groups.tr_id;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

/* SELECT All techera  FUNCTIONS */
function selectAllteacher(){ 

    global $conn;
    $sql = "Select teacher.tr_id,user.user_id,user.full_name,user.u_img,teacher.tr_phone_no from teacher,user WHERE user.user_id=teacher.user_id;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

/* SELECT Groups Info FUNCTIONS */
function selectAllGroupInfo(){ 

    global $conn; 
    $sql = "SELECT *,teacher.user_id,user.full_name FROM groups,user,teacher WHERE groups.tr_id=teacher.tr_id AND teacher.user_id=user.user_id;";
    global $conn;
    $pre=$conn->prepare($sql);
    $pre->execute();
    $records=$pre->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

/* Insert to Group FUNCTIONS */
 function insertData($table ,$data)
{
    global $conn;
    $sql="INSERT INTO $table SET ";
    
    $c=0;
    foreach($data as $key => $value){
        if ($c === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql=$sql . ", $key=?";
        }
        $c++;
    }

    $pre=executeQuery($sql,$data);
    $id=$pre->insert_id;
    return $id;
}

/* DELETE Admin FUNCTION */
function deleteAdmin($table, $id)
{
    global $conn;
    $sql="DELETE FROM $table WHERE user_id=?";
    $st=executeQuery($sql,['user_id'=>$id]);//وضع في مصفوفة لانه عنصر داخل مصفوفة
    return $st->affected_rows; //اذا تحقق الحذف يجب ان يرجع قيمة اكبر من 0
}
 

/* DELETE Student FUNCTION */
 function deleteStudent($id)
{
    global $conn;
    $sql1="DELETE FROM student WHERE user_id=?";
    $st=executeQuery($sql1,['user_id'=>$id]);
    $sql2="DELETE FROM user WHERE user_id=?";
    $st=executeQuery($sql2,['user_id'=>$id]);
    return $st->affected_rows;
} 

/* DELETE Group FUNCTION */
function deleteGroup($id)
{
    global $conn;
    $sql="DELETE FROM groups WHERE g_no=?";
    $st=executeQuery($sql,['g_no'=>$id]);//وضع في مصفوفة لانه عنصر داخل مصفوفة
    return $st->affected_rows; //اذا تحقق الحذف يجب ان يرجع قيمة اكبر من 0
}


/*  function insertGroup(){
    $sql="INSERT INTO `groups`(`g_no`, `tr_id`, `g_name`, `g_img`) VALUES (?,?,?,?);";
 } */










 


 /**  -------------------------------  -------------------------------------------------------      ------------------ -------------------     */
