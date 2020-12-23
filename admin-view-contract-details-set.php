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
        <h1>Contract Details</h1><br />
        <div class="row">
            <div class="col">
                <h4>Information</h4>
                <table class="table table-bordered table-sm">
                    <thead align="center">
                        <th colspan="2">Contract</th>
                    </thead>
                    <?php 
                        require_once "api/config.php";
                        $contract_id = $_GET['contract_id'];

                        $sql_contract = "SELECT cl.fname AS 'fname', cl.lname AS 'lname', c.business_name AS 'business_name',
                        bc.category_name AS 'category_name', c.contract_term AS 'contract_term', c.start_date AS 'start_date',
                        c.end_date AS 'end_date', c.date_approved AS 'date_approved', c.remark AS 'remark'
                        FROM contract c
                        INNER JOIN client cl ON c.client_id = cl.client_id
                        INNER JOIN business_classification bc ON c.category_id = bc.category_id
                        WHERE c.contract_id = $contract_id 
                        ";

                        $result_contract = mysqli_query($link, $sql_contract);
                        if(mysqli_num_rows($result_contract) > 0 ){
                            while($row_contract = mysqli_fetch_assoc($result_contract)){
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
                                    if($row_contract['contract_term'] == 'Pending'){
                                        echo "<td align='right'>Term:</td><td align='center' style='color: orange; font-weight: 800; font-style: italic;'>" . $row_contract['contract_term'] . "</td>"; 
                                    }else{
                                        echo "<td align='right'>Term:</td><td align='center'>" . $row_contract['contract_term'] . "</td>"; 
                                    }
                                echo "</tr>";
                                echo "<form action='api/admin-set-contract.php?contract_id=$contract_id' method='POST'>";
                                    echo "<tr>";
                                        if($row_contract['start_date']){
                                            $old_start_date = strtotime($row_contract['start_date']);
                                            $new_start_date = date('Y-m-d', $old_start_date);
                                            echo "<td align='right'>Start Date:</td><td align='center'>" . $new_start_date . "</td>";
                                            echo "<td><input type='date'></td>";
                                        }else{
                                            // echo "<td align='right'>Start Date:</td><td align='center' style='color: grey; font-weight: 800; font-style: italic;'>N/A</td>";
                                            echo "<td align='right'>Start Date:</td>";
                                            echo "<td><input type='date' name='start_date' class='form-control' required></td>";                                    
                                        }
                                    echo "</tr>";
                                    echo "<tr>";
                                        if($row_contract['end_date']){
                                            $old_end_date = strtotime($row_contract['end_date']);
                                            $new_end_date = date('Y-m-d', $old_end_date);
                                            echo "<td align='right'>End Date:</td><td align='center'>" . $new_end_date . "</td>"; 
                                        }else{
                                            echo "<td align='right'>End Date:</td>";
                                            echo "<td><input type='date' name='end_date' class='form-control' required></td>";  
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
                        <a href="admin-view-contract-details.php?contract_id=<?php echo $contract_id;?>" class="btn btn-danger btn-sm float-right" style="margin: 1px;">Cancel</a>
                        <input type="submit" value="Set" class="btn btn-success btn-sm float-right" style="margin: 1px;">
                    </form>
            </div>
            <div class="col">
                <h4>Occupied Stall Spaces</h4>
                <table class="table table-bordered table-striped table-sm">
                    <thead align="center">
                        <th>#</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimensions</th>
                    </thead>
                    <?php 
                        $sql_occupied_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id";

                        $result_occupied_stalls = mysqli_query($link, $sql_occupied_stalls);
                        if(mysqli_num_rows($result_occupied_stalls) > 0){
                            while($row_occupied_stalls = mysqli_fetch_assoc($result_occupied_stalls)){
                                echo "<tr align='center'>";
                                    echo "<td>" . $row_occupied_stalls['stall_id'] . "</td>";
                                    echo "<td>" . $row_occupied_stalls['floor_no'] . "</td>";
                                    echo "<td>" . $row_occupied_stalls['block_no'] . "</td>";
                                    echo "<td>" . $row_occupied_stalls['block_dimension'] . "</td>";
                                echo "</tr>";
                            }
                        }else{
                            echo "<tr>";
                                echo "<td colspan='4' align='center' style='font-style: italic;'>No records found.</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>