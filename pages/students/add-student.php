<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS FILES/add_student_form.css">
    
    
</head>
<body>


                        <form  action="" method="POST">

                            <h3 class="text-center text-white pt-5">STUDENT ADD FORM</h3>

                                <div class="form-row">

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_f_name" name="std_f_name" >First Name:</label>
                                        <input type="text" name="std_f_ame" class="form-control" id="std_f_name" placeholder="FIRST NAME">
                                    </div>


                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_l_name" name="std_l_name" >Last Name:</label>
                                        <input type="text" name="std_l_ame" class="form-control" id="std_l_name" placeholder="LAST NAME">
                                    </div>


                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_m_name" name="std_m_name" >Middle Name:</label>
                                        <input type="text" name="std_m_ame" class="form-control" id="std_m_name" placeholder="Middle NAME">
                                    </div>

                                </div>

                                <div class="form-row">

                                
                                    <div class="form-group col-md-4">
                                        <label for="reg_no">REGISTRATION NUMBER</label>
                                        <input type="text" class="form-control" id="reg_no" placeholder="REGISTRATION NUMBER">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="reg_no">ROLLCALL NUMBER</label>
                                        <input type="number" class="form-control" id="roll_no" placeholder="ROLLCALL NUMBER">
                                    </div>

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_class" name="std_class" >STUDENT CLASS:</label>
                                        <input type="text" name="std_class" class="form-control" id="std_class" placeholder="STUDENT CLASS">
                                    </div>
                                           
                                </div>

                                

                                    
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="std_dob">STUDENT DATE OF BIRTH</label>
                                        <input type="text" class="form-control" id="std_dob" placeholder="DATE OF BIRTH">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="std_dob">STUDENT DATE OF ENROLLMENT</label>
                                        <input type="text" class="form-control" id="std_dor" placeholder="DATE OF Enrollment">
                                    </div>

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_address" name="std_address" >ADDRESS:</label>
                                        <input type="text" name="std_address" class="form-control" id="std_address" placeholder="STUDENT ADDRESS">
                                     </div>
                                           
                                </div>

                                


                                <div class="form-row">

                                    <div class="form-group col-md-4 mb-4">
                                        <label for="std_city" name="std_city" >City:</label>
                                        <input type="text" name="std_city" class="form-control" id="std_city" placeholder="STUDENT CITY">
                                     </div>

                                     <div class="form-group col-md-4 mb-4">
                                        <label for="std_state" name="std_state" >City:</label>
                                        <input type="text" name="std_state" class="form-control" id="std_state" placeholder="STUDENT STATE">
                                     </div>

                                     <div class="form-group col-md-4 mb-4">
                                        <label for="std_phonenumber" name="std_phonenumber" >PHONE NUMBER</label>
                                        <input type="text" name="std_phonenumber" class="form-control" id="std_phonenumber" placeholder="STUDENT PHONE NUMBER">
                                     </div>

                                </div>

                                


                                <h4>STUDENT GENDER</h4>
                               
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="std_gender_male" id="std_gender_male" >
                                <label class="form-check-label" for="std_gender_male">
                                Male
                                </label>
                              </div>                                                   
                                
                            
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="std_gender_female" id="std_gender_female" >
                                <label class="form-check-label" for="std_gender_female">
                                Female
                                </label>
        
                            </div>

                            <br>

                            <div class="form-group col-md-4 mb-4">
                                <label for="std_pin" name="std_pin" >PIN </label>
                                <input type="text" name="std_pin" class="form-control" id="std_pin" placeholder="STUDENT PHONE NUMBER">
                             </div>




                            




                              

                        



































                                
                             
                              <button id="button">ADD</button>

                             
                              </div>



                        </form>
                    


                       



















</body>
</html>