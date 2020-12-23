<?php
// Include config file
require_once "api/config.php";
 
// Define variables and initialize with empty values
$username = $password = $firstname = $lastname = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$firstname_err = $lastname_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


    //inserting  firstname
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
        // Validate username
        if(empty(trim($_POST["firstname"]))){
            $username_err = "Please enter your firstname.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE firstname = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_firstname);
                
                // Set parameters
                $param_firstname = trim($_POST["firstname"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                                        
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
        }

    }


 //inserting  lastname
 if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["lastname"]))){
        $username_err = "Please enter your lastname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE lastname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_lastname);
            
            // Set parameters
            $param_lastname = trim($_POST["lastname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                                    
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

}

   
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($lastname_err) && empty($firstname_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (firstname, lastname, username, password) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_firstname, $param_lastname, $param_username, $param_password);
            
            // Set parameters
            //$param_firstname = $firstname;
         //   $param_lastname = $lastname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: admin-contracts.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
   <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   
        <body>

   <!--  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
        </a>
    </div>
   
  </div>
</nav> -->
</head>
<body>
    <div class="container">
    <a href="index.php">
    <h1 style="padding-left: 5cm;font-family:Impact;font-size:42px;padding-top:30px;padding-bottom:30px;"><strong>Welcome To Tenant Management System </strong></h1>
    </a>
        <br />
        <div class="float-right">
            
            
            <br /><br /><br /><br /><br />
            
            <div class="wrapper" style="margin-top:-140px;margin-left:90px;">
            <div class="card" style="width:500px; border-color:blue; border-radius:14px;">
            <div class="card-body">
                <h2 style="text-align:center;">Admin Registration</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="register">
                 <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> -->
            <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>  
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>       
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register"  style="margin-left:180px;">
                        <input type="reset" class="btn btn-primary" value="Reset">
                    </div>
            <!-- <p>Already have an account? <a href="login.php">Login here</a>.</p> -->
        </form>
        </div>
        </div>
            </div>
        </div>
        <div class="">
                <img src="img/new 4.png" style="margin-top:100px;margin-left:0px;"  width="500" height="500" class="img-fluid" alt="Responsive image ">
            </div>
        <!-- <div class="float-left">
            <img src="img/t2.png" style="padding-right: 3cm padding-top: 4cm"  width="600" height="600" class="img-fluid" alt="Responsive image ">
        </div> -->
    </div>   

    <script type="text/javascript">
   
        $(document).ready(function () {
        
            $("#register").submit(function (e) {
    
                $("#btn-submit").attr("disabled", true);
    
                return true;
        
            });
        });
    
    </script>
</body>
</html>