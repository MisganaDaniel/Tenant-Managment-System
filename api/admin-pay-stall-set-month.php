<?php 
    include("config.php");

    $stall_id = $_GET['stall_id'];
    $contract_id = $_GET['contract_id'];
    $rentp_id = $_POST['rentp_id'];
    $rent_month = $_POST['rent_month'];
    $id = $_POST['id'];

    $sql_set = "UPDATE rental_payment_details SET rent_month = '$rent_month', date_paid = NULL
    WHERE rentp_id = $rentp_id AND stall_id = $stall_id AND id = $id";

    if(mysqli_query($link, $sql_set)){
        echo "Date is set! <br>";
        header("Refresh:2;url=../admin-pay-stall.php?contract_id=$contract_id&stall_id=$stall_id");
    }else{
        echo mysqli_error($link);
    }
    