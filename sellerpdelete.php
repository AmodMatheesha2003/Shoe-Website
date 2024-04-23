<?php
    include "conf.php";

    if(isset($_POST["submit"])){
        $id = $_POST["id"];

      
        $check_query = "SELECT * FROM shoes WHERE id = '$id'";
        $check_result = mysqli_query($con, $check_query);

        if(mysqli_num_rows($check_result) > 0) {
          
            $delete_query = "DELETE FROM shoes WHERE id = '$id'";
            $delete_result = mysqli_query($con, $delete_query);

            if($delete_result){
                echo "Record with ID $id deleted successfully";
            }
            else{
                echo "Failed to delete record with ID $id";
            }
        } else {
           
            echo "Record with ID $id does not exist";
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
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
        }

        h1 {
        text-align: center;
        margin-top: 20px;
        }

        form {
        /* width: 60%; */
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
        input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        }

        input[type="submit"] {
        /* width: 100%; */
        background-color:  red;
        color: #fff;
        padding: 15px 100px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }

        input[type="submit"]:hover {
        background-color:#D32F2F;
        }


            .container {
            text-align: center;
            margin: 20px; 
            display: flex;
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
            transition: background-color 0.3s; /* Added transition for smoother hover effect */
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
          position: fixed;
          right: 10%;
        }

        .left-container{
          background-color: yellowgreen;
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
        /*  */
        .del{
          background-color:red;
        }
        .del:hover{
          background-color:#D32F2F;
        }

    </style>
  </head>
  <body>
    <div class="main-container">
      <!--  -->
      <div class="left-container">
        <div class="container">
        <h1>PRODUCT</h1>
            <a href="sellerpadd.php" class="button ">Product Add</a>
            <a href="sellerpupdate.php" class="button">Product Update</a>
            <a href="sellerpsearch.php" class="button">Product View</a>
            <a href="sellerpdelete.php" class="button active">Product Delete</a>
            
        </div>

        <div class="container">
            
        </div>
        
        <div class="container">
            
            
        </div>
      </div>

      <div class="right-container">
      <h1>DELETE Product</h1>
    <form
      action="sellerpdelete.php"
      method="post"
      enctype="multipart/form-data"
      name="deleteProductForm"
    >
      <label for="id">Enter Product ID to Delete:</label>
      <input type="text" name="id" />

      <div class="form-bottom">
            
            <input type="submit" name="submit" value="Delete">
          </div>
          
        </form>
      </div>
    </div>
    

    <a href="Homepage.html" class="button button-goback">Logout</a>
    <!--  -->
    
  </body>
</html>
