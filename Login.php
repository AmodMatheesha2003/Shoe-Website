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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .result-container {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success {
            color: #4caf50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .error {
            color: #f44336;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .gomanager {
            background-color: #4CAF50; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
        }

        .gomanager:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
    <div class="result-container">
        <?php
        
        include 'conf.php';

        
        if (!$con) {
            
            die("Connection failed: " . mysqli_connect_error());
        }

       
        $username = $_POST['username'];
        $password = $_POST['userpassword'];
        

        
        $sql = "SELECT * FROM coustomerdetail WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($con, $sql);

        if ($result) {
            
            if (mysqli_num_rows($result) > 0) {
               
                
                    echo '<h2 class="success">Login successful!</h2>';
                    echo '<p>Welcome, ' . $username . '!</p>';
                    echo '<button onclick="goTomanagerPage()" class="gomanager">Go to Product Page</button>';
               
                
            } else {
                
                echo '<h2 class="error">Invalid username or password.</h2>';
                echo '<p>Don\'t have an account? <a href="cregistration.php">Create one</a></p>';
                echo '<button onclick="goback()" class="gomanager">Home</button>';
            }
        } else {
            
            echo '<h2 class="error">An error occurred while processing your request.</h2>';
            
        }

        mysqli_close($con);
        ?>

       
        
    </div>

    <script>
        
        function goTomanagerPage() {
            window.location.href = "product.php"; 
        }
       
        function goback() {
            window.location.href = "Homepage.html"; 
        }
        
    </script>
</body>
</html>
