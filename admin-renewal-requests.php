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
    <title>Renewal Requests</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="index.php">
        <img src="img/new 4.png" width="50" height="50" alt="" style="margin-left: 30px;">
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
<body style="background-image: url('A.png');>
    <div class="admi" style="margin-top: 20px;">
        <div class="container">
            
            <div class="card" style="margin-top:120px;">
                <div class="card-body">
                    
                    <br><h1>Renewal Requests</h1><br>
                    <div class="row">
                        <table class="table table-striped table-sm table-hover table-borderless">
                            <thead align="center">
                                <th>#</th>
                                <th>Contract ID</th>
                                <th>Client</th>
                                <th>Date Applied for Renewal</th>
                                <th>Renewal Term</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </thead>
                            <?php
                                require_once "api/config.php";

                                $sql_renewal = "SELECT r.renewal_id AS 'renewal_id', cl.fname AS 'fname', cl.lname AS 'lname',
                                r.contract_id AS 'contract_id', r.date_applied_renewal AS 'date_applied_renewal', r.renewal_status AS 'renewal_status',
                                r.renewal_term AS 'renewal_term', r.start_date AS 'start_date', r.end_date AS 'end_date'
                                FROM renewal r
                                INNER JOIN client cl ON r.client_id = cl.client_id
                                ";

                                $result_renewal = mysqli_query($link, $sql_renewal);
                                if(mysqli_num_rows($result_renewal) > 0 ){
                                    while($row_renewal = mysqli_fetch_assoc($result_renewal)){
                                        echo "<tr align='center'>";
                                            $remark = $row_renewal['renewal_status'];
                                            $renewal_id = $row_renewal['renewal_id'];
                                            echo "<td>" . $row_renewal['renewal_id'] . "</td>";
                                            echo "<td>" . $row_renewal['contract_id'] . "</td>";
                                            $contract_id = $row_renewal['contract_id']; 
                                            echo "<td>" . $row_renewal['fname'] . " " . $row_renewal['lname'] . "</td>";
                                            $old_date = strtotime($row_renewal['date_applied_renewal']);
                                            $new_date = date('Y-m-d', $old_date);
                                            echo "<td>" . $new_date . "</td>";
                                            echo "<td>" . $row_renewal['renewal_term'] . "</td>";

                                            $old_start_date = strtotime($row_renewal['start_date']);
                                            $new_start_date = date('Y-m-d', $old_start_date);
                                            echo "<td>" . $new_start_date . "</td>";
                                            $old_end_date = strtotime($row_renewal['end_date']);
                                            $new_end_date = date('Y-m-d', $old_end_date);
                                            echo "<td>" . $new_end_date . "</td>";



                                            $renewal_term = $row_renewal['renewal_term'];
                                            if($row_renewal['renewal_status'] == 'Approved'){
                                                echo "<td style='color: green; font-weight: 800; font-style: italic;'>" . $row_renewal['renewal_status'] . "</td>";
                                            }elseif($row_renewal['renewal_status'] == 'Cancelled'){
                                                echo "<td style='color: red; font-weight: 800; font-style: italic;'>" . $row_renewal['renewal_status'] . "</td>";
                                            }else{
                                                echo "<td style='color: gray; font-weight: 800; font-style: italic;'>" . $row_renewal['renewal_status'] . "</td>";
                                            }

                                            if($remark == 'Approved'){
                                                echo "<td>";
                                                    echo "<a href='admin-view-renewal-details.php?renewal_id=$renewal_id' class='btn btn-primary btn-sm' style='font-size: 11px; margin: 1px;'>View</a>";
                                                    echo "<a href='api/admin-approve-renewal.php?renewal_id=$renewal_id&renewal_term=$renewal_term&contract_id=$contract_id' class='btn btn-success btn-sm disabled' style='font-size: 11px; margin: 1px;'>Approve</a>";
                                                echo "</td>";
                                            }elseif($remark == 'Unapproved'){
                                                echo "<td>";
                                                    echo "<a href='admin-view-renewal-details.php?renewal_id=$renewal_id' class='btn btn-primary btn-sm' style='font-size: 11px; margin: 1px;'>View</a>";
                                                    echo "<a href='api/admin-approve-renewal.php?renewal_id=$renewal_id&renewal_term=$renewal_term&contract_id=$contract_id&start_date=$new_start_date&end_date=$new_end_date' class='btn btn-success btn-sm' style='font-size: 11px; margin: 1px;'>Approve</a>";
                                                echo "</td>";
                                            }elseif($remark == 'Cancelled'){
                                                echo "<td>";
                                                    echo "<a href='admin-view-renewal-details.php?renewal_id=$renewal_id' class='btn btn-primary btn-sm' style='font-size: 11px; margin: 1px;'>View</a>";
                                                    echo "<a href='api/admin-approve-renewal.php?renewal_id=$renewal_id&renewal_term=$renewal_term&contract_id=$contract_id' class='btn btn-success btn-sm disabled' style='font-size: 11px; margin: 1px;'>Approve</a>";
                                                echo "</td>";
                                            }
                                            
                                        echo "</tr>";
                                    }
                                }else{
                                    echo '<tr>';
                                        echo '<td colspan="7" style="font-style: italic;" align="center">No records found.</td>';
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