<?php 
    include_once("include/include_app.php");

    unset($_SESSION['cart']);
    unset($_SESSION['qty']);

    header("Location:order-summary.php?orderID=".$_GET['orderID']);
?>