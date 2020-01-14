<?php
     include_once("../include/include_app.php");
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['cus_email'],$_POST['cus_password'],$_POST['_token'])){
            if(Token::check($_POST['_token'])){
                $cus_email = $_POST['cus_email'];
                $cus_passwordT = encode($_POST['cus_password'],LIAM_COINS_KEY);
                
                $sqlCustomer = "SELECT * FROM `lc_customer` WHERE `email` = '".$cus_email."' AND `password` = '".$cus_passwordT."' AND `status` = '1' LIMIT 1";
                $quCustomer = mysqli_query($conn,$sqlCustomer);
                $rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);

                if($rowCustomer['id'] != ""){

                    $_SESSION['cus_email'] = $rowCustomer['email'];
                    $_SESSION['cus_name'] = $rowCustomer['name'];
                    $_SESSION['cus_fname'] = $rowCustomer['fname'];
                    $_SESSION['cus_lname'] = $rowCustomer['lname'];

                    header("Location:../my-account.php?action=success");
                }else{
                    header("Location:../login.php?action=failure");
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