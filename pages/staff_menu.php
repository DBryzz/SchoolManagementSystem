<?php
    session_start();
    if(isset($_SESSION['user_id'])) {	
        $error_msg="";
        $session_id = $_SESSION['user_id'];
        $session_name = $_SESSION['username'];
    ?>

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."dashboard.php"); ?>


    <div class="container">




        <table class="table table-striped">

            <caption>List of Categories</caption>
            <?php
		require_once('connectvars.php');
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$query1 = "SELECT * FROM category_tbl WHERE category_tbl.user_id = $session_id";
	  
				$result = mysqli_query($dbc, $query1)
					 or die('Error Querying Database');
				$check = mysqli_num_rows($result);
				if($check<=0) {
					$error_msg1 = "Add a category";
				}
		?>
            <h3>
                <?php
				echo '<font color="red"> <em>' .$error_msg1. '</em></font>';
			?>
            </h3>
            <thead>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <tbody>

                <?php
				
				while($row=mysqli_fetch_array($result)) {
					
					echo '<tr>';
					echo '<td>'.$row['catName'].'</td>';
					echo '<td>'.$row['catDescription'].'</td>';
					echo '<td><a class="btn btn-danger" href="/Projects/SpeechDriven_WebApp/pages/delete-category.php?id=' .$row['catID']. '&name=' .$row['catName']. '&description=' .$row['catDescription']. '&owner=' .$row['user_id'].'">Delete</a></td>';
					echo '<td><a class="btn btn-primary" href="/Projects/SpeechDriven_WebApp/pages/update-category.php?id=' .$row['catID']. '&name=' .$row['catName']. '&description=' .$row['catDescription']. '&owner=' .$row['user_id'].'">Update</a></td>';
					echo '</tr>';
				}
				mysqli_close($dbc);
			?>



            </tbody>
        </table>
    </div>

    <footer class="page-footer">
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."footer.html"); ?>

    </footer>
    </section>

    <script src="/Projects/SchoolManagementSystem/js/dashboard.js"></script>


    </body>
            <?php } ?>
</html>