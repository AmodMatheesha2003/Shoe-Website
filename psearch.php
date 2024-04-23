
    



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="image/footlogo.png">
    <title>FootFiesta</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        
        th {
            background-color:  #4CAF50;
            color: #333;
        }

        td:hover {
    background-color: #81C784; 
}

tr:hover td {
    background-color: #66BB6A; 
}

        img {
            max-width: 100px;
            max-height: 100px;
        }

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
  background-color: #4caf50;
  color: #fff;
  padding: 15px 100px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.goback {
  background-color: #008CBA;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  text-decoration: none;
}

.goback:hover{
            background-color:dodgerblue;
        }
/*  */
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
          
          right: 10%;
        }

        .left-container{
          background-color: yellowgreen;
        }

        body{
          background-color:#005f6b;
        }

        form{
          background-color: gray;
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
            <a href="padd.php" class="button ">Product Add</a>
            <a href="pupdate.php" class="button">Product Update</a>
            <a href="psearch.php" class="button active">Product View</a>
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
      <?php
        include "conf.php";
        $sql = "SELECT * FROM shoes";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0) {
    ?>
        <table> 
            <tr> 
                <th>ID</th> 
                <th>Title</th> 
                <th>Description</th> 
                <th>Previous Price</th>
                <th>New Price</th>
                <th>Image</th>
            </tr>   
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $imgtittle = $row["imgtittle"];
                    $imgdescription = $row["imgdescription"];
                    $pprice = $row["pprice"];
                    $nprice = $row["nprice"];
                    $image = '<img src="data:image/jpg;base64,' . base64_encode($row['img']) . '" />';
            ?>
                <tr> 
                    <td><?php echo $id ?></td> 
                    <td><?php echo $imgtittle ?></td> 
                    <td><?php echo $imgdescription ?></td> 
                    <td><?php echo $pprice ?></td>
                    <td><?php echo $nprice ?></td> 
                    <td><?php echo $image ?></td> 
                </tr>
            <?php } ?>
        </table>
       

    <?php } 
        mysqli_close($con);
    ?>
      </div>
    </div>
    

    <a href="Homepage.html" class="button button-goback">Logout</a>
    
    
  </body>
</html>
