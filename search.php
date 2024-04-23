<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="image/footlogo.png">
    <title>FootFiesta</title>
    <link rel="stylesheet" href="productt.css">
    <style>
      .addtocartimg{
        width: 300px;
        height: 300px;
      }
      .cart-user{
        display: flex;
        gap: 10px;
        margin-right: 20px ;
      }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="Image/foot.png" width="100" height="30"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <div class="cart-user">
                    <div class="nav-item">
                        <a class="nav-link" href="Login.html"><img src="Image/cart1.png" width="30" height="30"></a>
                    </div>
                </div>   
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- product -->
    <div class="container">
        <div class="row">
            <?php
            include "conf.php";
            if(isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM shoes WHERE imgdescription LIKE '%$search%'";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $imgtittle = $row["imgtittle"];
                        $imgdescription = $row["imgdescription"];
                        $pprice = $row["pprice"];
                        $nprice = $row["nprice"];
                        $image = '<img class="addtocartimg" src="data:image/jpg;base64,' . base64_encode($row['img']) . '" />';
            ?>
                        <div class="col-md-3">
                            <div class="card">
                                <?php echo $image ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $imgtittle ?></h5>
                                    <p class="card-text"><?php echo $imgdescription ?></p>
                                    <h6><del>Rs <?php echo $pprice ?></del></h6>
                                    <h4>Rs <?php echo $nprice ?></h4>
                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>
            <?php 
                    }
                } else {
                    echo "<p>No matching results found.</p>";
                }
            }
            mysqli_close($con);
            ?>
        </div>
    </div>
</body>
</html>
