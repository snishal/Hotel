<?php
    $conn = new mysqli("localhost", "root", "snishal", "hotelcs");
    
    for($i = 1; $i<=10;$i++){
        $query = "insert into rooms values('$i','Standard Single Room');";
        $result = mysqli_query($conn,$query) or die("failed".mysql_error());
    }
    for($i = 11; $i<=20;$i++){
        $query = "insert into rooms values('$i','Standard Double Room');";
        $result = mysqli_query($conn,$query) or die("failed".mysql_error());
    }
    for($i = 21; $i<=30;$i++){
        $query = "insert into rooms values('$i','Deluxe Single Room');";
        $result = mysqli_query($conn,$query) or die("failed".mysql_error());
    }
    for($i = 31; $i<=40;$i++){
        $query = "insert into rooms values('$i','Deluxe Double Room');";
        $result = mysqli_query($conn,$query) or die("failed".mysql_error());
    }
    for($i = 41; $i<=50;$i++){
        $query = "insert into rooms values('$i','Super Deluxe Single Room');";
        $result = mysqli_query($conn,$query) or die("failed".mysql_error());
    }
    for($i = 51; $i<=60;$i++){
        $query = "insert into rooms values('$i','Super Deluxe Double Room');";
        $result = mysqli_query($conn,$query) or die("failed".mysql_error());
    }
?>
