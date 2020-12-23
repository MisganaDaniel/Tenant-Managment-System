<?php 
    require_once "config.php";

    $stall_id = $_GET['stall_id'];
    $app_id = $_GET['app_id'];
    $client_id = $_GET['client_id'];
    $contract_id = $_GET['contract_id'];

    $sql_cancel = "UPDATE applied_stall_details SET stall_application_status = 'Approved' 
    WHERE app_id = $app_id AND stall_id = $stall_id";

    if(mysqli_query($link, $sql_cancel)){
        echo "Stall undoed!";

        header("Refresh:1; url = ../client-view-stalls.php?app_id=$app_id&client_id=$client_id&contract_id=$contract_id");
    }else{
        echo "It failed. ERROR MSG: " . mysqli_error($link) . "<br/>";
    }