<?php 
    require_once "config.php";

    $client_id = $_GET['client_id'];
    $contract_id = $_GET['contract_id'];

    $sql_cancel = "UPDATE contract SET renewal_status = 'Cancelled' WHERE client_id = $client_id AND contract_id = $contract_id";
    $sql_cancel_renewal = "UPDATE renewal SET renewal_status = 'Cancelled' WHERE contract_id = $contract_id";

    if(mysqli_query($link, $sql_cancel)){
        mysqli_query($link, $sql_cancel_renewal);
        echo "Renewal was cancelled!";

        header("Refresh:1; url = ../client-renewal.php?client_id=$client_id");
    }else{
        echo "It failed. ERROR MSG:" . mysqli_error($link);
    }
    
