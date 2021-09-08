<?php
session_start();
if(isset($_SESSION['user_id'])){
    $fee_no = $_GET['id'];
    //$student_no = $_GET['name'];

    
    require_once('../connectvars.php');
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Error connecting to Database');
    
    $selectQuery = "SELECT * FROM FEE WHERE FEE.FEE_REG_NO = $fee_no";
    $selectResult = mysqli_query($dbc, $selectQuery) 
        or die('SEL: Error querying database.');
    if(mysqli_num_rows($selectResult) == 1) {
    $deleteQuery = "DELETE FROM FEE WHERE FEE.FEE_REG_NO = $fee_no";
    $deleteResult = mysqli_query($dbc, $deleteQuery)
                    or die('DEL: Error querying database.');
    
    echo '<font color="green"> <em>Successfully removed '.$fee_no. '--> '.$student_no.'</em></font></br>';
    $fee_url = "fee-menu.php";
    header( "refresh:5; $fee_url" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/Projects/SchoolManagementSystem/pages/fees/fee-menu.php">here</a>.';

    } else {
        echo '<font color="red"> <em>Multiple deletion attempt</em></font></br>';
        $fee_url = "fee-menu.php";
    header( "refresh:5; $fee_url" );
    echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/Projects/SchoolManagementSystem/pages/fees/fee-menu.php">here</a>.';
    
    }
          

   

}

?>