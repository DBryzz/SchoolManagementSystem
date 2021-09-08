<?php
session_start();
if(isset($_SESSION['user_id'])){
    $staff_no = $_GET['id'];
    $staff_name = $_GET['name'];

    require_once('../connectvars.php');
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Error connecting to Database');
    
    $selectQuery = "SELECT * FROM STAFF WHERE STAFF.STAFF_NO = $staff_no";
    $selectResult = mysqli_query($dbc, $selectQuery) 
        or die('SEL: Error querying database.');
    if(mysqli_num_rows($selectResult) == 1) {
    $deleteQuery = "DELETE FROM STAFF WHERE STAFF.STAFF_NO = $staff_no";
    $deleteResult = mysqli_query($dbc, $deleteQuery)
                    or die('DEL: Error querying database.');
    
    echo '<font color="green"> <em>Successfully removed '.$staff_no. '--> '.$staff_name. '</em></font></br>';
    $staff_url = "staff-menu.php";
    header( "refresh:5; $staff_url" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/Projects/SchoolManagementSystem/pages/staff/staff-menu.php">here</a>.';

    } else {
        echo '<font color="red"> <em>Multiple deletion attempt</em></font></br>';
        $staff_url = "staff-menu.php";
    header( "refresh:5; $staff_url" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/Projects/SchoolManagementSystem/pages/staff/staff-menu.php">here</a>.';
    
    }
          

   

}

?>