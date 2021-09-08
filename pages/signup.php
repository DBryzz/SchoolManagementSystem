<?php
require_once('appvars.php');
require_once('connectvars.php');

// Clear the error message
$error_msg = "";

// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	or die('Error Connecting to Database');

if (isset($_POST['submit'])) {
  // Grab the profile data from the POST
  $fullname = mysqli_real_escape_string($dbc, trim($_POST['admin_name']));
  $username = mysqli_real_escape_string($dbc, trim($_POST['admin_username']));
  $password1 = mysqli_real_escape_string($dbc, trim($_POST['admin_password']));
  $password2 = mysqli_real_escape_string($dbc, trim($_POST['confirm_password']));

  if (!empty($fullname) && !empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
	// Make sure someone isn't already registered using this username
	$query = "SELECT * FROM ADMIN WHERE ADMIN.ADMIN_U_NAME = '$username'";
	$data = mysqli_query($dbc, $query)
		or die('SEL: Error Querying Database');
	if (mysqli_num_rows($data) == 0) {
	  // The username is unique, so insert the data into the database
	  $query = "INSERT INTO ADMIN (ADMIN_NO, ADMIN_NAME, ADMIN_U_NAME, ADMIN_PASSWD) VALUES (0, '$fullname', '$username', SHA('$password1'))";
	  mysqli_query($dbc, $query)
		or die('INS: Error Querying Database');

	  // Confirm success with the user
	  echo '<p>Your new account has been successfully created. You\'re now ready to <a href="/Projects/SchoolManagementSystem/pages/loginform.php">log in</a>.</p>';

	  mysqli_close($dbc);
	  exit();
	}
	else {
	  // An account already exists for this username, so display an error message
	  $error_msg = "An account already exists for this username. Please use a different address.";
	  $username = "";
	}
  }
  else {
	$error_msg="You must enter all of the sign-up data, including the desired password twice.";
  }
}

mysqli_close($dbc);
?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Bootstrap Simple Registration Form</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="/Projects/SchoolManagementSystem/style/signup.css"> -->
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Projects/SchoolManagementSystem/styles/signup.css">
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/font-awesome/4.7.0/font-awesome.min.css">
    <script src="/Projects/SchoolManagementSystem/jquery/jquery-3.5.1.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/jquery/popper.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.js"></script>

</head>

<body>

    <div class="signup-form">
        <?php echo '<p> <em> <font color="red">' . $error_msg . '</font><em></p>'?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group">

                <!-- <div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	 -->
                <input type="text" class="form-control" name="admin_name" placeholder="Full Names" required="required">

            </div>
            <div class="form-group">
                <input type="test" class="form-control" name="admin_username" placeholder="User Name"
                    required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="admin_password" placeholder="Password"
                    required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                    required="required">
            </div>
            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a
                        href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Become an Admnin</button>
            </div>
        </form>
        <div class="text-center">Already have an account? <a
                href="/Projects/SchoolManagementSystem/pages/loginform.php">Sign in</a></div>
    </div>
</body>

</html>