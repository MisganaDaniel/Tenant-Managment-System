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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Renewal Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="admin-renewal-requests.php">Renewal Requests</a>
                    </li>
                    <li class="nav-item">
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
    <div class="container" style="margin-top:90px;">
        <br><h1 class="float-left" style="color:white;">Renewal Details</h1><br>
        <a href='admin-renewal-requests.php' class='btn btn-danger btn-sm float-right' style='margin: 1px;'>Back</a><br /><br>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-body">
                <h4>Contract</h4>
                <table class="table table-striped table-sm table-hover table-borderless">
                    <thead align="center">
                        <th>#</th>
                        <th>Client</th>
                        <th>Date Applied</th>
                        <th>Term</th>
                        <th>Remark</th>
                    </thead>
                <?php
                    require_once "api/config.php";

                    $renewal_id = $_GET['renewal_id'];
                    
                    $sql_renewal = "SELECT r.renewal_id AS 'renewal_id', cl.fname AS 'fname', cl.lname AS 'lname',
                    r.contract_id AS 'contract_id', r.date_applied_renewal AS 'date_applied_renewal', r.renewal_status AS 'renewal_status',
                    r.renewal_term AS 'renewal_term'
                    FROM renewal r
                    INNER JOIN client cl ON r.client_id = cl.client_id
                    WHERE renewal_id = $renewal_id
                    ";

                    $result_renewal = mysqli_query($link, $sql_renewal);
                    if(mysqli_num_rows($result_renewal) > 0 ){
                        while($row_renewal = mysqli_fetch_assoc($result_renewal)){
                            echo "<tr align='center'>";
                                echo "<td>" . $row_renewal['contract_id'] . "</td>";
                                echo "<td>" . $row_renewal['fname'] . " " . $row_renewal['lname'] . "</td>";
                                $old_renewal_date = strtotime($row_renewal['date_applied_renewal']);
                                $new_renewal_date = date('Y-m-d', $old_renewal_date);
                                echo "<td>" . $new_renewal_date . "</td>";
                                echo "<td>" . $row_renewal['renewal_term'] . "</td>";
                                if($row_renewal['renewal_status'] == 'Approved'){
                                    echo "<td style='color: green; font-style: italic; font-weight: 800;'>" . $row_renewal['renewal_status'] . "</td>";
                                }elseif($row_renewal['renewal_status'] == 'Unapproved'){
                                    echo "<td style='color: gray; font-style: italic; font-weight: 800;'>" . $row_renewal['renewal_status'] . "</td>";
                                }elseif($row_renewal['renewal_status'] == 'Disapproved'){
                                    echo "<td style='color: red; font-style: italic; font-weight: 800;'>" . $row_renewal['renewal_status'] . "</td>";
                                }elseif($row_renewal['renewal_status'] == 'Cancelled'){
                                    echo "<td style='color: red; font-style: italic; font-weight: 800;'>" . $row_renewal['renewal_status'] . "</td>";
                                }
                            echo "</tr>";
                        }
                    }else{
                        echo "<td colspan='7' style='font-style: italic;' align='center'>No records found.</td>";
                    }
                ?>
                </table>
                </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <h4>Stalls</h4>
                <table class="table table-sm table-striped table-hover table-borderless">
                    <thead align="center">
                        <th>#</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimension</th>
                    </thead>
                    <?php
                        $sql_renewal_details = "SELECT * FROM renewal_details rd INNER JOIN stalls s ON rd.stall_id = s.stall_id";
                        $result_renewal_details = mysqli_query($link, $sql_renewal_details);
                        if(mysqli_num_rows($result_renewal_details) > 0){
                            while($row_renewal_details = mysqli_fetch_assoc($result_renewal_details)){
                                echo "<tr align='center'>";
                                    echo "<td>" . $row_renewal_details['stall_id'] . "</td>";
                                    echo "<td>" . $row_renewal_details['floor_no'] . "</td>";
                                    echo "<td>" . $row_renewal_details['block_no'] . "</td>";
                                    echo "<td>" . $row_renewal_details['block_dimension'] . "</td>";
                                echo "</tr>";
                            }
                        }else{
                            echo '<tr>';
                                echo '<td colspan="4" style="font-style: italic;" align="center">No records found.</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>