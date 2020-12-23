<?php
    require_once "config.php";

    $floor_no = $_POST['floor_no'];
    $block_no = $_POST['block_no'];
    $block_dimension = $_POST['block_dimension'];
    $stall_price = $_POST['stall_price'];
    $price_date_effectivity = $_POST['price_date_effectivity'];

    $sql_create_stall = "INSERT INTO stalls (floor_no, block_no, block_dimension, stall_price, price_date_effectivity)
    VALUES ($floor_no, '$block_no', '$block_dimension', $stall_price, '$price_date_effectivity')";

    if(mysqli_query($link, $sql_create_stall)){
        echo "Record created. <br />";

        header("Refresh: 2; url = ../admin-stalls.php");
    }
    
    mysqli_close($link);