<?php
    require_once("config.php");
    $rentp_id = $_GET['rentp_id'];
    $stall_id = $_GET['stall_id'];
    $contract_id = $_GET['contract_id'];
    $balance = "";

    $sql_balance = "SELECT * FROM stalls WHERE stall_id = $stall_id";
    $result_balance = mysqli_query($link, $sql_balance);
    if(mysqli_num_rows($result_balance) > 0 ){
        while($row_balance = mysqli_fetch_assoc($result_balance)){
            $balance = $row_balance['stall_price'];
        }
    }

    $sql_add = "INSERT INTO rental_payment_details (rentp_id, stall_id, balance) VALUES ($rentp_id, $stall_id, $balance)";
    
    if(mysqli_query($link, $sql_add)){
        echo "New record added! <br>";
        header("Refresh:1;url=../admin-pay-stall.php?contract_id=$contract_id&stall_id=$stall_id");
    }