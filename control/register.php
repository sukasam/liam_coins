<?php
     include_once("../include/include_app.php");
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['cus_email'],$_POST['cus_password'],$_POST['_token'])){
            if(Token::check($_POST['_token'])){
                $cus_email = $_POST['cus_email'];
                $cus_passwordT = encode($_POST['cus_password'],LIAM_COINS_KEY);
                
                $sqlCustomer = "SELECT * FROM `lc_customer` WHERE `email` = '".$cus_email."' AND `status` = '1' LIMIT 1";
                $quCustomer = mysqli_query($conn,$sqlCustomer);
                $rowCustomer = mysqli_fetch_array($quCustomer, MYSQLI_ASSOC);

                if(empty($rowCustomer['id'])){
                    
                    $sqlCus = "INSERT INTO `lc_customer` (`id`, `email`, `password`, `status`) VALUES (NULL, '".$cus_email."', '".$cus_passwordT."', '1');";
                    @mysqli_query($conn,$sqlCus);
                    
                    $_SESSION['cus_email'] = $cus_email;

                    header("Location:../my-account.php?action=success");
                }else{
                    header("Location:../register.php?action=failure");
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