<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Applications</title>

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
        <br><h1>List of Applications</h1><br>
        <div class="row">
            <table class="table table-sm table-bordered table-striped">
                <thead align="center">
                    <th>#</th>
                    <th>Business Name</th>
                    <th>Category</th>
                    <th>Applied Term</th>
                    <th>Date Applied</th>
                    <th>Remark</th>
                    <th>Action</th>
                </thead>
                <?php
                    require_once "api/config.php";

                    $client_id = $_GET['client_id'];

                    $sql_applied_stall = "SELECT * FROM applied_stall ap 
                    INNER JOIN business_classification bc ON ap.category_id = bc.category_id WHERE client_id = $client_id";

                    $result_applied_stall = mysqli_query($link, $sql_applied_stall);
                    if(mysqli_num_rows($result_applied_stall) > 0 ){
                        while($row_applied_stall = mysqli_fetch_assoc($result_applied_stall)){
                            echo "<tr align='center'>";
                                $app_id = $row_applied_stall['app_id'];
                                echo "<td>" . $row_applied_stall['app_id'] . "</td>";
                                echo "<td>" . $row_applied_stall['business_name'] . "</td>";
                                echo "<td>" . $row_applied_stall['category_name'] . "</td>";
                                echo "<td>" . $row_applied_stall['applied_term'] . "</td>";
                                $old_date_applied = strtotime($row_applied_stall['date_applied']);
                                $new_date_applied = date('Y-m-d', $old_date_applied);
                                echo "<td>" . $new_date_applied . "</td>";
                                    if($row_applied_stall['application_status'] == 'Approved'){
                                        echo "<td style='color: green; font-style: italic; font-weight: 800;'>" . $row_applied_stall['application_status'] . "</td>";
                                    }elseif($row_applied_stall['application_status'] == 'Unapproved'){
                                        echo "<td style='color: gray; font-style: italic; font-weight: 800;'>" . $row_applied_stall['application_status'] . "</td>";
                                    }elseif($row_applied_stall['application_status'] == 'Disapproved'){
                                        echo "<td style='color: red; font-style: italic; font-weight: 800;'>" . $row_applied_stall['application_status'] . "</td>";
                                    }

                                echo "<td>";
                                    echo "<a href='client-view-application-details.php?app_id=$app_id&client_id=$client_id' class='btn btn-primary btn-sm'>View</a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                    }else{
                        echo '<tr>';
                            echo '<td colspan="8" style="font-style: italic;" align="center">No records found.</td>';
                        echo '</tr>';
                    }
                ?>
            </table> 
        </div>
    </div>
</body>
</html>