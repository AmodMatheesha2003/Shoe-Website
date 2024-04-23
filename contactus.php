<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/footlogo.png">
    <title>FootFiesta</title>
    <style>
        #loginButton {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            margin-right: 10px;
        }

        #loginButton:hover {
            background-color: #45a049;
        }

        .message-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 20px;
            border-radius: 5px;
            width: fit-content;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        #goBackButtonContainer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php

include "conf.php";


if(isset($_POST["submit"])) {
 
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $country = mysqli_real_escape_string($con, $_POST["country"]); 
    $subject = mysqli_real_escape_string($con, $_POST["subject"]); 

   
    $sql = "INSERT INTO contactinfo (firstname, lastname, country, subject) VALUES ('$firstname', '$lastname', '$country', '$subject')"; 

  
    $result = mysqli_query($con, $sql);

 
    if($result) {
        echo '<div class="message-container success-message"><p>Thank you for your feedback.</p></div>';
    } else {
        echo '<div class="message-container error-message"><p>Error: ' . mysqli_error($con) . '</p></div>';
    }
}


mysqli_close($con);
?>

<div id="goBackButtonContainer">
    <a href="Homepage.html"><button id="loginButton">Go Back</button></a>
</div>

</body>
</html>
