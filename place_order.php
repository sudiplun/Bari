
<?php
include('./kisan/includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['contact'];
    $payment_mode = $_POST['payment_mode'];

    // Generate a random invoice number
    $invoice_number = mt_rand(100000, 999999);

    // Insert the order into the database with 'Pending' status
    $insert_query = "INSERT INTO orders (ProductId, Quantity, InvoiceNumber, CustomerName, CustomerContactNo, PaymentMode, ApprovalStatus)
                     VALUES ('$product_id', '$quantity', '$invoice_number', '$customer_name', '$customer_contact', '$payment_mode', 'Pending')";
    // Check if the quantity is valid
    if ($quantity > $product['LeftQuantity']) {
        // Invalid quantity, show an error or redirect
        echo '<script>alert("Invalid quantity. Please choose a quantity less than or equal to LeftQuantity")</script>';
        echo "<script>window.history.back();</script>";
        exit();
    }
    if (mysqli_query($con, $insert_query)) {
        // Order placed successfully as 'Pending'
        echo '<script>alert("Order on Pending")</script>';
        echo "<script>window.location.href='index.php'</script>";
    } else {
        // Error in inserting order
        echo "Error: " . mysqli_error($con);
    }
}
?>
