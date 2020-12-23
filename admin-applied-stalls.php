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
    <title>Tenant Applications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="" />
    <script src="main.js"></script>

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
                <ul class="navbar-nav float-left">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="admin-contracts.php">Contracts</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="admin-applied-stalls.php">Applications</a>
                    </li>
                    <li class="nav-item">
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
<div class="adm">
    <div class="container">
        <div class="row">
        <div class="card" style="margin-top:120px;">
      <div class="card-body">
            <div class="col">
                <div class="float-left">
                    <br />
                    <h1 class="ad">List of Applications</h1>
                    <br />
                </div>
                
                <table class="table table-bordered table-striped table-sm table-hover"> 
                    <thead align="center">
                        <td><strong>#</strong></td>
                        <td><strong>Client</strong></td>
                        <td><strong>Business Name</strong></td>
                        <td><strong>Applied Term</strong></td>
                        <td><strong>Date Applied</strong></td>
                        <td><strong>Remark</strong></td>
                        <td><strong>Action</strong></td>
                    </thead>
                    <?php
                        require_once "api/config.php";

                        $sql_applied_stalls = "SELECT a.app_id AS 'app_id', a.client_id AS 'client_id',
                        bc.category_name AS 'category_name', a.business_name AS 'business_name', a.date_applied AS 'date_applied',
                        a.application_status AS 'application_status', a.applied_term AS 'applied_term',
                        c.fname AS 'fname', c.lname AS 'lname'
                        FROM applied_stall a
                        INNER JOIN business_classification bc ON a.category_id = bc.category_id
                        INNER JOIN client c ON a.client_id = c.client_id
                        ORDER BY a.app_id ASC
                        ";

                        $result_applied_stalls = (mysqli_query($link, $sql_applied_stalls));
                        if(mysqli_num_rows($result_applied_stalls) > 0){
                            while($row_applied_stalls = mysqli_fetch_assoc($result_applied_stalls)){
                                echo "<tr align='center' style='font-size: 15px;'>";
                                    $app_id = $row_applied_stalls['app_id'];
                                    $status = $row_applied_stalls['application_status'];
                                    echo "<td>" . $row_applied_stalls['app_id'] . "</td>";
                                    echo "<td>" . $row_applied_stalls['fname'] . " " . $row_applied_stalls['lname'] . "</td>";
                                    echo "<td>" . $row_applied_stalls['business_name'] . "</td>";
                                    echo "<td>" . $row_applied_stalls['applied_term'] . "</td>";
                                    $old_date_applied = strtotime($row_applied_stalls['date_applied']);
                                    $new_date_applied = date('Y-m-d', $old_date_applied);
                                    echo "<td>" . $new_date_applied . "</td>";
                                    if($status == 'Approved'){
                                        echo "<td style='color: green; font-weight: 800; font-style: italic;'>" . $status . "</td>";
                                    }elseif($status == 'Disapproved'){
                                        echo "<td style='color: red; font-weight: 800; font-style: italic;'>" . $status . "</td>";
                                    }elseif($status == 'Unapproved'){
                                        echo "<td style='color: gray; font-weight: 800; font-style: italic;'>" . $status . "</td>";
                                    }
                                    echo "<td>";
                                        echo "<a href='admin-view-applied-stall.php?app_id=$app_id' class='btn btn-primary btn-sm' style='margin: 1px; font-size: 13px;'>View</a>";
                                    echo "</td>";
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
</body>
</html>

<!-- echo "
                                        <a href='admin-view-applied-stall.php?app_id=$app_id' class='btn btn-primary btn-sm' style='margin: 1px; font-size: 13px;'>View</a>
                                        <a href='api/api-admin-approve-applied-stall.php?app_id=$app_id' class='btn btn-success btn-sm' style='margin: 1px; font-size: 13px;'>Approve</a>
                                        <a href='api/api-admin-disapprove-applied-stall.php?app_id=$app_id' class='btn btn-danger btn-sm' style='margin: 1px; font-size: 13px;'>Disapprove</a>
                                    "; -->