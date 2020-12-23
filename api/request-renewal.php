<?php 
    require_once "config.php";

    $renewal_term = $_POST['contract_term'];
    $contract_id = $_POST['contract_id'];
    $client_id = $_GET['client_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $renewal_id = $renewal_status = "";

    $sql_check = "SELECT * FROM renewal WHERE contract_id = $contract_id AND renewal_status = 'Sent'";
    $result_check = mysqli_query($link, $sql_check);
    $renewal_check = mysqli_num_rows($result_check);
    
    if(mysqli_num_rows($result_check) > 0 ){
        while($row_check = mysqli_fetch_assoc($result_check)){
            $renewal_id = $row_check['renewal_id'];
            $renewal_status = $row_check['renewal_status'];
        }
    }

    if($renewal_check){
        $sql_renewal = "UPDATE renewal SET renewal_status = 'Sent' WHERE renewal_id = $renewal_id";
        if(mysqli_query($link, $sql_renewal)){
            echo "Renewal updated successfully!";

            header ("Refresh: 1; url = ../client-renewal.php?client_id=$client_id");
        }
    }else{
        $sql_renewal = "INSERT INTO renewal (client_id, contract_id, renewal_term, start_date, end_date) VALUES ($client_id, $contract_id, '$renewal_term', '$start_date', '$end_date')";
        if(mysqli_query($link,$sql_renewal)){
            echo "Successfully.<br>";
            $renewal_id = mysqli_insert_id($link);
    
            $select_stalls = "SELECT app_id FROM contract WHERE contract_id = $contract_id";
            if($result_select_stalls = mysqli_query($link, $select_stalls)){
                if(mysqli_num_rows($result_select_stalls) > 0 ){
                    $app_id = "";
                    while($row_select_stalls = mysqli_fetch_assoc($result_select_stalls)){
                        $app_id = $row_select_stalls['app_id'];
                    }
                }
    
                $select_stalls_2 = "SELECT * FROM applied_stall_details WHERE app_id = $app_id AND stall_application_status = 'Approved'";
                if($result_select_stalls_2 = mysqli_query($link, $select_stalls_2)){
                    if(mysqli_num_rows($result_select_stalls_2) > 0 ){
                        while($row = mysqli_fetch_assoc($result_select_stalls_2)){
                            $stall_id = $row['stall_id'];
                            $sql_insert_stall = "INSERT INTO renewal_details (renewal_id, stall_id) VALUES ($renewal_id, $stall_id)";
                            mysqli_query($link, $sql_insert_stall);
                        }
                    }
                }
            }
    
            $sql_update_contract = "UPDATE contract SET renewal_status = 'Sent' WHERE contract_id = $contract_id";
            if(mysqli_query($link,$sql_update_contract)){
                echo "Updated successfully.<br>";
    
                header("location: ../client-renewal.php?client_id=$client_id");
            }else{
                echo "Update failed.<br>";
            }
            
        }else{
            echo "It failed.<br>" . mysqli_error($link);
        }
    
        mysqli_close($link);
    }


    
    
    