<?php 
    require_once "config.php";

    $stall_id = $_GET['stall_id'];

    $sql_delete_stall = "DELETE FROM stalls WHERE stall_id = $stall_id";
    if(mysqli_query($link, $sql_delete_stall)){
        echo "Record deleted successfully! <br />";
    }else{
        echo "Delete attempt failed. <br />Error Message: " . mysqli_error($link) . "<br />";
    }

    mysqli_close($link);