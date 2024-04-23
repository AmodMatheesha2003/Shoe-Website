<?php
include "conf.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $shoe_sql = "SELECT * FROM shoes WHERE id = $id";
    $shoe_result = mysqli_query($con, $shoe_sql);

    if(mysqli_num_rows($shoe_result) == 1) {
        $shoe_row = mysqli_fetch_assoc($shoe_result);
        $imgtittle = $shoe_row["imgtittle"];
        $imgdescription = $shoe_row["imgdescription"];
        $pprice = $shoe_row["pprice"];
        $nprice = $shoe_row["nprice"];
        $image = '<img class="addtocartimg" src="data:image/jpg;base64,' . base64_encode($shoe_row['img']) . '" />';

        
        $stock_sql = "SELECT * FROM stock WHERE sid = $id";
        $stock_result = mysqli_query($con, $stock_sql);

        if(mysqli_num_rows($stock_result) > 0) {
            $stock_row = mysqli_fetch_assoc($stock_result);
            $size8 = $stock_row['size8'];
            $size9 = $stock_row['size9'];
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
 
    <style>

    body {
    font-family: Arial, sans-serif;
    background-color:#2ECC71;
    padding-top: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
    padding: 0 15px;
}

.addtocartimg {
    width: 100%;
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

h2 {
    font-size: 24px;
    margin: 10px 0;
}

h4 {
    font-size: 18px;
    margin: 10px 0;
}

p {
    font-size: 16px;
    color: #666;
    margin: 10px 0;
}

label {
    font-size: 16px;
    margin-top: 10px;
    display: block;
}

select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

@media (max-width: 768px) {
    .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php echo $image ?>
      </div>
      <div class="col-md-6">
        <h2><?php echo $imgtittle ?></h2>
        <p><?php echo $imgdescription ?></p>
        <p><b><del>Rs <?php echo $pprice ?></del></b></p>
        <h2>Rs <?php echo $nprice ?></h2>

       
        <br>
        <p><b>Available Sizes:</b></p>
        <p>Size 8 Stock: <?php echo $size8 ?></p>
        <p>Size 9 Stock: <?php echo $size9 ?></p>
        
        <br>
        <label for="size">Select Size:</label>
        <select id="size" name="size">
        <option value="8">Size 8</option>
        <option value="9">Size 9</option>
        
        </select>
        <label for="quantity">Select quantity:</label>
        <select id="quantity" name="quantity">
  <option value="1">1</option>
  <option value="2">2</option>

  
        </select>
                

        <button onclick="redirectToOrder()">Buy Now</button>

        <script>
        function redirectToOrder() {
            
            window.location.href = "order_success.php";
        }
        </script>
        
        
      </div>
    </div>
  </div>
  
</body>
</html>

<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}

mysqli_close($con);
?>