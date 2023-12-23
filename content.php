<?php
include('./kisan/includes/config.php');
// Fetch products from the database
$query = mysqli_query($con, "SELECT * FROM products");
$products = mysqli_fetch_all($query, MYSQLI_ASSOC);
// Define default search and category filter values
$searchKeyword = '';
$categoryFilter = 'All';
// Process search and category filter if submitted
if (isset($_POST['submit'])) {
    $searchKeyword = $_POST['search'];
    $categoryFilter = $_POST['categories'];
}
// BUILD THE SQL QUERY BASED ON SEARCH AND CATEGORY FILTER
$query = "SELECT * FROM products";
if ($categoryFilter != 'All') {
    $query .= " WHERE CategoryName = '$categoryFilter'";
    if ($searchKeyword != '') {
        $query .= " AND ProductName LIKE '%$searchKeyword%'";
    }
} else {
    if ($searchKeyword != '') {
        $query .= " WHERE ProductName LIKE '%$searchKeyword%'";
    }
}
$result = mysqli_query($con, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div class="container">
    <h1 class="my-4">Product List</h1>
    <!-- Search Form -->
    <form method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="search" placeholder="Search Product" value="<?php echo $searchKeyword; ?>">
            </div>
            <div class="col-md-4">
                <select class="form-control" name="categories">
                    <option value="All">All Categories</option>

                    <?php foreach ($products as $category) : ?>
                        <option value="<?php echo $products['CategoryName']; ?>" <?php if ($categoryFilter == $category['CategoryName'])
                                                                                        echo 'selected'; ?> <?php echo $category['CategoryName']; ?> </option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary" name="submit">Search</button>
            </div>
        </div>
    </form>
    <!-- end Search Form -->
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b><?php echo $product['ProductName']; ?></b></h5>
                        <p class="card-text">Category: <?php echo $product['CategoryName']; ?></p>
                        <p class="card-text">Price: Rs.<?php echo $product['ProductPrice']; ?></p>
                        <p class="card-text">Quantity: <?php echo $product['TotalQuantity']; ?></p>
                        <p class="card-text">Available Quantity: <?php echo $product['LeftQuantity']; ?></p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal<?php echo $product['id']; ?>">Order</button>
                        <!-- <button class="btn btn-primary">Book</button> -->
                    </div>
                </div>
            </div>
            <!-- Order Modal -->
            <div class="modal fade" id="orderModal<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderModalLabel">Order <?php echo $product['ProductName']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
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
                                <div class="form-group">
                                    <label for="paymentMode">Payment Mode</label>
                                    <select class="form-control" id="paymentMode" name="payment_mode" required>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 6px;">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Order Modal -->
        <?php endforeach; ?>
    </div>
</div>