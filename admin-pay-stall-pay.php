<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rent Payment</title>
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
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="card" style="margin-top:90px;">
                    <div class="card-body">
            <br>
            <?php 
                require_once "api/config.php";
                $contract_id = $_GET['contract_id'];
                $rentp_id = "";
                $stall_id = $_GET['stall_id'];
                $sql_select_rentp = "SELECT * FROM rental_payment WHERE contract_id = $contract_id";
                            $result_sql_select_rentp = mysqli_query($link, $sql_select_rentp);
                            if(mysqli_num_rows($result_sql_select_rentp) > 0){
                                while($row_sql_select_rentp = mysqli_fetch_assoc($result_sql_select_rentp)){
                                    $rentp_id = $row_sql_select_rentp['rentp_id'];
                                }
                            }
            ?>
                <h4 class="float-left">Stall Payment</h4>
                <a href="api/add-stall-month.php?contract_id=<?php echo $contract_id;?>&rentp_id=<?php echo $rentp_id;?>&stall_id=<?php echo $stall_id;?>" class="float-right btn btn-sm btn-success">Add</a>
                <a href="admin-view-contract-details.php?contract_id=<?php echo $contract_id;?>" class="btn btn-sm btn-danger float-right">Back</a>
                <table class="table table-sm table-hover table-borderless">
                    <thead align='center'>
                        <th>Month</th>
                        <th>Balance</th>
                        <th>Amount Paid</th>
                        <th>Date Paid</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            $id_pay = $_GET['id'];
                            $stall_id_pay = $_GET['stall_id'];
                            $contract_id_pay = $_GET['contract_id'];

                            $sql_select_rentp = "SELECT * FROM rental_payment WHERE contract_id = $contract_id";
                            $result_sql_select_rentp = mysqli_query($link, $sql_select_rentp);
                            if(mysqli_num_rows($result_sql_select_rentp) > 0){
                                while($row_sql_select_rentp = mysqli_fetch_assoc($result_sql_select_rentp)){
                                    $rentp_id = $row_sql_select_rentp['rentp_id'];
                                }
                            }

                            $sql_rental = "SELECT * FROM rental_payment_details WHERE rentp_id = $rentp_id AND stall_id = $stall_id";
                            
                            $result_sql_rental = mysqli_query($link, $sql_rental);
                            if(mysqli_num_rows($result_sql_rental) > 0 ){
                                while($row_sql_rental = mysqli_fetch_assoc($result_sql_rental)){
                                    echo "<tr align='center'>";
                                        $rent_month = $row_sql_rental['rent_month'];
                                        $date_paid = $row_sql_rental['date_paid'];
                                        $balance = $row_sql_rental['balance'];
                                        $old_date_paid = strtotime($date_paid);
                                        $new_date_paid = date('Y-m-d', $old_date_paid);
                                        $amount_paid = $row_sql_rental['amount_paid'];
                                        $rentp_id = $row_sql_rental['rentp_id'];
                                        $id = $row_sql_rental['id'];
                                        

                                        if($rent_month){
                                            if($id_pay == $row_sql_rental['id']){
                                                echo "<form action='api/admin-pay-stall-pay.php' method='POST'>";
                                                    echo "<td>" . $rent_month . "</td>";
                                                    echo "<td>Php " . number_format($balance,2) . "</td>";
                                                    echo "<td><input type='number' step='0.01' max='$balance' name='amount_paid' class='form-control form-control-sm' required></td>";
                                                    if(empty($amount_paid)){
                                                        echo "<td style='font-style: italic; color: gray; font-weight: 800;'>N/A</td>";
                                                    }else{
                                                        echo "<td>" . $new_date_paid . "</td>";
                                                    }
                                                    echo "<td>
                                                    
                                                    <a href='admin-pay-stall.php?contract_id=$contract_id_pay&stall_id=$stall_id_pay' class='btn btn-sm btn-outline-danger' style='margin: 3px;'>Cancel</a>
                                                    <input type='submit' value='Pay' class='btn btn-sm btn-success'>
                                                    </td>";
                                                    echo "<input type='hidden' name='contract_id' value='$contract_id_pay'>";
                                                    echo "<input type='hidden' name='stall_id' value='$stall_id_pay'>";
                                                    echo "<input type='hidden' name='id' value='$id_pay'>";
                                                echo "</form>";
                                            }else{
                                                echo "<td>" . $rent_month . "</td>";
                                            echo "<td>Php " . number_format($balance,2) . "</td>";
                                            echo "<td>Php " . number_format($amount_paid,2) . "</td>";
                                            if(empty($amount_paid)){
                                                echo "<td style='font-style: italic; color: gray; font-weight: 800;'>N/A</td>";
                                            }else{
                                                echo "<td>" . $new_date_paid . "</td>";
                                            }
                                            echo "<td><a href='admin-pay-stall-pay.php?contract_id=$contract_id&stall_id=$stall_id&id=$id' class='btn btn-primary btn-sm'>Pay</a></td>";
                                            }
                                        }else{
                                            echo "<form method='POST' action='api/admin-pay-stall-set-month.php?contract_id=$contract_id&stall_id=$stall_id'>";
                                            echo "<td><select type='text' name='rent_month' class='form-control form-control-sm'>
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
                                            </select></td>";
                                            echo "<td>Php " . number_format($balance,2) . "</td>";
                                            echo "<td>Php " . number_format($amount_paid,2) . "</td>";
                                            if($date_paid == NULL){
                                                echo "<td style='font-style: italic; color: gray; font-weight: 600;'>N/A</td>";
                                            }else{
                                                echo "<td>" . $new_date_paid . "</td>";
                                            }
                                            echo "<td><input type='submit' class='btn btn-success btn-sm' value='Set'></td>";

                                            echo "<input type='hidden' name='rentp_id' value='$rentp_id'>";
                                            echo "<input type='hidden' name='id' value='$id'>";
                                            echo "</form>";
                                        }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>