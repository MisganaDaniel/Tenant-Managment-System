<?php include_once "api/config.php"; ?>
<html> 
<head>
    <meta charset="UTF-8">
    <title>Application Request</title>
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="bootstrap-4.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->

    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
            <img src="img/rob.png" width="30" height="30" alt="">
        </a>
    </div>
   
  </div>
</nav>
    <!-- Navbar -->
</head>
<body>

    

                <div class="col-md-8">
                    <br />
                    <h4>Available Stall Spaces</h4>
                    <br>
                    <table class="table table-striped table-bordered table-sm table-hover">
                        <tr align="center">
                            <th>#</th>
                            <th>Floor</th>
                            <th>Block</th>
                            <th>Block Dimension</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $sql_stalls = "SELECT s.floor_no AS 'floor_no', s.block_no AS 'block_no',
                        s.block_dimension AS 'block_dimension', s.stall_price AS 'stall_price',
                        s.stall_id AS 'stall_id'
                        FROM occupied_stalls os 
                        INNER JOIN stalls s ON os.stall_id = s.stall_id
                        WHERE contract_id IS NULL";
                        $result_stalls = mysqli_query($link, $sql_stalls);
                        if (mysqli_num_rows($result_stalls) > 0) {
                            while($row_stalls = mysqli_fetch_assoc($result_stalls)) {
                                echo "<tr align='center'>";
                                    echo "<td>" . $row_stalls['stall_id'] . "</td>";
                                    echo "<td>" . $row_stalls['floor_no'] . "</td>";
                                    echo "<td>" . $row_stalls['block_no'] . "</td>";
                                    echo "<td>" . $row_stalls['block_dimension'] . "</td>";
                                    echo "<td>Php " . number_format($row_stalls['stall_price'],2) . "</td>";
                                    echo "<td><input type='checkbox' name='stall_id[]' value=".$row_stalls['stall_id']."></td>";                        
                                echo "</tr>";
                            }
                        }else{
                            echo '<tr>';
                                echo '<td colspan="6" style="font-style: italic;" align="center">There are no available Stall Spaces at the moment.</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                    <a href="application-request.php">if available Stall Spaces click the button <button type="button" class="btn btn-primary">application Request</button></a>
                </div>
            </div>
        </form>
        <!-- Form Conent -->
    </div>
    


    <!-- Bootstrap JavaScript -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script> -->
    <script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap JavaScript -->
</body>
</html>