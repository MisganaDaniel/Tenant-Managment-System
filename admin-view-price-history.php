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
    <title>Stall Price History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="index.php">
            <img src="img/rob.png" width="30" height="30" alt="">
        </a>
        <div class="container" >
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
    <div class="container" style="margin-top: 90px;">
        <br />
        <h1 style="color:white;">Price History</h1><br />
        <div class="row">
            <div class="col">
            <div class="card" style="margin-top:40px;">
            <div class="card-body">
                <h3 class="float-left" style="color:black;">Previous</h3>
                <table class="table table-sm table-borderless table-hover table-striped">
                    <thead align="center">
                        <th>Old Price</th>
                        <th>Date End</th>
                        <th>Date Effectivity</th>
                    </thead>
                    <?php 
                        require_once "api/config.php";
                        $stall_id = $_GET['stall_id'];

                        $sql_history = "SELECT * FROM stall_pricehistory WHERE stall_id = $stall_id";
                        $result_history = mysqli_query($link, $sql_history);
                        if(mysqli_num_rows($result_history) > 0){
                            while($row_history = mysqli_fetch_assoc($result_history)){
                                echo "<tr align='center'>";
                                    echo "<td>Php " . number_format($row_history['stall_price'],2) . "</td>";
                                    $old_date_end = strtotime($row_history['date_end']);
                                    $new_date_end = date('Y-m-d', $old_date_end);
                                    echo "<td>" . $new_date_end . "</td>";
                                    $old_date_effectivty = strtotime($row_history['date_effectivity']);
                                    $new_date_effectivity = date('Y-m-d', $old_date_effectivty);
                                    echo "<td>" . $new_date_effectivity . "</td>";
                                echo "</tr>";
                            }
                        }else{
                            echo "<tr align='center'>";
                                echo "<td colspan='4' style='font-style: italic;'>No records found.</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                    </div>
                    </div>
            </div>
            <div class="col">
            <a href="admin-stalls.php" class="btn btn-danger btn-sm float-right">Back</a>
            <div class="card" style="margin-top:40px;">
            <div class="card-body">
                <h3 class="float-left" style="color:black;">Current</h3>
                
                
                <table class="table table-sm table-borderless table-hover table-striped">
                    <thead>
                        <th>#</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimension</th>
                        <th>Current Price</th>
                        <th>Date Effectivity</th>
                    </thead>
                        <?php
                        $sql_stalls = "SELECT * FROM stalls WHERE stall_id = $stall_id";

                        $result_stalls = mysqli_query($link, $sql_stalls);
                        if(mysqli_num_rows($result_stalls) > 0 ){
                            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                                $floor_no = $row_stalls['floor_no'];
                                $block_no = $row_stalls['block_no'];
                                $block_dimension = $row_stalls['block_dimension'];
                                $stall_price = $row_stalls['stall_price'];
                                $price_date_effectivity = $row_stalls['price_date_effectivity'];
                                $stall_id = $row_stalls['stall_id'];

                                echo "<tr align='center' style='font-size: 15px;'>";
                                    echo "<td>" . $stall_id . "</td>";
                                    echo "<td>" . $floor_no . "</td>";
                                    echo "<td>" . $block_no . "</td>";
                                    echo "<td>" . $block_dimension . "</td>";
                                    echo "<td>Php " . number_format($stall_price,2) . "</td>";
                                    $old_price_date = strtotime($price_date_effectivity);
                                    $new_price_date = date('Y-m-d', $old_price_date);
                                    echo "<td>" . $new_price_date . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>