<?php
    include "conf.php";

    if(isset($_POST["submit"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $nic = $_POST["nic"];
        $type = $_POST["type"];

        
        $username = strtolower($firstname . $lastname);

        if(!empty($_FILES["image"]["name"])){
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $status ='to approve';
            $allowTypes = array('jpg', 'png', 'jpeg', 'webp');
            if(in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                $sql = "INSERT INTO registeremployee (firstname, lastname, username, password, NIC, type, image,status) VALUES('$firstname', '$lastname', '$username', '$password', '$nic', '$type', '$imgContent','$status')";
                $result = mysqli_query($con, $sql);

                if($result){
                    echo "Worker registered successfully";
                }
                else{
                    echo "Worker registration failed, please try again!";
                }
            }
            else{
                echo "Sorry, only JPG, JPEG & PNG files are allowed to upload!";
            }
        }
        else{
            echo "Please select an image file to upload!";
        }
    }

    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/footlogo.png">
    <title>FootFiesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .button-goback {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .button-goback:hover {
            background-color: #005f6b;
        }
    </style>
</head>
<body>
    <h1>Worker Registration</h1>
    <form id="workerForm" action="registerseller.php" method="post" enctype="multipart/form-data">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" readonly>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="nic">NIC:</label>
        <input type="text" name="nic" required>

        <label for="type">Type:</label>
        <select name="type" required>
            <option value="seller">Seller</option>
            <option value="manager">Manager</option>
        </select>

        <label for="image">Image:</label>
        <input type="file" name="image" required>

        <input type="submit" name="submit">
        <br><br><br><br>
        <a href="Homepage.html" class="button button-goback">Go Back</a>
    </form>

    <script>
        
        function generateUsername() {
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var usernameField = document.getElementById("username");
            
            var username = (firstname + lastname).toLowerCase();
            usernameField.value = username; 
        }

       
        document.getElementById("firstname").addEventListener("input", generateUsername);
        document.getElementById("lastname").addEventListener("input", generateUsername);
    </script>
</body>
</html>
