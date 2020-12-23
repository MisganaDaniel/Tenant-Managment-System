<?php 
    require_once "config.php";

    $email = $_POST['email'];
    $fetched_client_id = "";

    if(!empty($_POST['email'])){
        $sql_compare_email = "SELECT * FROM client WHERE email = '$email'";
        if($result_compare_email = mysqli_query($link, $sql_compare_email)){
            if (mysqli_num_rows($result_compare_email) > 0) {
                while($row_compare_email = mysqli_fetch_assoc($result_compare_email)) {
                    $queried_email = $row_compare_email['email'];
                    $fetched_client_id = $row_compare_email['client_id'];

                    // For the sake of knowing the code runs and it exists
                    echo "Successful";
                    if($email == $queried_email){
                        echo "<br>s";
                    }

                    header("location: ../old-user.php?client_id=$fetched_client_id");
                }
            }else{
                // For the sake of knowing the email does not exist but the code works
                echo "Email does not exist.<br>";
            }
            
        }
    }

    // Just to check if the client id was fetched from the while loop
    echo $fetched_client_id;

    mysqli_close($link);
    