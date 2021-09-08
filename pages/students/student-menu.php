<?php
    session_start();
    if(isset($_SESSION['user_id'])) {	
        $error_msg="";
        $error_msg1="";
        $session_id = $_SESSION['user_id'];
        $session_name = $_SESSION['username'];
    ?>

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Projects/SchoolManagementSystem/styles/signup.css">
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/font-awesome/4.7.0/font-awesome.min.css">
    <script src="/Projects/SchoolManagementSystem/jquery/jquery-3.5.1.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/jquery/popper.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.js"></script>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."dashboard.php"); ?>


<div class="container">


<a class="btn btn-primary" href="/Projects/SpeechDriven_WebApp/pages/students/add-student.php">Add Student</a>


    <table class="table table-striped">

        <caption>LIST OF STUDENTS</caption>
        <?php
		    require_once('../connectvars.php');
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$query1 = "SELECT * FROM STUDENT ORDER BY STUDENT.STD_L_NAME";
	  
				$result = mysqli_query($dbc, $query1)
					 or die('Error Querying Database');
				$check = mysqli_num_rows($result);
				if($check<=0) {
					$error_msg1 = "No Student Found";
				}
		?>
        <h3>
            <?php
				echo '<font color="red"> <em>' .$error_msg1. '</em></font>';
			?>
        </h3>
        <thead>
            <th>Name</th>
            <th>Roll_No.</th>
            <th>DoR</th>
            <th>Class</th>
        </thead>
        <tbody>

            <?php
				
				while($row=mysqli_fetch_array($result)) {
					$student_names = $row['STD_F_NAME'].' '.$row['STD_M_NAME'].' '.$row['STD_L_NAME'];
					echo '<tr>';
					echo '<td>'.$student_names.'</td>';
                    echo '<td>'.$row['STD_ROLL_NO'].'</td>';
                    echo '<td>'.$row['STD_DOR'].'</td>';
                    echo '<td>'.$row['STD_CLASS'].'</td>';
                    echo '<td><a class="btn btn-success" href="/Projects/SchoolManagementSystem/pages/students/view-student.php?id=' .$row['STD_REG_NO']. '&name=' .$row['STD_L_NAME'].'&roll_no='.$row['STD_ROLL_NO'].'">View</a></td>';
					echo '<td><a class="btn btn-danger" href="/Projects/SchoolManagementSystem/pages/students/delete-student.php?id=' .$row['STD_REG_NO']. '&name=' .$row['STD_L_NAME'].'&roll_no='.$row['STD_ROLL_NO'].'">Delete</a></td>';
					echo '<td><a class="btn btn-info" href="/Projects/SpeechDriven_WebApp/pages/students/add-student.php?id=' .$row['STD_REG_NO']. '&name=' .$row['STD_L_NAME'].'&roll_no='.$row['STD_ROLL_NO'].'">Update</a></td>';
					echo '</tr>';
				}
				mysqli_close($dbc);
			?>

        </tbody>
    </table>
    </div>

    <!-- <footer class="page-footer">
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."footer.html"); ?>
    </footer> -->
    </section>

    <script src="/Projects/SchoolManagementSystem/js/dashboard.js"></script>


    </body>
    <?php } ?>

</html>