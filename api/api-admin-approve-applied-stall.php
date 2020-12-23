<?php
    require_once "config.php";

    $app_id = "";

    if(!empty($_GET['app_id'])){
        $app_id = $_GET['app_id'];

        $sql_approve = "UPDATE applied_stall 
        SET application_status = 'Approved'
        WHERE app_id = $app_id";
        if(mysqli_query($link,$sql_approve)){
            echo "Record udpated successfully! <br />";
            // header("Refresh:2; url=../admin-view-applied-stall.php?app_id=$app_id");

            $sql_trigger_contract = "SELECT * FROM applied_stall WHERE app_id = $app_id";
            // Declare variables to place values from while-loop
            $client_id = $category_id = $business_name = $contract_term = $start_date = $end_date = "";
        
            $result_trigger = mysqli_query($link,$sql_trigger_contract);
            if(mysqli_num_rows($result_trigger) > 0 ){
                while($row_trigger = mysqli_fetch_assoc($result_trigger)){
                    $client_id = $row_trigger['client_id'];
                    $category_id = $row_trigger['category_id'];
                    $business_name = $row_trigger['business_name'];
                    $contract_term = $row_trigger['applied_term'];
                    $start_date = $row_trigger['start_date'];
                    $end_date = $row_trigger['end_date'];
                }

                if(!empty($client_id) && !empty($category_id) && !empty($business_name) && !empty($contract_term) && !empty($start_date) && !empty($end_date)){
                    $sql_insert_trigger = "INSERT INTO contract (client_id, app_id, category_id, business_name, contract_term, start_date, end_date, remark, verified)
                    VALUES ($client_id, $app_id, $category_id, '$business_name', '$contract_term', '$start_date', '$end_date', 'Confirmed', 'True')";
                    if(mysqli_query($link, $sql_insert_trigger)){
                        $contract_id = mysqli_insert_id($link);
                        echo "Successful!";

                        $total_amount = "";

                        // Automation to occupy only Approved stall; 1
                        $sql_applied_stall_1 = "SELECT * FROM applied_stall_details WHERE app_id = $app_id LIMIT 0,1";
                        if(!empty($result_applied_stall_1 = mysqli_query($link, $sql_applied_stall_1))){
                            $stall_id_1 = $remark_1 = "";

                            while($row_applied_stall_1 = mysqli_fetch_assoc($result_applied_stall_1)){
                                $stall_id_1 = $row_applied_stall_1['stall_id'];
                                $remark_1 = $row_applied_stall_1['stall_application_status'];
                            }

                                if($remark_1 == 'Approved'){
                                    $sql_occupy_stall_1 = "UPDATE occupied_stalls SET contract_id = $contract_id 
                                    WHERE stall_id = $stall_id_1 AND contract_id IS NULL";
                                    mysqli_query($link, $sql_occupy_stall_1);

                                    $sql_total_amount_1 = "SELECT * FROM stalls WHERE stall_id = $stall_id_1";
                                    $result_total_amount_1 = mysqli_query($link, $sql_total_amount_1);
                                    if(mysqli_num_rows($result_total_amount_1) > 0 ){
                                        while($row_total_amount_1 = mysqli_fetch_assoc($result_total_amount_1)){
                                            $total_amount = $total_amount + $row_total_amount_1['stall_price'];
                                        }
                                    }
                                }
                        }else{
                            echo "It failed. Error Message: " . mysqli_error($link) . "<br />";
                        }
                        

                        // Automation to occupy only Approved stall; 2
                        $sql_applied_stall_2 = "SELECT * FROM applied_stall_details WHERE app_id = $app_id LIMIT 1,1";
                        if(!empty($result_applied_stall_2 = mysqli_query($link, $sql_applied_stall_2))){
                            $stall_id_2 = $remark_2 = "";

                            while($row_applied_stall_2 = mysqli_fetch_assoc($result_applied_stall_2)){
                                $stall_id_2 = $row_applied_stall_2['stall_id'];
                                $remark_2 = $row_applied_stall_2['stall_application_status'];
                            }

                                if($remark_2 == 'Approved'){
                                    $sql_occupy_stall_2 = "UPDATE occupied_stalls SET contract_id = $contract_id 
                                    WHERE stall_id = $stall_id_2 AND contract_id IS NULL";
                                    mysqli_query($link, $sql_occupy_stall_2);

                                    $sql_total_amount_2 = "SELECT * FROM stalls WHERE stall_id = $stall_id_2";
                                    $result_total_amount_2 = mysqli_query($link, $sql_total_amount_2);
                                    if(mysqli_num_rows($result_total_amount_2) > 0 ){
                                        while($row_total_amount_2 = mysqli_fetch_assoc($result_total_amount_2)){
                                            $total_amount = $total_amount + $row_total_amount_2['stall_price'];
                                        }
                                    }
                                }
                        }else{
                            echo "It failed. Error Message: " . mysqli_error($link) . "<br />";
                        } 
                        
                        // Automation to occupy only Approved stall; 3
                        $sql_applied_stall_3 = "SELECT * FROM applied_stall_details WHERE app_id = $app_id LIMIT 2,1";
                        if(!empty($result_applied_stall_3 = mysqli_query($link, $sql_applied_stall_3))){
                            $stall_id_3 = $remark_3 = "";

                            while($row_applied_stall_3 = mysqli_fetch_assoc($result_applied_stall_3)){
                                $stall_id_3 = $row_applied_stall_3['stall_id'];
                                $remark_3 = $row_applied_stall_3['stall_application_status'];
                            }

                                if($remark_3 == 'Approved'){
                                    $sql_occupy_stall_3 = "UPDATE occupied_stalls SET contract_id = $contract_id 
                                    WHERE stall_id = $stall_id_3 AND contract_id IS NULL";
                                    mysqli_query($link, $sql_occupy_stall_3);

                                    $sql_total_amount_3 = "SELECT * FROM stalls WHERE stall_id = $stall_id_3";
                                    $result_total_amount_3 = mysqli_query($link, $sql_total_amount_3);
                                    if(mysqli_num_rows($result_total_amount_3) > 0 ){
                                        while($row_total_amount_3 = mysqli_fetch_assoc($result_total_amount_3)){
                                            $total_amount = $total_amount + $row_total_amount_3['stall_price'];
                                        }
                                    }
                                }
                        }else{
                            echo "It failed. Error Message: " . mysqli_error($link) . "<br />";
                        }

                        // Automation to occupy only Approved stall; 4
                        $sql_applied_stall_4 = "SELECT * FROM applied_stall_details WHERE app_id = $app_id LIMIT 3,1";
                        if(!empty($result_applied_stall_4 = mysqli_query($link, $sql_applied_stall_4))){
                            $stall_id_4 = $remark_4 = "";

                            while($row_applied_stall_4 = mysqli_fetch_assoc($result_applied_stall_4)){
                                $stall_id_4 = $row_applied_stall_4['stall_id'];
                                $remark_4 = $row_applied_stall_4['stall_application_status'];
                            }

                                if($remark_4 == 'Approved'){
                                    $sql_occupy_stall_4 = "UPDATE occupied_stalls SET contract_id = $contract_id 
                                    WHERE stall_id = $stall_id_4 AND contract_id IS NULL";
                                    mysqli_query($link, $sql_occupy_stall_4);

                                    $sql_total_amount_4 = "SELECT * FROM stalls WHERE stall_id = $stall_id_4";
                                    $result_total_amount_4 = mysqli_query($link, $sql_total_amount_4);
                                    if(mysqli_num_rows($result_total_amount_4) > 0 ){
                                        while($row_total_amount_4 = mysqli_fetch_assoc($result_total_amount_4)){
                                            $total_amount = $total_amount + $row_total_amount_4['stall_price'];
                                        }
                                    }
                                }
                        }else{
                            echo "It failed. Error Message: " . mysqli_error($link) . "<br />";
                        }

                        // Automation to occupy only Approved stall; 5
                        $sql_applied_stall_5 = "SELECT * FROM applied_stall_details WHERE app_id = $app_id LIMIT 4,1";
                        if(!empty($result_applied_stall_5 = mysqli_query($link, $sql_applied_stall_5))){
                            $stall_id_5 = $remark_5 = "";

                            while($row_applied_stall_5 = mysqli_fetch_assoc($result_applied_stall_5)){
                                $stall_id_5 = $row_applied_stall_5['stall_id'];
                                $remark_5 = $row_applied_stall_5['stall_application_status'];
                            }

                                if($remark_5 == 'Approved'){
                                    $sql_occupy_stall_5 = "UPDATE occupied_stalls SET contract_id = $contract_id 
                                    WHERE stall_id = $stall_id_5 AND contract_id IS NULL";
                                    mysqli_query($link, $sql_occupy_stall_5);

                                    $sql_total_amount_5 = "SELECT * FROM stalls WHERE stall_id = $stall_id_5";
                                    $result_total_amount_5 = mysqli_query($link, $sql_total_amount_5);
                                    if(mysqli_num_rows($result_total_amount_5) > 0 ){
                                        while($row_total_amount_5 = mysqli_fetch_assoc($result_total_amount_5)){
                                            $total_amount = $total_amount + $row_total_amount_5['stall_price'];
                                        }
                                    }
                                }
                        }else{
                            echo "It failed. Error Message: " . mysqli_error($link) . "<br />";
                        }

                        header("Refresh:2; url=../admin-view-applied-stall.php?app_id=$app_id");
                    }else{
                        echo "It failed boi." . mysqli_error($link);
                    }

                    $sql_insert_rent = "INSERT INTO rental_payment (contract_id) VALUES ($contract_id)";
                    if(mysqli_query($link, $sql_insert_rent)){
                        $rentp_id = mysqli_insert_id($link);
                        
                        if(!empty($stall_id_1)){
                            $balance_1 = "";
                            $sql_balance_1 = "SELECT * FROM stalls WHERE stall_id = $stall_id_1";
                            $result_balance_1 = mysqli_query($link, $sql_balance_1);
                            if(mysqli_num_rows($result_balance_1) > 0 ){
                                while($row_balance_1 = mysqli_fetch_assoc($result_balance_1)){
                                    $balance_1 = $row_balance_1['stall_price'];
                                }
                            }

                            $sql_rent_details_1 = "INSERT INTO rental_payment_details (rentp_id, stall_id, balance) VALUES ($rentp_id, $stall_id_1, $balance_1)";
                            mysqli_query($link, $sql_rent_details_1);
                        }
                        if(!empty($stall_id_2)){
                            $balance_2 = "";
                            $sql_balance_2 = "SELECT * FROM stalls WHERE stall_id = $stall_id_2";
                            $result_balance_2 = mysqli_query($link, $sql_balance_2);
                            if(mysqli_num_rows($result_balance_2) > 0 ){
                                while($row_balance_2 = mysqli_fetch_assoc($result_balance_2)){
                                    $balance_2 = $row_balance_2['stall_price'];
                                }
                            }

                            $sql_rent_details_2 = "INSERT INTO rental_payment_details (rentp_id, stall_id, balance) VALUES ($rentp_id, $stall_id_2, $balance_2)";
                            mysqli_query($link, $sql_rent_details_2);
                        }
                        if(!empty($stall_id_3)){
                            $balance_3 = "";
                            $sql_balance_3 = "SELECT * FROM stalls WHERE stall_id = $stall_id_3";
                            $result_balance_3 = mysqli_query($link, $sql_balance_3);
                            if(mysqli_num_rows($result_balance_3) > 0 ){
                                while($row_balance_3 = mysqli_fetch_assoc($result_balance_3)){
                                    $balance_3 = $row_balance_3['stall_price'];
                                }
                            }

                            $sql_rent_details_3 = "INSERT INTO rental_payment_details (rentp_id, stall_id, balance) VALUES ($rentp_id, $stall_id_3, $balance_3)";
                            mysqli_query($link, $sql_rent_details_3);
                        }
                        if(!empty($stall_id_4)){
                            $balance_4 = "";
                            $sql_balance_4 = "SELECT * FROM stalls WHERE stall_id = $stall_id_4";
                            $result_balance_4 = mysqli_query($link, $sql_balance_4);
                            if(mysqli_num_rows($result_balance_4) > 0 ){
                                while($row_balance_4 = mysqli_fetch_assoc($result_balance_4)){
                                    $balance_4 = $row_balance_4['stall_price'];
                                }
                            }

                            $sql_rent_details_4 = "INSERT INTO rental_payment_details (rentp_id, stall_id, balance) VALUES ($rentp_id, $stall_id_4, $balance_4)";
                            mysqli_query($link, $sql_rent_details_4);
                        }
                        if(!empty($stall_id_5)){
                            $balance_5 = "";
                            $sql_balance_5 = "SELECT * FROM stalls WHERE stall_id = $stall_id_5";
                            $result_balance_5 = mysqli_query($link, $sql_balance_5);
                            if(mysqli_num_rows($result_balance_5) > 0 ){
                                while($row_balance_5 = mysqli_fetch_assoc($result_balance_5)){
                                    $balance_5 = $row_balance_5['stall_price'];
                                }
                            }

                            $sql_rent_details_5 = "INSERT INTO rental_payment_details (rentp_id, stall_id, balance) VALUES ($rentp_id, $stall_id_5, $balance_5)";
                            mysqli_query($link, $sql_rent_details_5);
                        }
                    }
                }
            }else{
                echo "It failed boi. <br />";
            }
        }else{
            echo "It failed. <br />Error Message: (" . mysqli_error($link) . ") <br />";
        }
    }

    mysqli_close($link);
    
