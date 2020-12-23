<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add New Stall</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="index.php">
            <img src="img/rob.png" width="30" height="30" alt="">
        </a>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="admin-contracts.php">Contracts</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="admin-applied-stalls.php">Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-renewal-requests.php">Renewal Requests</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin-stalls.php">Stalls</a>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <li class="nav-item">
                        <a href="api/logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
</head>
<body style="background-image: url('A.png');">
    <div class="container">
        
        <br />
        <h1 style="color:white;margin-left:450px;">Add New Stall</h1>
        <form action="api/admin-create-stall.php" method="POST">
            <div class="row">
                <div class="col col-md-5">
                    
                    <div class="container" style="margin-left:350px;">
                    <div class="card">
                    <div class="card-body">
                        <p>Please fill up the form accordingly.</p>
                        <label style="font-weight: bold;">Floor</label>
                        <input type="number" name="floor_no" placeholder="Example: 7" class="form-control" required>
                        <label style="font-weight: bold;">Block</label>
                        <input type="text" name="block_no" placeholder="Example: 5A" class="form-control" required>
                        <label style="font-weight: bold;">Block Dimensions</label>
                        <input type="text" name="block_dimension" placeholder="Example: 250x250" class="form-control" required>
                        <label style="font-weight: bold;">Stall Price</label>
                        <input type="number" step="0.01" name="stall_price" placeholder="Example: 8500.95" class="form-control" required>
                        <label style="font-weight: bold;">Price Date of Effectivity</label>
                        <input type="date" name="price_date_effectivity" class="form-control" required>
                        
                        <br />
                        <input type="submit" value="Submit" class="btn btn-success btn-sm float-left" style="margin-left: 90px;">
                        <a href="admin-stalls.php" class="btn btn-danger btn-sm float-left" style="margin-left: 60px;">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
</body>
</html>