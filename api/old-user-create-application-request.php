<?php 
    require_once "config.php";

    // Client Application
    $client_id = $_POST['client_id'];

    // Stall Application
    $business_name = $_POST['business_name'];
    $category_id = $_POST['category_id'];
    $applied_term = $_POST['applied_term'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if(!empty($_POST)){
        $sql_appstall = "INSERT INTO applied_stall (client_id, business_name, category_id, applied_term, start_date, end_date)
         VALUES ($client_id, '$business_name', $category_id, '$applied_term', '$start_date', '$end_date')";
        if(mysqli_query($link,$sql_appstall)){
            $app_id = mysqli_insert_id($link);
        }else{
            echo "Data not inserted.<br>" . mysqli_error($link);
        }
    }else

    // Stall Application Details, Multiple stalls insert
    $stall_id = $_POST['stall_id'];
    if(!empty($_POST['stall_id'])){
        foreach((array) $_POST['stall_id'] as $sid){
            // echo "StallsID array:" . $sid . "<br>";
            $sql_selected_stalls = "INSERT INTO applied_stall_details (app_id, stall_id) 
            VALUES ($app_id, $sid)";
            mysqli_query($link,$sql_selected_stalls);
        }
    }else{
        echo "Empty array...<br>" . mysqli_error($link);
        
    }

    header("location: ../old-user.php?client_id=$client_id");

    mysqli_close($link);

    
