<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Status</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      padding: 20px;
      text-align: center;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      color: #666;
      margin-bottom: 20px;
    }

    .success {
      color: green;
      font-weight: bold;
    }

    .error {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
      
      include 'conf.php';

      
      $id = $_GET['id'];

      
      $sql = "UPDATE registeremployee SET status = 'decline' WHERE id = $id";
      if ($con->query($sql) === TRUE) {
          echo "<p class='success'>Status updated successfully to 'decline' for ID: $id</p>";
      } else {
          echo "<p class='error'>Error updating status: " . $con->error . "</p>";
      }

      
      $con->close();
    ?>
  </div>
</body>
</html>
