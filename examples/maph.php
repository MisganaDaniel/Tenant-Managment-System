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
          <li class="nav-item  ">
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
          <li class="nav-item active">
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
                  <h4 class="card-title ">List of Stalls Appliede</h4>
                  <p class="card-category"> Application Information

</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
  
</thead>
                <tbody>
                    <?php
                        require_once "../api/config.php";
                        $app_id = $_GET['app_id'];
                        $status_for_button = "";

                        $sql_applied_stalls = "SELECT a.app_id AS 'app_id', a.client_id AS 'client_id',
                        bc.category_name AS 'category_name', a.business_name AS 'business_name', a.date_applied AS 'date_applied',
                        a.application_status AS 'application_status', a.applied_term AS 'applied_term',
                        c.fname AS 'fname', c.lname AS 'lname'
                        FROM applied_stall a
                        INNER JOIN business_classification bc ON a.category_id = bc.category_id
                        INNER JOIN client c ON a.client_id = c.client_id
                        WHERE app_id = $app_id
                        ";

                        // Declaring the variables to fetch data from the while loop
                        $fname = $lname = $business_name = $category_name = $applied_term = $date_applied = $application_status = "";

                        $result_applied_stalls = mysqli_query($link, $sql_applied_stalls);
                        if(mysqli_num_rows($result_applied_stalls) > 0){
                            while($row_applied_stalls = mysqli_fetch_assoc($result_applied_stalls)){
                                $fname = $row_applied_stalls['fname'];
                                $lname = $row_applied_stalls['lname'];
                                $business_name = $row_applied_stalls['business_name'];
                                $category_name = $row_applied_stalls['category_name'];
                                $applied_term = $row_applied_stalls['applied_term'];
                                $date_applied = $row_applied_stalls['date_applied'];
                                $application_status = $row_applied_stalls['application_status'];

                                echo "<tr>";
                                    echo "<td>Client:</td>";
                                    echo "<td style='font-style: italic'>" . $fname . " " . $lname . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>Business Name:</td>";
                                    echo "<td style='font-style: italic'>" . $business_name . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>Category:</td>";
                                    echo "<td style='font-style: italic'>" . $category_name . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>Applied Term:</td>";
                                    echo "<td style='font-style: italic'>" . $applied_term . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>Date Applied:</td>";
                                    $old_date_applied = strtotime($date_applied);
                                    $new_date_applied = date('Y-m-d', $old_date_applied);
                                    echo "<td style='font-style: italic'>" . $new_date_applied . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td>Remark:</td>";
                                    if($application_status == 'Approved'){
                                        echo "<td style='font-style: italic; font-weight: bold; color: green;'>" . $application_status . "</td>";
                                    }elseif($application_status == 'Disapproved'){
                                        echo "<td style='font-style: italic; font-weight: bold; color: red; font-size: 15px;'>" . $application_status . "</td>";
                                    }elseif($application_status == 'Unapproved'){
                                        echo "<td style='font-style: italic; font-weight: bold; color: gray; font-size: 15px;'>" . $application_status . "</td>";
                                    }
                                echo "</tr>";
                            }
                        }
                    ?>  
                    </tbody>


  </table>
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "></h4>
                  <p class="card-category">

</p>     <form action="api/admin-verdict-applied-stall-details.php?app_id=<?php echo $_GET['app_id'];?>" method="POST">
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">           
                
                            <th>#</th>
                            <th>Floor</th>
                            <th>Block</th>
                            <th>Block Dimension</th>
                            <th>Price</th>
                            <th>Remark</th>
                            <th>Select</th>
                        </thead>
                        <tbody>
                        <?php
                            $sql_applied_stall_details = "SELECT ad.app_id AS 'app_id', ad.stall_id AS 'stall_id', 
                            ad.stall_application_status AS 'stall_application_status', s.floor_no AS 'floor_no',
                            s.block_no AS 'block_no', s.block_dimension AS 'block_dimension', s.stall_price AS 'stall_price'
                            FROM applied_stall_details ad
                            INNER JOIN stalls s ON ad.stall_id = s.stall_id
                            WHERE ad.app_id = $app_id
                            ";

                            $result_applied_stall_details = (mysqli_query($link, $sql_applied_stall_details));
                            if(mysqli_num_rows($result_applied_stall_details) > 0){
                                while($row_applied_stall_details = mysqli_fetch_assoc($result_applied_stall_details)){
                                    if($application_status == 'Approved'){
                                        echo "<tr align='center'>";
                                            echo "<td><small>" . $row_applied_stall_details['stall_id'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['floor_no'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['block_no'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['block_dimension'] . "</small></td>";
                                            echo "<td><small>Php " . number_format($row_applied_stall_details['stall_price'],2) . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['stall_application_status'] . "</small></td>";
                                            echo "<td><input type='checkbox' name='stall_id[]' value=".$row_applied_stall_details['stall_id']." disabled></td>"; 
                                        echo "</tr>";
                                    }elseif($application_status == 'Unapproved'){
                                        echo "<tr align='center'>";
                                            echo "<td><small>" . $row_applied_stall_details['stall_id'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['floor_no'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['block_no'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['block_dimension'] . "</small></td>";
                                            echo "<td><small>Php " . number_format($row_applied_stall_details['stall_price'],2) . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['stall_application_status'] . "</small></td>";
                                            echo "<td><input type='checkbox' name='stall_id[]' value=".$row_applied_stall_details['stall_id']."></td>"; 
                                        echo "</tr>";
                                    }elseif($application_status == 'Disapproved'){
                                        echo "<tr align='center'>";
                                            echo "<td><small>" . $row_applied_stall_details['stall_id'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['floor_no'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['block_no'] . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['block_dimension'] . "</small></td>";
                                            echo "<td><small>Php " . number_format($row_applied_stall_details['stall_price'],2) . "</small></td>";
                                            echo "<td><small>" . $row_applied_stall_details['stall_application_status'] . "</small></td>";
                                            echo "<td><input type='checkbox' name='stall_id[]' value=".$row_applied_stall_details['stall_id']." disabled></td>"; 
                                        echo "</tr>";
                                    }
                                }
                            }else{
                                echo "<tr>";
                                    echo "<td colspan='7' align='center'><em>No records found.</em></td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                    <?php
                        if($application_status == 'Approved'){
                            // echo "<a href='api/api-admin-disapprove-applied-stall.php?app_id=$app_id' class='btn btn-danger btn-sm float-right disabled' style='margin: 5px;'>Disapprove App</a>";
                            echo "<a href='api/api-admin-approve-applied-stall.php?app_id=$app_id' class='btn btn-success btn-sm float-right disabled' style='margin: 5px;' >Confirmed</a>";
                        }elseif($application_status == 'Disapproved'){
                            echo "<input type='submit' name='disapproved' value='Disapprove Stall(s)' class='btn btn-danger btn-sm float-right disabled' style='margin: 5px;'>";
                            echo "<input type='submit' name='approved' value='Approve Stall(s)' class='btn btn-primary btn-sm float-right disabled' style='margin: 5px;'>";
                            echo "<a href='api/api-admin-disapprove-applied-stall.php?app_id=$app_id' class='btn btn-danger btn-sm float-right disabled' style='margin: 5px;'>Disapprove App</a>";
                            echo "<a href='api/api-admin-approve-applied-stall.php?app_id=$app_id' class='btn btn-success btn-sm float-right disabled' style='margin: 5px;' >Approve App</a>";
                        }elseif($application_status == 'Unapproved'){
                            echo "<input type='submit' name='disapproved' value='Disapprove Stall(s)' class='btn btn-danger btn-sm float-right' style='margin: 5px;'>";
                            echo "<input type='submit' name='approved' value='Approve Stall(s)' class='btn btn-primary btn-sm float-right' style='margin: 5px;'>";
                            echo "<a href='api/api-admin-approve-applied-stall.php?app_id=$app_id' class='btn btn-success btn-sm float-right' style='margin: 5px;' >Confirm</a>";
                        }
                    ?>
                            </form>
                        </div>
                    </div>
                  </div>
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