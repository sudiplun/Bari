<?php
include('Kisan/includes/config.php');

// Fetch products from the database
$query = mysqli_query($con, "SELECT * FROM products");
$products = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Fetch names from the user_form table
$queryNames = mysqli_query($con, "SELECT Name FROM user_form");
$names = mysqli_fetch_all($queryNames, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include_once('navbar.php');
    ?>
    <div class="container">
        <h1 class="my-4">Available Product List</h1>

        <div class="row">
            <?php foreach ($products as $key => $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><b><?php echo $product['ProductName']; ?></b></h4>
                            <!-- <h6 class="card-subtitle mb-2 text-muted"><?php echo $names[$key]['Name']; ?></h6> -->
                            <p class="card-text">Category: <?php echo $product['CategoryName']; ?></p>
                            <p class="card-text">Price: Rs.<?php echo $product['ProductPrice']; ?></p>
                            <p class="card-text">Quantity: <?php echo $product['TotalQuantity']; ?></p>
                            <p class="card-text">Available Quantity: <?php echo $product['LeftQuantity']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>