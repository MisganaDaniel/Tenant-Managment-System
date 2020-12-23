<?php
    require_once "config.php";

    $a = $b = "";
    $stall_id = $_GET['stall_id'];
    $stall_price = $_POST['stall_price'];
    $price_date_effectivity = $_POST['price_date_effectivity'];
    $old_price_date = strtotime($price_date_effectivity);
    $new_price_date = date('Y-m-d H:i:s', $old_price_date);
    
    if(!empty($stall_price) && !empty($price_date_effectivity)){
        $sql_update_price = "UPDATE stalls
        SET stall_price = $stall_price, price_date_effectivity = '$price_date_effectivity'
        WHERE stall_id = $stall_id";
        if(mysqli_query($link, $sql_update_price)){
            echo "Price updated successfully! <br />";
            $a++;
        }
    }

    if($a == 1){
        // Redirect back to the page
        header("Refresh: 2; url= ../admin-stalls.php");
    }
    
    mysqli_close($link);
    