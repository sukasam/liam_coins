<?php
     include_once("../include/include_app.php");
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['cus_email'],$_POST['cus_password'],$_POST['_token'])){
            if(Token::check($_POST['_token'])){

                $cus_email = mysqli_real_escape_string($conn,$_POST['cus_email']);
                $cus_passwordT = mysqli_real_escape_string($conn,encode($_POST['cus_password'],LIAM_COINS_KEY));
                $sqlCustomer = "SELECT * FROM `lc_customer` WHERE 1 AND (`cus_email` = '".$cus_email."' OR `cus_username` = '".$cus_email."')  AND `cus_password` = '".$cus_passwordT."' AND `status` = '1' LIMIT 1";
                $quCustomer = mysqli_query($conn,$sqlCustomer);
                $rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);
                
                if($rowCustomer['id'] != ""){
                    
                    $_SESSION['cus_id'] = $rowCustomer['id'];
                    
                    $cus_token = TokenLogin::generate();
                    $sqlCusUpdate= "UPDATE `lc_customer` SET `login_token` = '".$cus_token."' WHERE `id` = ".$rowCustomer['id'].";";
                    mysqli_query($conn,$sqlCusUpdate);
                
                    if(isset($_POST['redirect'])){
                        header("Location:../".$_POST['redirect']."?action=success");
                    }else{
                        header("Location:../my-account.php");
                    }
                    
                }else{
                    if(isset($_POST['redirect'])){
                        header("Location:../".$_POST['redirect']."?action=failure");
                    }else{
                        header("Location:../login.php?action=failure");
                    }
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