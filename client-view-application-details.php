<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application Details</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="client-application.php?client_id=<?php echo $_GET['client_id'];?>">My Applications</a>
                    </li>
                    <li class="nav-item">
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
    <div class="container">
            <br><h1>Application Details</h1><br>
        <div class="row">
            <div class="col-md-5">
                    <?php
                        require_once "api/config.php";

                        $app_id = $_GET['app_id'];
                        $client_id = $_GET['client_id'];

                        $sql_applied_stall = "SELECT * FROM applied_stall ap 
                        INNER JOIN business_classification bc ON ap.category_id = bc.category_id WHERE app_id = $app_id";

                        $result_applied_stall = mysqli_query($link, $sql_applied_stall);
                        if(mysqli_num_rows($result_applied_stall) > 0 ){
                            while($row_applied_stall = mysqli_fetch_assoc($result_applied_stall)){
                                echo '<table class="table table-bordered table-sm">';
                                    echo '<tr align="center">';
                                        echo '<th colspan="2">Information</th>';
                                    echo '</tr>';
                                    echo '<tbody>';
                                        echo '<tr>';
                                            echo '<td align="right">Application ID:</td>';
                                            echo '<td>' . $row_applied_stall['app_id'] . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                            echo '<td align="right">Business Name:</td>';
                                            echo '<td>' . $row_applied_stall['business_name'] . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                            echo '<td align="right">Category:</td>';
                                            echo '<td>' . $row_applied_stall['category_name'] . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                            echo '<td align="right">Date Applied:</td>';
                                            $old_date_applied = strtotime($row_applied_stall['date_applied']);
                                            $new_date_applied = date('Y-m-d', $old_date_applied);
                                            echo '<td>' . $new_date_applied . '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                            echo '<td align="right">Remark:</td>';
                                                if($row_applied_stall['application_status'] == 'Approved'){
                                                    echo "<td style='color: green; font-style: italic; font-weight: 800;'>" . $row_applied_stall['application_status'] . "</td>";
                                                }elseif($row_applied_stall['application_status'] == 'Unapproved'){
                                                    echo "<td style='color: gray; font-style: italic; font-weight: 800;'>" . $row_applied_stall['application_status'] . "</td>";
                                                }elseif($row_applied_stall['application_status'] == 'Disapproved'){
                                                    echo "<td style='color: red; font-style: italic; font-weight: 800;'>" . $row_applied_stall['application_status'] . "</td>";
                                                }
                                        echo '</tr>';
                                    echo '</tbody>';
                                echo '</table>';
                            }
                        }
                    ?>
            </div>
            <div class="col-md-7">
            <h4 class="float-left">Applied Stall Spaces</h4>
            <a href="client-application.php?client_id=<?php echo $client_id;?>" class="btn btn-danger btn-sm float-right">Back</a>
            <br /><br />
                <table class="table table-sm table-bordered table-striped">
                    <thead align="center" style="font-size: 14px;">
                        <th>Stall ID</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimensions</th>
                        <th>Remark</th>
                    </thead>
                <?php
                        require_once "api/config.php";

                        $app_id = $_GET['app_id'];

                        $sql_applied_stall = "SELECT * FROM applied_stall_details ad 
                        INNER JOIN stalls s ON ad.stall_id = s.stall_id
                        WHERE app_id = $app_id";

                        $result_applied_stall = mysqli_query($link, $sql_applied_stall);
                        if(mysqli_num_rows($result_applied_stall) > 0 ){
                            while($row_applied_stall = mysqli_fetch_assoc($result_applied_stall)){
                                echo "<tr align='center'>";
                                    $stall_id = $row_applied_stall['stall_id'];
                                    $status = $row_applied_stall['stall_application_status'];
                                    echo "<td>" . $row_applied_stall['stall_id'] . "</td>";
                                    echo "<td>" . $row_applied_stall['floor_no'] . "</td>";
                                    echo "<td>" . $row_applied_stall['block_no'] . "</td>";
                                    echo "<td>" . $row_applied_stall['block_dimension'] . "</td>";
                                    if($row_applied_stall['stall_application_status'] == 'Approved'){
                                        echo "<td style='color: green; font-style: italic; font-weight: 800;'>" . $row_applied_stall['stall_application_status'] . "</td>";
                                    }elseif($row_applied_stall['stall_application_status'] == 'Unapproved'){
                                        echo "<td style='color: gray; font-style: italic; font-weight: 800;'>" . $row_applied_stall['stall_application_status'] . "</td>";
                                    }elseif($row_applied_stall['stall_application_status'] == 'Disapproved'){
                                        echo "<td style='color: red; font-style: italic; font-weight: 800;'>" . $row_applied_stall['stall_application_status'] . "</td>";
                                    }elseif(($row_applied_stall['stall_application_status']) == 'Cancelled'){
                                        echo "<td style='color: red; font-style: italic; font-weight: 800;'>" . $row_applied_stall['stall_application_status'] . "</td>";
                                    }

                                     
                                echo "</tr>";
                            }
                        }
                    ?>
                </table> 
            </div>
        </div>
    </div>
</body>
</html>