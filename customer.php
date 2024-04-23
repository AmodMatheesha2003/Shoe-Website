<?php
    include 'conf.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $phonenumber= $_POST["phonenumber"];
    $address= $_POST["address"];

    $sql = "INSERT INTO coustomerdetail (username,password,phonenumber,address) VALUES ('$username','$password','$phonenumber','$address')";

    if(mysqli_query($conn,$sql)){
        echo "new record create successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
?>