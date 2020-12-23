<html> 
<head>
    <meta charset="UTF-8">
    <title>Tenant System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
            <img src="img/rob.png" width="30" height="30" alt="">
        </a>
    </div>

  </div>
</nav>
    <!-- Navbar -->
</head>
<body>
        <div class="container">
        <br />
        <div class="float-right">
            
            
            <br /><br /><br /><br /><br />
            <div class="wrapper">
                <p>Please fill in your E-mail.</p>
                <form action="api/authenticate-email.php" method="POST">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Enter your email-address:</label>
                        <input type="email" name="email" class="form-control form-control-sm col" placeholder="Your email-address.." required />
                    </div>    
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-primary" />
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="float-left">
            <h3>Welcome to Robinson's Tenant Management System!</h3>
            <h1>Login</h1>
            <br /><br /><br />
            <img src="img/robinsons-place-e1513574103535.png" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</body>

</html>