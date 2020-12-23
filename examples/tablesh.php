<?php
    // Initialize the session
    session_start();
     
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../index.php");
        exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../img/new 4.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Tenant System Management
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          Tenant System Management
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item   ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item  active">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>list of tables</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.php">
              <i class="material-icons">library_books</i>
              <p>End date of Contrats</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.php">
              <i class="material-icons">bubble_chart</i>
              <p>Sales Price</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./btn.php">
              <i class="material-icons">bubble_chart</i>
              <p>Avalabel space on the floor</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.php">
              <i class="material-icons">library_books</i>
              <p>Application Reports</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.php">
              <i class="material-icons">notifications</i>
              <p>Renewal Requests Reports</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.php">
              <i class="material-icons">content_paste</i>
              <p>List of Stall Spaces Reports </p>
            </a>
          </li>

          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 
                  <a class="dropdown-item" href="#">You have 5 Renewal Requests Reports </a>
                  <a class="dropdown-item" href="#"> You have new List of Stall Spaces Reports <a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../api/logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Contract Details</h4>
                  <p class="card-category"> Information

</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                         <th colspan="2">Contract</th>
                    </thead>
                    <?php 
                        require_once "../api/config.php";
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
                 
                ?>
                </table>
                  </div>
                </div>
              </div>
            </div>
           <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary"><h4 class="card-title mt-0">Contract Details</h4>
                  <p class="card-category">Occupied Stall Spaces</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>#</th>
                        <th>Floor</th>
                        <th>Block</th>
                        <th>Block Dimensions</th>
                        <th>Stall Price</th>
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
              </table>
              </div>
            </div>
          </div>
        </div>
            </div>
        </div>
        <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  Tenant System Management
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Tenant System Management</a> 
          </div>
        </div>
      </footer>
    </div>
  </div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>