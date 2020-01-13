<?php

    $conn = mysqli_connect("localhost","root","","liam_coins");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    @mysqli_query($conn,"SET NAMES UTF8");
?>