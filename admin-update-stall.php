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
    <title>Tenant Stall Spaces</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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
    <div class="container" style="margin-top:90px;">
        <br />
        <div class="row">
            <h1 style="color:white;margin-left:25px;">List of Stall Spaces</h1>
        </div>
        <br />
        <div class="row" >
            <div class="col-md-8">
            <div class="col">
            <div class="card" style="margin-top:40px;">
            <div class="card-body">
                <h4 class="float-left" style="color:black;">All Stall Spaces</h4>
                <a href="admin-create-stall.php" class="btn btn-success btn-sm float-right">Add New Stall</a>
                <br /><br />
                <table class="table table-sm table-striped table-hover table-borderless">
                    <thead align="center" style="font-size: 11px;">
                        <th>#</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimension</th>
                        <th>Price</th>
                        <th>Price Effectivity</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        require_once "api/config.php";

                        // Declaring variables
                        $floor_no = $block_no = $block_dimension = $stall_price = $price_date_effectivity = $stall_id = "";

                        $sql_stalls = "SELECT st.floor_no AS 'floor_no', st.block_no AS 'block_no', st.block_dimension AS 'block_dimension',
                        st.stall_price AS 'stall_price', st.price_date_effectivity AS 'price_date_effectivity', os.stall_id AS 'stall_id'
                        FROM occupied_stalls os
                        INNER JOIN stalls st ON os.stall_id = st.stall_id
                        ";

                        $result_stalls = mysqli_query($link, $sql_stalls);
                        if(mysqli_num_rows($result_stalls) > 0 ){
                            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                                $floor_no = $row_stalls['floor_no'];
                                $block_no = $row_stalls['block_no'];
                                $block_dimension = $row_stalls['block_dimension'];
                                $stall_price = $row_stalls['stall_price'];
                                $price_date_effectivity = $row_stalls['price_date_effectivity'];
                                $stall_id = $row_stalls['stall_id'];
                                
                                if($stall_id == $_GET['stall_id']){
                                    echo "<tr align='center' style='font-size: 15px;'>";
                                        echo "<td>" . $stall_id . "</td>";
                                        echo "<td>" . $floor_no . "</td>";
                                        echo "<td>" . $block_no . "</td>";
                                        echo "<td>" . $block_dimension . "</td>";
                                        echo "<form action='api/admin-update-stall.php?stall_id=$stall_id' method='POST'>";
                                            echo "<td><input type='number' step='0.01' name='stall_price' class='form-control form-control-sm' value='$stall_price' required></td>";
                                            $old_price_date = strtotime($price_date_effectivity);
                                            $new_price_date = date('Y-m-d', $old_price_date);
                                            // echo "<td>" . $new_price_date . "</td>";
                                            echo "<td><input type='date' name='price_date_effectivity' class='form-control form-control-sm' value='$new_price_date' required></td>";
                                            echo "<td>
                                                <input type='submit' value='Confirm' class='btn btn-sm btn-primary' style='font-size: 11px; margin: 1px;'>
                                                <a href='admin-stalls.php' class='btn btn-sm btn-danger' style='font-size: 11px; margin: 1px;'>Cancel</a>
                                            </td>";
                                        echo "</form>";
                                    echo "</tr>";
                                }else{
                                    echo "<tr align='center' style='font-size: 15px;'>";
                                        echo "<td>" . $stall_id . "</td>";
                                        echo "<td>" . $floor_no . "</td>";
                                        echo "<td>" . $block_no . "</td>";
                                        echo "<td>" . $block_dimension . "</td>";
                                        echo "<td>Php " . number_format($stall_price,2) . "</td>";
                                        $old_price_date = strtotime($price_date_effectivity);
                                        $new_price_date = date('Y-m-d', $old_price_date);
                                        echo "<td>" . $new_price_date . "</td>";
                                        echo "<td>
                                            <a href='admin-update-stall.php?stall_id=$stall_id' class='btn btn-sm btn-primary' style='font-size: 11px; margin: 1px;'>Update</a>
                                            <a href='admin-view-price-history.php?stall_id=$stall_id' class='btn btn-sm btn-info' style='font-size: 11px; margin: 1px;'>Log</a>
                                            <a href='admin-remove-stall.php?stall_id=$stall_id' class='btn btn-sm btn-danger' style='font-size: 11px; margin: 1px;'>Remove</a>
                                        </td>";
                                    echo "</tr>";
                                }
                                
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
            <div class="row">
                <div class="col-md-16">
                <a href="admin-stalls.php" class="btn btn-danger btn-sm float-right">Back</a>
                    <div class="card" style="margin-top:40px; margin-left:40px;">
                    <div class="card-body">
                        <h4 class="float-left" style="color:black;">Occupied Stall Spaces</h4>
                        <br /><br />
                        <table class="table table-sm table-striped table-hover table-borderless">
                                <thead align="center">
                                    <th>#</th>
                                    <th>Owned by</th>
                                    <th>Contract ID</th>
                                </thead>
                                <?php
                                    $sql_occupied_stalls = "SELECT os.stall_id AS 'stall_id', os.contract_id AS 'contract_id',
                                    c.client_id AS 'client_id', cl.fname AS 'fname', cl.lname AS 'lname'
                                    FROM occupied_stalls os
                                    INNER JOIN contract c ON os.contract_id = c.contract_id
                                    INNER JOIN client cl ON c.client_id = cl.client_id
                                    ";

                                    $result_occupied_stalls = mysqli_query($link, $sql_occupied_stalls);
                                    if(mysqli_num_rows($result_occupied_stalls) > 0 ){
                                        while($row_occupied_stalls = mysqli_fetch_assoc($result_occupied_stalls)){
                                            if($row_occupied_stalls['contract_id']){
                                                echo "<tr align='center' style='font-size: 15px;'>";
                                                    echo "<td>" . $row_occupied_stalls['stall_id'] . "</td>";
                                                    echo "<td>" . $row_occupied_stalls['fname'] . " " . $row_occupied_stalls['lname'] . "</td>";
                                                    echo "<td>" . $row_occupied_stalls['contract_id'] . "</td>";
                                                    echo "</tr>";
                                            }
                                        }
                                    }
                                ?>
                        </table>
                    </div>
                    </div>
        </div>
    </div>
</body>
</html>