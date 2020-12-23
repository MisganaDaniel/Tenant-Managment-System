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
                    <li class="nav-item ">
                        <a class="nav-link" href="old-user.php?client_id=<?php echo $_GET['client_id'];?>">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="client-contracts.php?client_id=<?php echo $_GET['client_id'];?>">My Contracts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client-application.php?client_id=<?php echo $_GET['client_id'];?>">My Applications</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="client-renewal.php?client_id=<?php echo $_GET['client_id'];?>">Renewal</a>
                    </li>
                    <li class="nav-item">
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
        <br /><h1>List of Contracts for Renewal</h1><br/>
        <table class="table table-bordered table-striped table-sm">
            <thead align="center">
                <td><strong>Contract ID</strong></td>
                <td><strong>Business Name</strong></td>
                <td><strong>Category</strong></td>
                <td><strong>Start Date</strong></td>
                <td><strong>End Date</strong></td>
                <td><strong>Term</strong></td>
                <td><strong>Renewal Remark</strong></td>
                <td><strong>Action</strong></td>
            </thead>
            <?php
                require_once "api/config.php";
                $client_id = $_GET['client_id'];
                $sql_contract = "SELECT c.contract_id AS 'contract_id', c.app_id AS 'app_id',
                c.client_id AS 'client_id', c.category_id AS 'category_id', c.business_name AS 'business_name',
                c.start_date AS 'start_date', c.end_date AS 'end_date', c.date_approved AS 'date_approved',
                c.remark AS 'remark', bc.category_name AS 'category_name', c.contract_term AS 'contract_term',
                c.renewal_status AS 'renewal_status'
                FROM contract c
                INNER JOIN business_classification bc ON c.category_id = bc.category_id 
                WHERE client_id = $client_id
                ";

                $result_contract = mysqli_query($link,$sql_contract);
                if (mysqli_num_rows($result_contract) > 0) {
                    while($row_contract = mysqli_fetch_assoc($result_contract)) {
                        echo "<form action='api/request-renewal.php?client_id=$client_id' method='POST'>";
                            echo "<tr align='center'>";
                                $contract_id = $row_contract['contract_id'];
                                echo "<td>" . $row_contract['contract_id'] . "</td>";
                                echo "<input type='hidden' name='contract_id' value='$contract_id'>";
                                echo "<td>" . $row_contract['business_name'] . "</td>";
                                echo "<td>" . $row_contract['category_name'] . "</td>";
                                $old_start_date = strtotime($row_contract['start_date']);
                                $new_start_date = date('Y-m-d', $old_start_date); 
                                echo "<td>" . "<input type='date' name='start_date' value='$new_start_date' class='form-control form-control-sm'>" . "</td>";
                                $old_end_date = strtotime($row_contract['end_date']);
                                $new_end_date = date('Y-m-d', $old_end_date); 
                                echo "<td>" . "<input type='date' name='end_date' value='$new_end_date' class='form-control form-control-sm'>" . "</td>"; 
                                if($row_contract['renewal_status'] == 'Sent'){
                                    $sql_renewal_term = "SELECT renewal_term FROM renewal WHERE contract_id = $contract_id";
                                    $result_renewal_term = mysqli_query($link,$sql_renewal_term);
                                    $fetched_renewal_term = "";
                                    if (mysqli_num_rows($result_renewal_term) > 0) {
                                        while($row_renewal_term = mysqli_fetch_assoc($result_renewal_term)) {
                                            $fetched_renewal_term = $row_renewal_term['renewal_term'];
                                        }
                                    }
                                    echo "<td>" . 
                                    "<input type='text' value='$fetched_renewal_term' class='form-control form-control-sm' disabled>";
                                }else{
                                    echo "<td>" . 
                                    "<select type='text' class='form-control form-control-sm' name='contract_term' required>
                                    <optgroup label='Terms'>
                                        <option>1 year</option>
                                        <option>2 years</option>
                                        <option>3 years</option>
                                        <option>4 years</option>
                                    </optgroup>
                                    </select>" . 
                                    "</td>";  
                                }
                                  
                                echo "<td>" . $row_contract['renewal_status'] . "</td>";  
                                if($row_contract['renewal_status'] == 'Sent'){
                                    echo "<td><input type='submit' value='Request' class='btn btn-primary btn-sm' style='font-size: 10px; margin: 1px;' disabled />
                                    <a href='api/client-cancel-renewal.php?client_id=$client_id&contract_id=$contract_id' class='btn btn-sm btn-danger' style='font-size: 10px; margin: 1px;'>Cancel</a></td>";
                                }else{
                                    echo "<td><input type='submit' value='Request' class='btn btn-primary btn-sm style='font-size: 10px; margin: 1px;'' /></td>";
                                }        
                                
                            echo "</tr>";
                        echo "</form>";
                    }
                }else{
                    echo '<tr>';
                        echo '<td colspan="8" style="font-style: italic;" align="center">No records found.</td>';
                    echo '</tr>';
                }
            ?>
        </table>
    </div>
    <!-- Renewal Content -->
</body>
</html>