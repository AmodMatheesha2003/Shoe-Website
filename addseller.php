<?php
    include 'conf.php';

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username= $_POST["username"];
    $password= $_POST["password"];
    $NIC= $_POST["NIC"];
    $type= $_POST["type"];

    
    $sql = "INSERT INTO registeremployee (firstname,lastname,username,password,NIC,type) VALUES ('$firstname','$lastname','$username','$password','$NIC','$type')";

    if(mysqli_query($conn,$sql)){
        echo "new record create successfully";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($conn);
    }
    mysqli_close($conn);
?>