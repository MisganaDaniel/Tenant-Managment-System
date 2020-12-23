<?php 
    require_once "config.php";

    $contract_id = $_GET['contract_id'];

    $sql_confirm = "UPDATE contract SET remark = 'Cancelled' WHERE contract_id = $contract_id";
    if(mysqli_query($link, $sql_confirm)){
        echo "Contract confirmed successfully! <br />";

        $sql_client = "SELECT * FROM contract WHERE contract_id = $contract_id";
        $result_client = mysqli_query($link, $sql_client);
        $row_client = mysqli_fetch_assoc($result_client);
        $client_id = $row_client['client_id'];

        header("Refresh: 2; url = ../client-contracts.php?client_id=$client_id");
    }

    mysqli_close($link);