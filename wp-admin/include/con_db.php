<?php

    //DEV
    $conn = mysqli_connect("localhost","root","","liam_coins");
    
    //Live
    //$conn = mysqli_connect("localhost","omegaint_liamcoins","MmDu3rt3","omegaint_liamcoins");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    @mysqli_query($conn,"SET NAMES UTF8");
?>