<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin-contracts.php");
    exit;
}
 
// Include config file
require_once "api/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: examples/dashboard.php");
                            // header("location: admin-contracts.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<html> 
<head>
    <meta charset="UTF-8">
    <title>Tenant System Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
<<!-- nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    </ul>
    </div>

  </div>
</nav> -->
    <!-- Navbar -->
</head>
<body>
    <div class="container">
    <a href="index.php">
    <h1 style="padding-left: 5cm;font-family:Impact;font-size:42px;padding-top:30px;padding-bottom:30px;"><strong>Welcome To Tenant Management System </strong></h1>
    </a><br />
        <div class="float-right">
            
            
            <br /><br /><br /><br /><br />
            <div class="wrapper">
                <div class="card" style="width:350px;padding-left:10px;margin-right:150px;border-color:blue;border-radius:10px;margin-top:-40px;">
                    <div class="card-body">
                        <h2 style="text-align:center;">Login</h2>
                        <!-- <p>Please fill in your credentials to login.</p> -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>    
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-left" value="Login" style="margin-left:80px;">
                                <input type="button" class="btn btn-primary float-right" value="Cancel" onclick="window.location.replace('index.php')" style="margin-top:-1px;margin-right:80px;"">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-left" style="margin-top: -10px;">
                <br /><br /><br />
                <a href="index.php">
                <!-- <img src="img/new 4.png" width="200" height="200" class="img-fluid" alt="Responsive image " style="margin-top:150px;"> -->
                </a>
             </div>
            <div class="">
                <img src="img/new 4.png" style="margin-top:100px;margin-left:0px;"  width="500" height="500" class="img-fluid" alt="Responsive image ">
            </div>
        </div>
    </div>

</body>
</html>