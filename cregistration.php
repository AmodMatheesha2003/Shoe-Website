<?php
    include "conf.php";

    if(isset($_POST["submit"])){
        $Firstname = $_POST["Firstname"];
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $phonenumber = $_POST["phonenumber"];
        $address = $_POST["address"];


        $username = strtolower($Firstname . $lastname);

        if(!empty($_FILES["image"]["name"])){
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $status ='approve';
            $allowTypes = array('jpg', 'png', 'jpeg', 'webp');
            if(in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                $sql = "INSERT INTO coustomerdetail (Firstname, lastname, username, password, phonenumber, address, image) VALUES ('$Firstname', '$lastname', '$username', '$password', '$phonenumber', '$address', '$imgContent')";
                $result = mysqli_query($con, $sql);

                if($result){
                    echo "Coustomer registered successfully";
                }
                else{
                    echo "Coustomer registration failed";
                }
            }
            else{
                echo "only JPG, JPEG & PNG files are allowed to upload!";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="image/footlogo.png">
    <title>FootFiesta</title>
    <style>
            body {
        font-family: Arial, sans-serif;
        background-color:#fff;
        margin: 0;
        padding: 0;
      }

      h1 {
        text-align: center;
        margin-top: 20px;
      }

      form {
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

      input[type="text"],input[type="password"],
      input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      input[type="submit"] {
        background-color:  #008CBA;
        color: #fff;
        padding: 15px 100px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color:dodgerblue;
      }


            .container {
            text-align: center;
            margin: 20px; 
           
            flex-direction: column;

            align-items: center;

        }
        
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s; 
        }
        
        .button:hover {
            background-color: #45a049;
        }
        
        .button-goback {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;

            margin-left: 100%;
            position: fixed;
            top: 10px;
            right: 10px;
        }
        
        .button-goback:hover {
            background-color: dodgerblue;
        }

        .container a{
          width: 10em;
        }

        .main-container{
          display: flex;
          position: relative;
        }

        .right-container{
          width: 60%;
          margin: 0 auto;
          /* position: fixed; */
          right: 10%;
        }

        .left-container{
          background-color: #fff;
        }

        body{
          background-color:#005f6b;
        }

        form{
          background-color:#2ECC71;
        }

        .active{
          background-color: #005f6b;
        }
        .active:hover{
          background-color:darkslategrey;
        }

        .form-bottom{
          display: flex;
          align-items: center;
          justify-content: space-between;
        }
 
        select[name="type"] {
            width: 200px;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select[name="type"] option {
            font-size: 16px;
            padding: 5px;
        }

        .del{
          background-color:red;
        }
        .del:hover{
          background-color:#D32F2F;
        }


    </style>
  </head>
  <body>
    
      

      <div class="right-container">
      <h1>Coustomer Registration</h1>
    <form id="coustomerForm" action="cregistration.php" method="post" enctype="multipart/form-data">
    <label for="Firstname">First Name:</label>
    <input type="text" id="Firstname" name="Firstname" required>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" readonly>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <label for="phonenumber">Phone Number:</label>
    <input type="text" name="phonenumber" required>

    <label for="address">Address:</label>
    <input type="text" name="address" required>

    <label for="image">Image:</label>
    <input type="file" name="image" required>

    <input type="submit" name="submit">
       
    </form>
      </div>
    
    

    
    <script>
       
        function generateUsername() {
            var firstname = document.getElementById("Firstname").value;
            var lastname = document.getElementById("lastname").value;
            var usernameField = document.getElementById("username");
           
            var username = (firstname + lastname).toLowerCase();
            usernameField.value = username; 
        }

        document.getElementById("Firstname").addEventListener("input", generateUsername);
        document.getElementById("lastname").addEventListener("input", generateUsername);
    </script>
  </body>
</html>
