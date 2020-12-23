<?php
    require_once "config.php";

    $rentp_id = $_POST['rentp_id'];
    $contract_id = $_GET['contract_id'];
    $stall_id = $_POST['stall_id'];

    if(!empty($_POST['rent_month'])){
        $rent_month = $_POST['rent_month'];

        $sql_set_month = "UPDATE rental_payment SET rent_month = '$rent_month' WHERE rentp_id = $rentp_id";
        if(mysqli_query($link, $sql_set_month)){
            echo "Rent month updated successfully. <br />";
            header("Refresh: 1; url=../admin-view-contract-details.php?contract_id=$contract_id");
        }else{
            echo "Error, can't update. ERROR MSG (" . mysqli_error($link) . ") <br />";
        }
    }

    $sql_amount = "SELECT * FROM stalls WHERE stall_id = $stall_id";
    $result_amount = mysqli_query($link, $sql_amount);
    $amount_paid = "";
    if(mysqli_num_rows($result_amount) > 0){
        while($row_amount = mysqli_fetch_assoc($result_amount)){
            $amount_paid = $row_amount['stall_price'];
        }
    }

    if(!empty($amount_paid)){
        $timezone = date_default_timezone_get();

        $sql_pay = "UPDATE rental_payment SET amount_paid = amount_paid + $amount_paid, 
        balance = balance - $amount_paid, date_paid = NOW() WHERE rentp_id = $rentp_id";
        if(mysqli_query($link, $sql_pay)){
            echo "Payment successful! <br />";
            $sql_paid = "UPDATE rental_payment_details SET paid = 'True' WHERE stall_id = $stall_id AND rentp_id = $rentp_id";
            mysqli_query($link, $sql_paid);
            
            header("Refresh: 1; url=../admin-view-contract-details.php?contract_id=$contract_id");
        }else{
            echo "fuck" . mysqli_error($link);
        }
    }


