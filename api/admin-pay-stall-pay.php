<?php 
    require_once "config.php";
    $contract_id = $_POST['contract_id'];
    $stall_id = $_POST['stall_id'];
    $id = $_POST['id'];
    $amount_paid = $_POST['amount_paid'];

    $sql_pay = "UPDATE rental_payment_details
    SET amount_paid = amount_paid + $amount_paid,
    balance = balance - $amount_paid,
    date_paid = CURRENT_TIMESTAMP
    WHERE id = $id
    ";

    if(mysqli_query($link, $sql_pay)){
        echo "Payment successful!";
        header("Refresh:1;url=../admin-pay-stall.php?contract_id=$contract_id&stall_id=$stall_id");
    }else{
        echo mysqli_error($link);
    }