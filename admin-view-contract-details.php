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
    <title>Contract Details</title>
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
<body style="background-image: url('A.png');">
    <div class="container" style="margin-top:90px;">
        <br />
        <h1 style="color:white;">Contract Details</h1><br />
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="margin-top:30px;">
                    <div class="card-body">
                    <h4>Information</h4>
                    <table class="table table-sm table-hover table-borderless">
                        <thead align="center">
                            <th colspan="2">Contract</th>
                        </thead>
                        <?php 
                            require_once "api/config.php";
                            $contract_id = $_GET['contract_id'];
                            $remark = $start_date = $end_date = $verified = "";

                            $sql_contract = "SELECT cl.fname AS 'fname', cl.lname AS 'lname', c.business_name AS 'business_name',
                            bc.category_name AS 'category_name', c.contract_term AS 'contract_term', c.start_date AS 'start_date',
                            c.end_date AS 'end_date', c.date_approved AS 'date_approved', c.remark AS 'remark', c.verified AS 'verified'
                            FROM contract c
                            INNER JOIN client cl ON c.client_id = cl.client_id
                            INNER JOIN business_classification bc ON c.category_id = bc.category_id
                            WHERE c.contract_id = $contract_id 
                            ";

                            $result_contract = mysqli_query($link, $sql_contract);
                            if(mysqli_num_rows($result_contract) > 0 ){
                                while($row_contract = mysqli_fetch_assoc($result_contract)){
                                    $remark = $row_contract['remark'];
                                    $start_date = $row_contract['start_date'];
                                    $end_date = $row_contract['end_date'];
                                    $term = $row_contract['contract_term'];
                                    $verified = $row_contract['verified'];

                                    echo "<tr>";
                                        echo "<td align='right'>Client:</td><td align='center'>" . $row_contract['fname'] . " " . $row_contract['lname'] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td align='right'>Business Name:</td><td align='center'>" . $row_contract['business_name'] . "</td>"; 
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td align='right'>Category:</td><td align='center'>" . $row_contract['category_name'] . "</td>"; 
                                    echo "</tr>";
                                    echo "<tr>";
                                        $old_date_approved = strtotime($row_contract['date_approved']);
                                        $new_date_approved = date('Y-m-d', $old_date_approved);
                                        echo "<td align='right'>Date Approved:</td><td align='center'>" . $new_date_approved . "</td>"; 
                                    echo "</tr>";
                                    echo "<tr>";
                                        if($term == 'Pending'){
                                            echo "<td align='right'>Term:</td><td align='center' style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contract['contract_term'] . "</td>"; 
                                        }elseif($remark == 'Lapsed' || $remark == 'Cancelled'){
                                            echo '<td align="right">Term:</td>';
                                            echo '<td style="color:gray; font-style: italic; font-weight: 800;" align="center">N/A</td>';
                                        }else{
                                            echo "<td align='right'>Term:</td><td align='center'>" . $row_contract['contract_term'] . "</td>"; 
                                        }
                                    echo "</tr>";
                                    echo "<tr>";
                                        if($row_contract['start_date']){
                                            $old_start_date = strtotime($row_contract['start_date']);
                                            $new_start_date = date('Y-m-d', $old_start_date);
                                            echo "<td align='right'>Start Date:</td><td align='center'>" . $new_start_date . "</td>";
                                        }else{
                                            echo "<td align='right'>Start Date:</td><td align='center' style='color: grey; font-weight: 800; font-style: italic;'>N/A</td>";
                                        }
                                    echo "</tr>";
                                    echo "<tr>";
                                        if($row_contract['end_date']){
                                            $old_end_date = strtotime($row_contract['end_date']);
                                            $new_end_date = date('Y-m-d', $old_end_date);
                                            echo "<td align='right'>End Date:</td><td align='center'>" . $new_end_date . "</td>"; 
                                        }else{
                                            echo "<td align='right'>End Date:</td><td align='center' style='color: grey; font-weight: 800; font-style: italic;'>N/A</td>";
                                        }
                                    echo "</tr>";
                                    echo "<tr>";
                                        if($row_contract['remark'] == 'Confirmed'){
                                            echo "<td align='right'>Remark:</td><td align='center' style='color: green; font-weight: 800; font-style: italic;'>" . $row_contract['remark'] . "</td>";
                                        }elseif($row_contract['remark'] == 'Cancelled'){
                                            echo "<td align='right'>Remark:</td><td align='center' style='color: red; font-weight: 800; font-style: italic;'>" . $row_contract['remark'] . "</td>";
                                        }elseif($row_contract['remark'] == 'Pending'){
                                            echo "<td align='right'>Remark:</td><td align='center' style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contract['remark'] . "</td>";
                                        }elseif($row_contract['remark'] == 'Lapsed'){
                                            echo "<td align='right'>Remark:</td><td align='center' style='color: red; font-weight: 800; font-style: italic;'>" . $row_contract['remark'] . "</td>";
                                        }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                    <?php 
                        if($verified == 'False'){
                            if($remark == 'Confirmed'){
                                echo "<a href='api/admin-set-contract.php?contract_id=$contract_id' class='btn btn-primary btn-sm float-right'>Verify</a>";
                            }
                        }
                        // elseif(empty($start_date) && empty($end_date)){
                        //     if($remark == 'Confirmed'){
                        //         echo "<a href='admin-view-contract-details-set.php?contract_id=$contract_id' class='btn btn-primary btn-sm float-right'>Set Start & End Date</a>";
                        //     }elseif($remark == 'Cancelled'){
                        //         echo "<a href='admin-view-contract-details-set.php?contract_id=$contract_id' class='btn btn-primary btn-sm float-right disabled'>Set Start & End Date</a>";
                        //     }elseif($remark == 'Pending'){
                        //         echo "<a href='admin-view-contract-details-set.php?contract_id=$contract_id' class='btn btn-primary btn-sm float-right disabled'>Set Start & End Date</a>";
                        //     }elseif($remark == 'Lapsed'){
                        //         echo "<a href='admin-view-contract-details-set.php?contract_id=$contract_id' class='btn btn-primary btn-sm float-right'>Set Start & End Date</a>";
                        //     }
                        // }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col">
            <a href="admin-contracts.php" class="btn btn-danger btn-sm float-right">Back</a><br>
            <div class="card" style="margin-top: 10px;">
                    <div class="card-body">
                <h4>Occupied Stall Spaces</h4>
                <table class="table table-striped table-sm table-hover table-borderless">
                    <thead align="center">
                        <th>#</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimensions</th>
                        <th>Stall Price</th>
                        <th>Action</th>
                    </thead>
                    <?php 
                        $sql_occupied_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id";

                        $result_occupied_stalls = mysqli_query($link, $sql_occupied_stalls);
                        if(mysqli_num_rows($result_occupied_stalls) > 0){
                            while($row_occupied_stalls = mysqli_fetch_assoc($result_occupied_stalls)){
                                echo "<tr align='center'>";
                                $stall_id = $row_occupied_stalls['stall_id'];
                                    echo "<td>" . $row_occupied_stalls['stall_id'] . "</td>";
                                    echo "<td>" . $row_occupied_stalls['floor_no'] . "</td>";
                                    echo "<td>" . $row_occupied_stalls['block_no'] . "</td>";
                                    echo "<td>" . $row_occupied_stalls['block_dimension'] . "</td>";
                                    echo '<td>Php ' . number_format($row_occupied_stalls['stall_price'],2) . '</td>';
                                    echo "<td>";
                                        echo "<a href='admin-pay-stall.php?contract_id=$contract_id&stall_id=$stall_id' class='btn btn-sm btn-primary' target='_blank'>Pay</a>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                        }else{
                            echo "<tr>";
                                echo "<td colspan='5' align='center' style='font-style: italic;'>No records found.</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>

                <!-- <h4 class="float-left">Rental Payment Information</h4>
                <a href="api/admin-new-payment.php?contract_id=<?php echo $_GET['contract_id'];?>" class="btn btn-secondary btn-sm float-right" class="">Add</a>
                <table class="table table-sm table-bordered table-striped">
                        <thead align="center">
                            <th>#</th>
                            <th>Rent Month</th>
                            <th>Payment per Month</th>
                            <th>Balance</th>
                            <th>Amount Paid</th>
                            <th>Date Paid</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql_payment = "SELECT * FROM rental_payment WHERE contract_id = $contract_id";
                                $result_payment = mysqli_query($link, $sql_payment);
                                if(mysqli_num_rows($result_payment) > 0 ){
                                    while($row_payment = mysqli_fetch_assoc($result_payment)){
                                        $rent_month = $row_payment['rent_month'];
                                        $date_paid = $row_payment['date_paid'];
                                        $rentp_id = $row_payment['rentp_id'];
                                        $null = "";
                                        $balance = $row_payment['balance'];
                                        echo '<tr align="center">';
                                            echo '<form action="api/admin-set-month-payment.php?contract_id='.$contract_id.'" method="POST">';
                                                echo '<td>' . $row_payment['rentp_id'] . '</td>';
                                                echo '<input type="hidden" name="rentp_id" value="'.$rentp_id.'">';
                                                if(empty($rent_month)){
                                                    echo '<td>
                                                        <select type="text" name="rent_month" class="form-control form-control-sm" required>
                                                            <optgroup label="Select Month">
                                                                <option>January</option>
                                                                <option>February</option>
                                                                <option>March</option>
                                                                <option>April</option>
                                                                <option>May</option>
                                                                <option>June</option>
                                                                <option>July</option>
                                                                <option>August</option>
                                                                <option>September</option>
                                                                <option>October</option>
                                                                <option>November</option>
                                                                <option>December</option>
                                                            </optgroup>
                                                        </select>
                                                    </td>';
                                                }else{
                                                    echo '<td>' . $rent_month . '</td>';
                                                }
                                                echo '<td>Php ' . number_format($row_payment['total_amount'],2) . '</td>';
                                                echo '<td>Php ' . number_format($row_payment['balance'],2) . '</td>';
                                                echo '<td>Php ' . number_format($row_payment['amount_paid'],2) . '</td>';
                                                if(empty($date_paid)){
                                                    echo '<td style="color: gray; font-style: italic; font-weight: 800">N/A</td>';
                                                }else{
                                                    $old_date_paid = strtotime($row_payment['date_paid']);
                                                    $new_date_paid = date('Y-m-d', $old_date_paid);
                                                    echo '<td>' . $new_date_paid . '</td>';
                                                }

                                                if(empty($rent_month)){
                                                    echo '<td>
                                                    <input type="submit" value="Set" class="btn btn-info btn-sm" style="margin: 2px;">
                                                    <a href="api/admin-rent-payment.php?rentp_id="'.$rentp_id.'" class="btn btn-success btn-sm disabled" style="margin: 2px;">Pay</a>
                                                    </td>';
                                                }else{
                                                    echo '<td>';
                                                    // echo '<a href="#" class="btn btn-info btn-sm disabled" style="margin: 2px;">Set</a>';
                                                    
                                                    if($balance == 0){
                                                        echo '<a href="admin-view-contract-details-pay.php?contract_id='.$contract_id.'&rentp_id='.$rentp_id.'" class="btn btn-success btn-sm disabled" style="margin: 2px;">Pay</a>';
                                                    }else{
                                                        echo '<a href="admin-view-contract-details-pay.php?contract_id='.$contract_id.'&rentp_id='.$rentp_id.'&stall_id='.$stall_id.'" class="btn btn-success btn-sm " style="margin: 2px;">Pay</a>';
                                                    }
                                                    
                                                    
                                                    echo '</td>';
                                                }
                                            echo '</form>';
                                        echo '</tr>';
                                    }
                                }else{
                                    echo '<tr align="center">';
                                        echo '<td colspan="7" style="font-style: italic;">No records found.</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                
                </table> -->
            </div>
        </div>
        </div>        
    </div>
    </div>
</body>
</html>