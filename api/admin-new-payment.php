<?php
    require_once "config.php";

    $contract_id = $_GET['contract_id'];
    $stall_id_1 = $stall_id_2 = $stall_id_3 = $stall_id_4 = $stall_id_5 = "";
    $total_amount = "";

    $sql_select_stalls = "SELECT * FROM occupied_stalls WHERE contract_id = $contract_id";
    $result_stalls = mysqli_query($link, $sql_select_stalls);
    if(mysqli_num_rows($result_stalls) > 0 ){

        // The first stall, first row
        $sql_select_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id LIMIT 0,1";
        $result_stalls = mysqli_query($link, $sql_select_stalls);
        if(mysqli_num_rows($result_stalls) > 0 ){
            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                $stall_id_1 = $row_stalls['stall_id'];
                $total_amount = $total_amount + $row_stalls['stall_price'];
            }
        }

        // The second stall, second row
        $sql_select_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id LIMIT 1,1";
        $result_stalls = mysqli_query($link, $sql_select_stalls);
        if(mysqli_num_rows($result_stalls) > 0 ){
            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                $stall_id_2 = $row_stalls['stall_id'];
                $total_amount = $total_amount + $row_stalls['stall_price'];
            }
        }

        // The third stall, third row
        $sql_select_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id LIMIT 2,1";
        $result_stalls = mysqli_query($link, $sql_select_stalls);
        if(mysqli_num_rows($result_stalls) > 0 ){
            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                $stall_id_3 = $row_stalls['stall_id'];
                $total_amount = $total_amount + $row_stalls['stall_price'];
            }
        }

        // The fourth stall, fourth row
        $sql_select_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id LIMIT 3,1";
        $result_stalls = mysqli_query($link, $sql_select_stalls);
        if(mysqli_num_rows($result_stalls) > 0 ){
            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                $stall_id_4 = $row_stalls['stall_id'];
                $total_amount = $total_amount + $row_stalls['stall_price'];
            }
        }

        // The fifth stall, fifth row
        $sql_select_stalls = "SELECT * FROM occupied_stalls os INNER JOIN stalls s ON os.stall_id = s.stall_id WHERE contract_id = $contract_id LIMIT 4,1";
        $result_stalls = mysqli_query($link, $sql_select_stalls);
        if(mysqli_num_rows($result_stalls) > 0 ){
            while($row_stalls = mysqli_fetch_assoc($result_stalls)){
                $stall_id_5 = $row_stalls['stall_id'];
                $total_amount = $total_amount + $row_stalls['stall_price'];
            }
        }

    }
    
    $sql_new_payment = "INSERT INTO rental_payment (contract_id) VALUES ($contract_id)";
    if(mysqli_query($link, $sql_new_payment)){
        $rentp_id = mysqli_insert_id($link);
                        
                        if(!empty($stall_id_1)){
                            $sql_rent_details_1 = "INSERT INTO rental_payment_details (rentp_id, stall_id) VALUES ($rentp_id, $stall_id_1)";
                            mysqli_query($link, $sql_rent_details_1);
                        }
                        if(!empty($stall_id_2)){
                            $sql_rent_details_2 = "INSERT INTO rental_payment_details (rentp_id, stall_id) VALUES ($rentp_id, $stall_id_2)";
                            mysqli_query($link, $sql_rent_details_2);
                        }
                        if(!empty($stall_id_3)){
                            $sql_rent_details_3 = "INSERT INTO rental_payment_details (rentp_id, stall_id) VALUES ($rentp_id, $stall_id_3)";
                            mysqli_query($link, $sql_rent_details_3);
                        }
                        if(!empty($stall_id_4)){
                            $sql_rent_details_4 = "INSERT INTO rental_payment_details (rentp_id, stall_id) VALUES ($rentp_id, $stall_id_4)";
                            mysqli_query($link, $sql_rent_details_4);
                        }
                        if(!empty($stall_id_5)){
                            $sql_rent_details_5 = "INSERT INTO rental_payment_details (rentp_id, stall_id) VALUES ($rentp_id, $stall_id_5)";
                            mysqli_query($link, $sql_rent_details_5);
                        }

        header("Refresh: 1; url= ../admin-view-contract-details.php?contract_id=$contract_id");
    }else{
        echo "Nay";
    }