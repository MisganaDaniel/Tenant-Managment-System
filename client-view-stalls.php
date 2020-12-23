<html> 
    <head>
        <meta charset="UTF-8">
        <title>Tenant System</title>
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
                        <li class="nav-item disabled">
                            <a class="nav-link" href="old-user.php?client_id=<?php echo $_GET['client_id'];?>">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="client-contracts.php?client_id=<?php echo $_GET['client_id'];?>">My Contracts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="client-application.php?client_id=<?php echo $_GET['client_id'];?>">My Applications</a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="client-renewal.php?client_id=<?php echo $_GET['client_id'];?>">Renewal</a>
                        </li>
                        <li class="nav-item disabled">
                            <a class="nav-link" href="client-application-request.php?client_id=<?php echo $_GET['client_id'];?>">Request</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </head>
    <body>
        <!-- renewal Content -->
        <div class="container">
            <div>
                <br /><h1 class="float-left">Contract Details</h1><br/>
                <button onclick="goBack()" class="btn btn-danger btn-sm float-right">Back</button>
                <script>
                function goBack() {
                window.history.back();
                }
                </script>
            </div>
            
            <br /><br />
            <div class="row">
                <div class="col-4">
                    <table class="table table-bordered table-sm">
                            <?php
                                require_once "api/config.php";
                                $contract_id = $_GET['contract_id'];
                                $app_id = $_GET['app_id'];
                                $remark = "";
                                
                                $client_id = $_GET['client_id'];				
                                $sql_contract = "SELECT c.contract_id AS 'contract_id', c.app_id AS 'app_id',
                                c.client_id AS 'client_id', c.category_id AS 'category_id', c.business_name AS 'business_name',
                                c.start_date AS 'start_date', c.end_date AS 'end_date', c.date_approved AS 'date_approved',
                                c.remark AS 'remark', bc.category_name AS 'category_name', c.contract_term AS 'contract_term',
                                cl.fname AS 'fname', cl.lname AS 'lname', c.remark AS 'remark'
                                FROM contract c
                                INNER JOIN business_classification bc ON c.category_id = bc.category_id 
                                INNER JOIN client cl ON c.client_id = cl.client_id
                                WHERE contract_id = $contract_id";
                                $result_contract = mysqli_query($link,$sql_contract);
                                if (mysqli_num_rows($result_contract) > 0) {
                                    while($row_contract = mysqli_fetch_assoc($result_contract)) {
                                        echo '<tr align="center">';
                                            echo '<th colspan="2">Information</th>';
                                        echo '</tr>';
                                        echo '<tbody>';
                                            echo '<tr>';
                                                echo '<td align="right">Contract ID:</td>';
                                                echo '<td>' . $row_contract['contract_id'] . '</td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">Owner:</td>';
                                                echo '<td>' . $row_contract['fname'] . ' ' . $row_contract['lname'] . '</td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">Business Name:</td>';
                                                echo '<td>' . $row_contract['business_name'] . '</td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">Category:</td>';
                                                echo '<td>' . $row_contract['category_name'] . '</td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">Start Date:</td>';
                                                $start_date = $row_contract['start_date'];
                                                if($start_date){
                                                    $old_start_date = strtotime($start_date);
                                                    $new_start_date = date('Y-m-d', $old_start_date);
                                                    echo '<td>' . $new_start_date . '</td>';
                                                }else{
                                                    echo '<td style="color: gray; font-style: italic; font-weight: 800">N/A</td>';
                                                }
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">End Date:</td>';
                                                $end_date = $row_contract['end_date'];
                                                if($end_date){
                                                    $old_end_date = strtotime($end_date);
                                                    $new_end_date = date('Y-m-d', $old_end_date);
                                                    echo '<td>' . $new_end_date . '</td>';
                                                }else{
                                                    echo '<td style="color: gray; font-style: italic; font-weight: 800">N/A</td>';
                                                }
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">Term:</td>';
                                                echo '<td>' . $row_contract['contract_term'] . '</td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                                echo '<td align="right">Remark:</td>';
                                                $remark = $row_contract['remark'];
                                                if($remark == 'Confirmed'){
                                                    echo '<td style="color: green; font-style: italic; font-weight: 800;">Confirmed</td>';
                                                }elseif($remark == 'Pending'){
                                                    echo '<td style="color: orange; font-style: italic; font-weight: 800;">Pending</td>';
                                                }elseif($remark == 'Cancelled'){
                                                    echo '<td style="color: red; font-style: italic; font-weight: 800;">Cancelled</td>';
                                                }elseif($remark == 'Lapsed'){
                                                    echo '<td style="color: red; font-style: italic; font-weight: 800;">Lapsed</td>';
                                                }
                                            echo '</tr>';
                                        echo '</tbody>';
                                    }
                                }
                            ?>
                    </table>
                </div>
                <div class="col-8">
                    <h4>Occupied Stall Spaces</h4>
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead align="center" style="font-size: 14px;">
                                <th>#</th>
                                <th>Floor</th>
                                <th>Block</th>
                                <th>Block Dimension</th>
                                <th>Price</th>
                            </thead>
                            <?php 
                                $sql_stalls = "SELECT s.floor_no AS 'floor_no', s.block_no AS 'block_no', s.block_dimension AS 'block_dimension', 
                                os.stall_id AS 'stall_id', s.stall_price AS 'stall_price' 
                                FROM occupied_stalls os
                                INNER JOIN stalls s ON os.stall_id = s.stall_id
                                WHERE contract_id = $contract_id";

                                $result_stalls = mysqli_query($link,$sql_stalls);
                                if (mysqli_num_rows($result_stalls) > 0) {
                                    while($row_stalls = mysqli_fetch_assoc($result_stalls)) {
                                        echo "<tr align='center'>";
                                            echo "<td>" . $row_stalls['stall_id'] . "</td>";
                                            echo "<td>" . $row_stalls['floor_no'] . "</td>";
                                            echo "<td>" . $row_stalls['block_no'] . "</td>";
                                            echo "<td>" . $row_stalls['block_dimension'] . "</td>";
                                            echo "<td>Php " . number_format($row_stalls['stall_price'],2) . "</td>";
                                        echo "</tr>";
                                    }
                                }else{
                                    echo '<tr align="center">';
                                        echo '<td colspan="5" style="font-style: italic">No records found.</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                    <h4>Approved & Disapproved Stall Spaces</h4>
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead align="center" style="font-size: 14px;">
                                <th>#</th>
                                <th>Floor</th>
                                <th>Block</th>
                                <th>Block Dimension</th>
                                <th>Price</th>
                                <th>Remark</th>
                                
                            </thead>
                            <?php 
                                
                                $sql_stalls = "SELECT s.floor_no AS 'floor_no', s.block_no AS 'block_no', s.block_dimension AS 'block_dimension', 
                                os.stall_id AS 'stall_id', s.stall_price AS 'stall_price', os.stall_application_status AS 'remark' 
                                FROM applied_stall_details os
                                INNER JOIN stalls s ON os.stall_id = s.stall_id
                                WHERE app_id = $app_id";
    
                                $result_stalls = mysqli_query($link,$sql_stalls);
                                if (mysqli_num_rows($result_stalls) > 0) {
                                    while($row_stalls = mysqli_fetch_assoc($result_stalls)) {
                                        echo "<tr align='center'>";
                                            $stall_id = $row_stalls['stall_id'];
                                            echo "<td>" . $row_stalls['stall_id'] . "</td>";
                                            echo "<td>" . $row_stalls['floor_no'] . "</td>";
                                            echo "<td>" . $row_stalls['block_no'] . "</td>";
                                            echo "<td>" . $row_stalls['block_dimension'] . "</td>";
                                            echo "<td>Php " . number_format($row_stalls['stall_price'],2) . "</td>";
                                            $stall_remark = $row_stalls['remark'];
                                            if($stall_remark == 'Approved'){
                                                echo '<td style="color: green; font-style: italic; font-weight: 800;">' . $stall_remark . '</td>';
                                            }elseif($stall_remark == 'Unapproved'){
                                                echo '<td style="color: gray; font-style: italic; font-weight: 800;">' . $stall_remark . '</td>';
                                            }elseif($stall_remark == 'Disapproved'){
                                                echo '<td style="color: red; font-style: italic; font-weight: 800;">' . $stall_remark . '</td>';
                                            }elseif($stall_remark == 'Cancelled'){
                                                echo '<td style="color: red; font-style: italic; font-weight: 800;">' . $stall_remark . '</td>';
                                            }
                                        echo "</tr>";
                                    }
                                }else{
                                    echo '<tr align="center">';
                                        echo '<td colspan="6" style="font-style: italic">No records found.</td>';
                                    echo '</tr>'; 
                                }
                                mysqli_close($link);
                            ?>
                        </table>
                </div>
            </div>
        </div>
        <!-- Renewal Content -->
    </body>
    </html>