<?php
    session_start();
    if(isset($_SESSION['user_id'])) {	
        $error_msg="";
        $error_msg1="";
        $session_id = $_SESSION['user_id'];
        $session_name = $_SESSION['username'];
       
            if(isset($_POST['add_item'])) {
                
                require_once('connectvars.php');
                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
                // Grab the user-entered log-in data
                $catName = mysqli_real_escape_string($dbc, trim($_POST['catName']));
                $catDescription = mysqli_real_escape_string($dbc, trim($_POST['catDescription']));
          
                if (!empty($catName) && !empty($catDescription)) {
                    $query = "INSERT INTO STAFF (EMP_NO, EMP_NAME, 	EMP_ADDRESS, EMP_CITY, EMP_PIN, EMP_STATE, EMP_PHONE, EMP_MOBILE, EMP_EMAIL, EMP_GENDER, EMP_M_STATUS, EMP_DOB, EMP_DOJ, EMP_DEPT, EMP_NATURE_OF_JOB_VARCHAR, EMP_BASIC_PAY_NUMBER	) VALUES 
                    (0, '$emp_name', '$emp_address', '$emp_city','$std_pin', '$emp_state', '$emp_phone','$emp_email','$emp_dob','$emp_basic_pay_number','$emp_doj','$emp_department','$emp_nature','$emp_gender')";
              
               $data = mysqli_query($dbc, $query)
                    or die('Error Querying Database');
                
                $confirm_msg = 'Successfully added '. $catName;
                
                mysqli_close($dbc);
                
                }
                  else {
                    // The username/password are incorrect so set an error message
                    $error_msg = 'Sorry, All fields must be filled.';
                  }
                }
                
            
        ?>
    ?>

?>




<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="/Projects/SchoolManagementSystem/styles/signup.css">
    <link rel="stylesheet" type="text/css" href="/Projects/SchoolManagementSystem/styles/add-form.css">
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/font-awesome/4.7.0/font-awesome.min.css">
    <script src="/Projects/SchoolManagementSystem/jquery/jquery-3.5.1.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/jquery/popper.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.js"></script>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/Projects/SchoolManagementSystem/common/"; include($IPATH."dashboard.php"); ?>


    
    
</head>
<body>


                        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                            <h3 class="text-center text-white pt-5">STAFF ADD FORM</h3>

                                <div class="form-row">

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_name" name="emp_name" >Employee Name:</label>
                                        <input type="text" name="emp_name" class="form-control" id="emp_name" placeholder="Employee Name">
                                    </div>

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_address" name="emp_address" >ADDRESS:</label>
                                        <input type="text" name="emp_address" class="form-control" id="emp_address" placeholder="STAFF ADDRESS">
                                     </div>


                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_city" name="emp_city" >City:</label>
                                        <input type="text" name="emp_city" class="form-control" id="emp_city" placeholder="STAFF CITY">
                                     </div>
                                        
                                </div>


                             <div class="form-row">

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_pin" name="std_pin" >PIN </label>
                                        <input type="text" name="std_pin" class="form-control" id="std_pin" placeholder="STUDENT PHONE NUMBER">
                                    </div>

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_state" name="emp_state" >STATE:</label>
                                        <input type="text" name="emp_state" class="form-control" id="emp_state" placeholder="STAFF STATE">
                                    </div>

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_phone" name="emp_phone" >PHONE NUMBER</label>
                                        <input type="text" name="emp_phone" class="form-control" id="emp_phone" placeholder="STAFF PHONE NUMBER">
                                     </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_email" name="emp_email" >Employee Email:</label>
                                        <input type="text" name="emp_email" class="form-control" id="emp_email" placeholder="STAFF Email">
                                    </div>

                            
                                    <div class="form-group col-md-4">
                                        <label for="emp_dob">EMPLOYEE DATE OF BIRTH</label>
                                        <input type="text" class="form-control" id="emp_dob" name="emp_dob" placeholder="STAFF OF BIRTH">
                                    </div>

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_basic_pay_number" name="emp_basic_pay_number" >PAY NUMBER</label>
                                        <input type="text" name="emp_basic_pay_number" class="form-control" id="emp_basic_pay_number" placeholder="STAFF BASIC PAY NUMBER">
                                     </div>


                                </div>

                        
                               
                                    
                                <div class="form-row">
                                    <!-- <div class="form-group col-md-4">
                                        <label for="emp_doj">EMPLOYEE DATE OF JOB ACQUISITION</label>
                                        <input type="text" class="form-control" name="emp_doj" id="emp_doj" placeholder="DATE OF JOB ACQUISITION">
                                    </div> -->


                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_department" name="emp_department" >STAFF DEPARTMENT</label>
                                        <input type="text" name="emp_department" class="form-control" id="emp_department" placeholder="STAFF DEPARTMENT">
                                     </div>

                                    
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="emp_nature">NATURE OF JOB</label>
                                        <input type="text" class="form-control" name="emp_nature" id="emp_doj" placeholder="TEACHING or NON-TEACHING">
                                    </div>


                                    <div class="form-group col-md-4 mb-4">
                                        <label for="emp_department" name="emp_department" >STAFF GENDER</label>
                                        <input type="text" class="form-control" name="emp_gender" id="emp_department" placeholder="M or F">
                                     </div>

                                    
                                </div>


                                <!-- <h4>NATURE OF JOB</h4>
                               
                                <div class="form-check">
    
                                    <input class="form-check-input" type="radio" name="emp_nature">
                                    <label class="form-check-label" for="emp_teaching">
                                    TEACHING 
                                    </label>
                                  </div>                                                   
                                    
                                
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="emp_nature" >
                                    <label class="form-check-label" for="emp_non_teaching">
                                  NON-TEACHING
                                    </label>
            
                                </div> -->

                                

                                


                        

                                <!-- <h4>STAFF GENDER</h4>
                               
                            <div >

                                <input  type="radio" name="emp_gender" value="M">
                                <label  for="emp_gender_male">
                                Male
                                </label>
                              </div>                                                   
                                
                            
                              <div >
                                <input type="radio" name="emp_gender" value="F">
                                <label for="emp_gender_female">
                                Female
                                </label>
        
                            </div> -->


                            <!-- <div>
                                <input type="radio" id="huey" name="drone" value="huey"
                                        checked>
                                <label for="huey">Huey</label>
                                </div>

                                <div>
                                <input type="radio" id="dewey" name="drone" value="dewey">
                                <label for="dewey">Dewey</label>
                            </div> -->

                            <br>
                                
                             
                              <button class="btn btn-success" id="button">ADD</button>

                             
                              </div>



                        </form>
                    


                       
















<?php } ?>


</body>
</html>