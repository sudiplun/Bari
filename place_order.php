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

    // Insert the order into the database
    $insert_query = "INSERT INTO orders (ProductId, Quantity, InvoiceNumber, CustomerName, CustomerContactNo, PaymentMode)
                     VALUES ('$product_id', '$quantity', '$invoice_number', '$customer_name', '$customer_contact', '$payment_mode')";

    if (mysqli_query($con, $insert_query)) {
        // Order placed successfully
        echo '<script>alert("Order placed successfully. Invoice number is ' . $invoice_number . '")</script>';
        echo "<script>window.location.href='index.php'</script>";
    } else {
        // Error in inserting order
        echo "Error: " . mysqli_error($con);
    }
}
