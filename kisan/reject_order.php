
<?php
include('includes/config.php');

if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];
  // Update the order status to 'Rejected'
  mysqli_query($con, "UPDATE `orders` SET `ApprovalStatus` = 'Rejected' WHERE `id` = $order_id");
  // Redirect back to the page where orders are listed
  header('Location: invoices.php');
  exit();
}
?>
