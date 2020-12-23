<?php 
    require_once "config.php";

    // Client Application
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $applied_term = $_POST['applied_term'];

    if(!empty($_POST)){
        $sql_client = "INSERT INTO client (fname, lname, email, address, contact)
         VALUES ('$fname', '$lname', '$email', '$address', '$contact')";
        if(mysqli_query($link,$sql_client)){
            $new_client_id = mysqli_insert_id($link);
        }else{
            echo "Data not inserted for table client.<br>" . mysqli_error($link);
        }
    }

    // Stall Application
    $business_name = $_POST['business_name'];
    $category_id = $_POST['category_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if(!empty($_POST)){
        $sql_appstall = "INSERT INTO applied_stall (client_id, business_name, category_id, applied_term, start_date, end_date)
         VALUES ($new_client_id, '$business_name', $category_id, '$applied_term', '$start_date', '$end_date')";
        if(mysqli_query($link,$sql_appstall)){
            $new_appstall_id = mysqli_insert_id($link);
        }else{
            echo "Data not inserted for table applied_stall.<br>";
        }
    }

    // Stall Application Details, Multiple stalls insert
    $stall_id = $_POST['stall_id'];
    if(!empty($stall_id)){
        foreach((array) $stall_id as $sid){
            $sql_selected_stalls = "INSERT INTO applied_stall_details (app_id, stall_id) 
            VALUES ($new_appstall_id, $sid)";
            mysqli_query($link,$sql_selected_stalls);
        }
    }

    echo "<h1>Application Sent!</h1>";
    header("Refresh:2; url=../index.php");

    mysqli_close($link);
