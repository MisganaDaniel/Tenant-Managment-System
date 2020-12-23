<?php 
    require_once "config.php";

    $contract_id = $_GET['contract_id'];
    $app_id = $_GET['app_id'];
    $client_id = $_GET['client_id'];

    $sql_confirm = "UPDATE contract SET remark = 'Cancelled' WHERE contract_id = $contract_id";

    if(mysqli_query($link, $sql_confirm)){
        echo "Contract confirmed successfully!";

        header("Refresh:1; url = ../client-view-stalls.php?contract_id=$contract_id&app_id=$app_id&client_id=$client_id");
    }else{
        echo "It failed. ERROR MSG:" . mysqli_error($link) . "<br />";
    }