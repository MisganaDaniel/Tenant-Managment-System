<?php
    require_once "config.php";

    $app_id = "";

    if(!empty($_GET['app_id'])){
        $app_id = $_GET['app_id'];

        $sql_approve = "UPDATE applied_stall 
        SET application_status = 'Disapproved'
        WHERE app_id = $app_id";
        if(mysqli_query($link,$sql_approve)){
            echo "Record udpated successfully! <br />";
            header("Refresh:2; url=../admin-view-applied-stall.php?app_id=$app_id");
        }else{
            echo "It failed. <br />Error Message: (" . mysqli_error($link) . ") <br />";
        }
    }

    mysqli_close($link);
    
