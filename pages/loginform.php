<?php
  require_once('connectvars.php');

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['login_btn'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Error Connecting to Database');

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['userName']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
     //   $query = "SELECT user_id, userName FROM user_tbl WHERE userName = '$user_username' AND password = SHA('$user_password')";
	   $query = "SELECT ADMIN_NO, ADMIN_U_NAME FROM ADMIN WHERE ADMIN_U_NAME = '$user_username' AND ADMIN_PASSWD = SHA('$user_password')";
	
     $data = mysqli_query($dbc, $query)
        or die('Error Querying Database');

     
     $check = mysqli_num_rows($data);

        if ($check == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);

          // Start the session
          session_start();

          $_SESSION['user_id'] = $row['ADMIN_NO'];
          $_SESSION['username'] = $row['ADMIN_U_NAME'];
        //   setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
        //   setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
		//  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
		      $home_url = "home.php";
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else { 
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Login Form</title>
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Projects/SchoolManagementSystem/styles/loginform.css">
    <link rel="stylesheet" href="/Projects/SchoolManagementSystem/bootstrap/font-awesome/4.7.0/font-awesome.min.css">
    <script src="/Projects/SchoolManagementSystem/jquery/jquery-3.5.1.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/jquery/popper.min.js"></script>
    <script src="/Projects/SchoolManagementSystem/bootstrap/4.5.0/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

</head>

<body>
    <div class="login-form">
        <?php echo '<p> <em> <font color="red">' . $error_msg . '</font><em></p>'?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="userName" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                <a href="#" class="float-right">Forgot Password?</a>
            </div>
        </form>
        <p class="text-center"><a href="/Projects/SchoolManagementSystem/pages/signup.php">Create an Account</a></p>
    </div>
</body>

</html>