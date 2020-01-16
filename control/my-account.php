<?php
     include_once("../include/include_app.php");
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['_token'])){
            if(Token::check($_POST['_token'])){

                $sqlCustomer = "SELECT * FROM `lc_customer` WHERE `id` = '".$_SESSION['cus_id']."' LIMIT 1";
                $quCustomer = mysqli_query($conn,$sqlCustomer);
                $rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);

                if($rowCustomer['id']){

                    $cus_fname = mysqli_real_escape_string($conn,$_POST['cus_fname']);
                    $cus_lname = mysqli_real_escape_string($conn,$_POST['cus_lname']);
                    $cus_name = mysqli_real_escape_string($conn,$_POST['cus_name']);
                    $cus_email = mysqli_real_escape_string($conn,$_POST['cus_email']);

                    $sqlCustomerU = "UPDATE `lc_customer` SET `email` = '".$cus_email."', `fname` = '".$cus_fname."', `lname` = '".$cus_lname."', `name` = '".$cus_name."' WHERE `id` = '".$rowCustomer['id']."'";
                    mysqli_query($conn,$sqlCustomerU);

                    if(isset($_POST['cus_password']) && $_POST['cus_password'] != ""){

                        $cus_password = mysqli_real_escape_string($conn,encode($_POST['cus_password'],LIAM_COINS_KEY));
                        $cus_password_new = mysqli_real_escape_string($conn,encode($_POST['cus_password_new'],LIAM_COINS_KEY));
                        $cus_password_confirm = mysqli_real_escape_string($conn,encode($_POST['cus_password_confirm'],LIAM_COINS_KEY));

                        if($cus_password === $rowCustomer['password']){
                            if($cus_password_new === $cus_password_confirm){

                                $sqlCustomerU = "UPDATE `lc_customer` SET `password` = '".$cus_password_new."' WHERE `id` = '".$rowCustomer['id']."'";
                                mysqli_query($conn,$sqlCustomerU);

                                header("Location:../my-account.php?action=success");
                            }else{
                                header("Location:../my-account.php?action=failure&error=2");
                            }
                        }else{
                            header("Location:../my-account.php?action=failure&error=1");
                        }
                    }else{
                        header("Location:../my-account.php?action=success");
                    }
                    

                    
                }else{
                    die();
                }
            }else{
                die();
            }
        }else{
            die();
        }
    }else{
        die();
    }
?>