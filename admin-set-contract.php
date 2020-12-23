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
    <title>Tenant Contracts</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="admin-contracts.php">Contracts</a>
                    </li>
                    <li class="nav-item ">
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
<body>
    <div class="container">
        <br />
            <div class="row">
                <h1>List of Contracts</h1>
            </div>
        <br />
            <div class="row">
                <table class="table table-bordered table-striped table-sm">
                    <tr align="center" style="font-size: 12px;">
                        <th>#</th>
                        <th>Client</th>
                        <th>Business Name</th>
                        <th>Category</th>
                        <th>Term</th>
                        <th>Date Approved</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        require_once "api/config.php";
                        $contract_id = $_GET['contract_id'];

                        $sql_contracts = "SELECT c.contract_id AS 'contract_id', c.app_id AS 'app_id', c.client_id AS 'client_id',
                        cl.fname AS 'fname', cl.lname AS 'lname', c.business_name AS 'business_name', c.start_date AS 'start_date',
                        c.end_date AS 'end_date', c.date_approved AS 'date_approved', c.remark AS 'remark',
                        ct.category_name AS 'category_name', c.contract_term AS 'contract_term'
                        FROM contract c 
                        INNER JOIN client cl ON c.client_id = cl.client_id
                        INNER JOIN business_classification ct ON c.category_id = ct.category_id
                        ORDER BY c.contract_id ASC
                        ";

                        $result_contracts = mysqli_query($link, $sql_contracts);
                        if(mysqli_num_rows($result_contracts) > 0){
                            while($row_contracts = mysqli_fetch_assoc($result_contracts)){
                                
                                if($row_contracts['contract_id'] == $_GET['contract_id']){
                                    echo "<tr align='center' style='font-size: 15px;'>";
                                    $contract_id = $row_contracts['contract_id'];
                                    echo "<td>" . $row_contracts['contract_id'] . "</td>";
                                    echo "<td>" . $row_contracts['fname'] . " " . $row_contracts['lname'] . "</td>";
                                    echo "<td>" . $row_contracts['business_name'] . "</td>";
                                    echo "<td>" . $row_contracts['category_name'] . "</td>";
                                    if($row_contracts['contract_term'] == 'Pending'){
                                        echo "<td style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contracts['contract_term'] . "</td>";
                                    }else{
                                        echo "<td>" . $row_contracts['contract_term'] . "</td>";
                                    }
                                    $old_date_approved = strtotime($row_contracts['date_approved']);
                                    $new_date_approved = date('Y-m-d', $old_date_approved);
                                    echo "<td>" . $new_date_approved . "</td>";

                                    echo "<form action='api/admin-set-contract.php?contract_id=$contract_id' method='POST'>";
                                        if($row_contracts['start_date']){
                                            $old_start_date = strtotime($row_contracts['start_date']);
                                            $new_start_date = date('Y-m-d', $old_start_date);
                                            echo "<td>" . $new_start_date . "</td>";
                                        }else{
                                            echo "<td><input type='date' name='start_date' class='form-control' required></td>";
                                        }
                                        
                                        if($row_contracts['end_date']){
                                            $old_end_date = strtotime($row_contracts['end_date']);
                                            $new_end_date = date('Y-m-d', $old_end_date);
                                            echo "<td>" . $new_end_date . "</td>";
                                        }else{
                                            echo "<td><input type='date' name='end_date' class='form-control' required></td>";
                                        }

                                        // Remark hehe
                                        if($row_contracts['remark'] == 'Pending'){
                                            echo "<td style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                        }elseif($row_contracts['remark'] == 'Confirmed'){
                                            echo "<td style='color: green; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                        }elseif($row_contracts['remark'] == 'Cancelled'){
                                            echo "<td style='color: red; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                        }elseif($row_contracts['remark'] == 'Lapsed'){
                                            echo "<td style='color: red; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                        }
                                        
                                        echo "<td ><input type='submit' value='Confirm' class='btn btn-success btn-sm' style='margin: 1px; font-size: 9px;'>
                                            <a href='admin-contracts.php' class='btn btn-danger btn-sm' style='margin: 1px; font-size: 9px;'>Cancel</a>
                                        </td>";
                                    echo "</form>";
                                    
                                echo "</tr>";
                                }else{
                                    echo "<tr align='center' style='font-size: 15px;'>";
                                    $contract_id = $row_contracts['contract_id'];
                                    echo "<td>" . $row_contracts['contract_id'] . "</td>";
                                    echo "<td>" . $row_contracts['fname'] . " " . $row_contracts['lname'] . "</td>";
                                    echo "<td>" . $row_contracts['business_name'] . "</td>";
                                    echo "<td>" . $row_contracts['category_name'] . "</td>";
                                    $old_date_approved = strtotime($row_contracts['date_approved']);
                                    $new_date_approved = date('Y-m-d', $old_date_approved);
                                    echo "<td>" . $new_date_approved . "</td>";
                                    if($row_contracts['contract_term'] == 'Pending'){
                                        echo "<td style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contracts['contract_term'] . "</td>";
                                    }else{
                                        echo "<td>" . $row_contracts['contract_term'] . "</td>";
                                    }

                                    // Converting datetime to date format
                                        $old_start_date = strtotime($row_contracts['start_date']);
                                        $new_start_date = date('Y-m-d', $old_start_date);

                                        $old_end_date = strtotime($row_contracts['end_date']);
                                        $new_end_date = date('Y-m-d', $old_end_date);

                                    // Start Date
                                        if($row_contracts['start_date'] && $row_contracts['end_date']){
                                            echo "<td>" . $new_start_date . "</td>";
                                            echo "<td>" . $new_end_date . "</td>";
                                        }elseif($row_contracts['remark'] == 'Lapsed'){
                                            echo "<td style='color: red; font-weight: 800; font-style: italic;'>Lapsed</td>";
                                            echo "<td style='color: red; font-weight: 800; font-style: italic;'>Lapsed</td>";
                                        }elseif($row_contracts['remark'] == 'Pending'){
                                            echo "<td style='color: orange; font-weight: 800; font-style: italic;'>Pending</td>";
                                            echo "<td style='color: orange; font-weight: 800; font-style: italic;'>Pending</td>";
                                        }elseif($row_contracts['remark'] == 'Cancelled'){
                                            echo "<td style='color: red; font-weight: 800; font-style: italic;'>Cancelled</td>";
                                            echo "<td style='color: red; font-weight: 800; font-style: italic;'>Cancelled</td>";
                                        }elseif($row_contracts['remark'] == 'Confirmed'){
                                            echo "<td style='color: orange; font-weight: 800; font-style: italic;'>Pending</td>";
                                            echo "<td style='color: orange; font-weight: 800; font-style: italic;'>Pending</td>";
                                        }
                                        

                                    // Expiration algorithm BETA   
                                        $date1 = date_create($new_start_date);
                                        $date2 = date_create($new_end_date);
                                        $diff = date_diff($date1,$date2);
                                        $difference = $diff->format("%a");
                                        if($difference == 0){
                                            if(!empty($row_contracts['start_date']) && !empty($row_contracts['end_date']) && $row_contracts['remark'] == 'Confirmed'){
                                                $sql_lapsed_contract = "UPDATE contract SET start_date = NULL, 
                                                end_date = NULL WHERE contract_id = $contract_id";
                                                if(mysqli_query($link, $sql_lapsed_contract)){
                                                    $sql_lapsed_remark = "UPDATE contract SET remark = 'Lapsed' WHERE contract_id = $contract_id";
                                                    mysqli_query($link, $sql_lapsed_remark);
                                                }
                                            }
                                        }

                                    if($row_contracts['remark'] == 'Pending'){
                                        echo "<td style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                    }elseif($row_contracts['remark'] == 'Confirmed'){
                                        echo "<td style='color: green; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                    }elseif($row_contracts['remark'] == 'Cancelled'){
                                        echo "<td style='color: red; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                    }elseif($row_contracts['remark'] == 'Lapsed'){
                                        echo "<td style='color: red; font-weight: 800; font-style: italic;'>" . $row_contracts['remark'] . "</td>";
                                    }
                                    
                                    echo "<td>";
                                        echo "<a href='admin-view-contract-details.php?contract_id=$contract_id' class='btn btn-primary btn-sm ' style='margin: 1px; font-size: 13px;'>View</a>";
                                        if($row_contracts['start_date'] && $row_contracts['end_date']){
                                            echo "<a href='admin-set-contract.php?contract_id=$contract_id' class='btn btn-info btn-sm disabled' style='margin: 1px; font-size: 13px;'>Set</a>";
                                        }elseif($row_contracts['remark'] == 'Pending'){
                                            echo "<a href='admin-set-contract.php?contract_id=$contract_id' class='btn btn-info btn-sm disabled' style='margin: 1px; font-size: 13px;'>Set</a>";
                                        }elseif($row_contracts['remark'] == 'Cancelled'){
                                            echo "<a href='admin-set-contract.php?contract_id=$contract_id' class='btn btn-info btn-sm disabled' style='margin: 1px; font-size: 13px;'>Set</a>";
                                        }elseif($row_contracts['remark'] == 'Lapsed'){
                                            echo "<a href='admin-set-contract.php?contract_id=$contract_id' class='btn btn-info btn-sm' style='margin: 1px; font-size: 13px;'>Set</a>";
                                        }else{
                                            echo "<a href='admin-set-contract.php?contract_id=$contract_id' class='btn btn-info btn-sm' style='margin: 1px; font-size: 13px;'>Set</a>";
                                        }
                                    echo "</td>";
                                echo "</tr>";
                                }
                            }
                        }
                    ?>
                </table>
            </div>
    </div>
</body>
</html>