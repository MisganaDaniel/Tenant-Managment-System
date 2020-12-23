<?php 
    require_once "config.php";
    
    $approved = $disapproved = $count = "";

    // Stall Application Details, Multiple stalls insert
    if(!empty($_POST['stall_id'])){
        $stall_id = $_POST['stall_id'];
    }

    if(!empty($_POST['approved'])){
        $approved = $_POST['approved'];
    }
    
    if(!empty($_POST['disapproved'])){
        $disapproved = $_POST['disapproved'];
    }

    $app_id = $_GET['app_id'];

    if($approved){
        if(!empty($stall_id)){
            foreach((array) $stall_id as $sid){
                $count++;
                $sql_selected_stalls = "UPDATE applied_stall_details
                SET stall_application_status = 'Approved'
                WHERE app_id = $app_id AND stall_id = $sid";
                mysqli_query($link,$sql_selected_stalls);
    
                header("Refresh:0; url=../admin-view-applied-stall.php?app_id=$app_id");
            }
            // echo "<h1>Feedback Sent!</h1><br /><h3>The number of approved stall(s): $count";
        }else{
            echo "Select at least one.";
    
            header("Refresh:2; url= ../admin-view-applied-stall.php?app_id=$app_id");
        }
    }elseif($disapproved){
        if(!empty($stall_id)){
            foreach((array) $stall_id as $sid){
                $count++;
                $sql_selected_stalls = "UPDATE applied_stall_details
                SET stall_application_status = 'Disapproved'
                WHERE app_id = $app_id AND stall_id = $sid";
                mysqli_query($link,$sql_selected_stalls);
    
                header("Refresh:0; ../admin-view-applied-stall.php?app_id=$app_id");
            }
            // echo "<h1>Feedback Sent!</h1><h3>The number of disapproved stall(s): $count";
        }else{
            echo "Select at least one.";
    
            header("Refresh:2; url= ../admin-view-applied-stall.php?app_id=$app_id");
        }
    }
    
    mysqli_close($link);

    
