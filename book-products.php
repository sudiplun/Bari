<?php
include('Kisan/includes/config.php');

// Fetch products from the database
$query = mysqli_query($con, "SELECT * FROM products");
$products = mysqli_fetch_all($query, MYSQLI_ASSOC);
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

    <div class="container">
        <h1 class="my-4">Product List</h1>

        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['ProductName']; ?></h5>
                            <p class="card-text">Price: Rs.<?php echo $product['ProductPrice']; ?></p>
                            <p class="card-text">Available Quantity: <?php echo $product['LeftQuantity']; ?></p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#orderModal<?php echo $product['id']; ?>">Order</button>
                        </div>
                    </div>
                </div>

                <!-- Order Modal -->
                <div class="modal fade" id="orderModal<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="orderModalLabel">Order <?php echo $product['ProductName']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="place_order.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <div class="form-group">
                                        <label for="customerName">Customer Name</label>
                                        <input type="text" class="form-control" id="customerName" name="customer_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" id="contact" name="contact" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Order Modal -->
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>