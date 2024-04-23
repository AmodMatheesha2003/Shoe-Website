<?php
    include "conf.php";

    if(isset($_POST["submit"])){
        $tittle = $_POST["imgtittle"];
        $des = $_POST["des"];
        $pprice = $_POST["pprice"];
        $nprice = $_POST["nprice"];

        if(!empty($_FILES["image"]["name"])){
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'webp');
            if(in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                $sql = "INSERT INTO shoes (img, imgtittle, imgdescription, pprice, nprice) VALUES('$imgContent', '$tittle', '$des', '$pprice', '$nprice')";
                $result = mysqli_query($con, $sql);

                if($result){
                    echo "File uploaded successfully";
                }
                else{
                    echo "File upload failed, please try again!";
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
      
      <div class="left-container">
        <div class="container">
            <h1>PRODUCT</h1>
            <a href="padd.php" class="button active">Product Add</a>
            <a href="pupdate.php" class="button">Product Update</a>
            <a href="psearch.php" class="button">Product View</a>
            <a href="pdelete.php" class="button del">Product Delete</a>
            
        </div>

        <div class="container">
            <h1>WORKERS</h1>
            <a href="wadd.php" class="button">Workers Add</a>
            <a href="wupdate.php" class="button">Workers Update</a>
            <a href="wsearch.php" class="button">Workers View</a>
            <a href="wdelete.php" class="button del">Workers Delete</a>
            <a href="wtoapprove.php" class="button">Workers Approve</a>
        </div>
        
        <div class="container">
            <h1>COUSTOMER</h1>
            <a href="cadd.php" class="button">Coustomer Add</a>
            <a href="cupdate.php" class="button">Coustomer Update</a>
            <a href="csearch.php" class="button">Coustomer View</a>
            <a href="cdelete.php" class="button del">Coustomer Delete</a>
            <a href="viewcontactus.php" class="button">Coustomer Review</a>
            
        </div>
        
      </div>

      <div class="right-container">
        <h1>PRODUCT ADD</h1>
        <form
          action="padd.php"
          method="post"
          enctype="multipart/form-data"
          name="addProductForm"
        >

          <label for="imgtittle">Product Name:</label>
          <input type="text" name="imgtittle" />
   
          <label for="des">Description:</label>
          <input type="text" name="des" />

          <label for="pprice">Previous price:</label>
          <input type="text" name="pprice" />

          <label for="nprice">New price</label>
          <input type="text" name="nprice" />

          <label for="image">Image</label>
          <input type="file" name="image" />

          <div class="form-bottom">
           
            <input type="submit" name="submit">
          </div>
          
        </form>
      </div>
    </div>
    

    <a href="Homepage.html" class="button button-goback">Logout</a>
    
    
  </body>
</html>
