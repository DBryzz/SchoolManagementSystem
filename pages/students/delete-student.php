<?php
session_start();
if(isset($_SESSION['user_id'])){
    $student_no = $_GET['id'];
    $student_name = $_GET['name'];
    $student_roll_no = $_GET['roll_no'];

    echo $student_no .$student_name. $student_roll_no;
    require_once('../connectvars.php');
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Error connecting to Database');
    
    $selectQuery = "SELECT * FROM STUDENT WHERE STUDENT.STD_REG_NO = $student_no";
    $selectResult = mysqli_query($dbc, $selectQuery) 
        or die('SEL: Error querying database.');
    if(mysqli_num_rows($selectResult) == 1) {
    $deleteQuery = "DELETE FROM STUDENT WHERE STUDENT.STD_REG_NO = $student_no";
    $deleteResult = mysqli_query($dbc, $deleteQuery)
                    or die('DEL: Error querying database.');
    
    echo '<font color="green"> <em>Successfully removed '.$student_no. '--> '.$student_name. '---> '.$student_roll_no.'</em></font></br>';
    $student_url = "student-menu.php";
    header( "refresh:5; $student_url" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/Projects/SchoolManagementSystem/pages/student/student-menu.php">here</a>.';

    } else {
        echo '<font color="red"> <em>Multiple deletion attempt</em></font></br>';
        $student_url = "staff-menu.php";
    header( "refresh:5; $student_url" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/Projects/SchoolManagementSystem/pages/student/student-menu.php">here</a>.';
    
    }
          

   

}

?>