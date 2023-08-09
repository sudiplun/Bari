<?php
//error_reporting(0);
require_once('includes/config.php');
if (strlen($_SESSION['user_id'] == 0)) {
    header('location:logout.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Dashboard</title>
        <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- HK Wrapper -->
        <div class="hk-wrapper hk-vertical-nav">

            <?php include_once('includes/navbar.php');
            include_once('includes/sidebar.php');
            ?>
            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
            <!-- /Vertical Nav -->
            <!-- Main Content -->
            <div class="hk-pg-wrapper">
                <?php
                // Getting Farm name 
                $adminid = $_SESSION['user_id'];
                $query = mysqli_query($con, "SELECT Name FROM user_form WHERE id='$adminid'");
                $row = mysqli_fetch_array($query);
                ?>
                <h2>Welcome to <?php echo $row['Name']; ?></h2>
                <!-- Container -->
                <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hk-row">
                                <?php
                                $sql = mysqli_query($con, "select id from products");
                                $listedproduct = mysqli_num_rows($sql);
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Products</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo $listedproduct; ?></span>
                                                <small class="d-block">Listed Products</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $query = mysqli_query($con, "select id from category");
                                $listedcat = mysqli_num_rows($query);
                                ?>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Categories</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo $listedcat; ?></span>
                                                <small class="d-block">Listed Categories</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $query = mysqli_query($con, "SELECT id FROM orders");
                                $listedInvoices = mysqli_num_rows($query);
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Invoices</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo $listedInvoices; ?></span>
                                                <small class="d-block">Total Invoices till date</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $query = mysqli_query($con, "select sum(orders.Quantity*products.ProductPrice) as tt  from orders join products on products.id=orders.ProductId ");
                                $row = mysqli_fetch_array($query);
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Total Sales</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo number_format($row['tt'], 2); ?></span>
                                                <small class="d-block">Total sales till date</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <?php
                                $qury = mysqli_query($con, "select sum(orders.Quantity*products.ProductPrice) as tt  from orders join products on products.id=orders.ProductId where date(orders.InvoiceGenDate)>=(DATE(NOW()) - INTERVAL 7 DAY)");
                                $row = mysqli_fetch_array($qury);
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Last 7 Days Sales</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo number_format($row['tt'], 2); ?></span>
                                                <small class="d-block">Last 7 Days Total Sales</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $qurys = mysqli_query($con, "select sum(orders.Quantity*products.ProductPrice) as tt  from orders join products on products.id=orders.ProductId where date(orders.InvoiceGenDate)=CURDATE()-1");
                                $rw = mysqli_fetch_array($qurys);
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Yesterday Sales</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo number_format($rw['tt'], 2); ?></span>
                                                <small class="d-block">Yesterday Total Sales</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $quryss = mysqli_query($con, "select sum(orders.Quantity*products.ProductPrice) as tt  from orders join products on products.id=orders.ProductId where date(orders.InvoiceGenDate)=CURDATE()");
                                $rws = mysqli_fetch_array($quryss);
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-5">
                                                <div>
                                                    <span class="d-block font-15 text-dark font-weight-500">Today's Sales</span>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span class="d-block display-4 text-dark mb-5"><?php echo number_format($rws['tt'], 2); ?></span>
                                                <small class="d-block">Today's Total Sales</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /Container -->

                        <!-- Footer -->
                        <?php include_once('includes/footer.php'); ?>
                        <!-- /Footer -->
                    </div>
                    <!-- /Main Content -->

                </div>
                <!-- /HK Wrapper -->

                <!-- jQuery -->
                <script src="vendors/jquery/dist/jquery.min.js"></script>
                <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
                <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="dist/js/jquery.slimscroll.js"></script>
                <script src="dist/js/dropdown-bootstrap-extended.js"></script>
                <script src="dist/js/feather.min.js"></script>
                <script src="vendors/jquery-toggles/toggles.min.js"></script>
                <script src="dist/js/toggle-data.js"></script>
                <script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
                <script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
                <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
                <script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
                <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
                <script src="dist/js/vectormap-data.js"></script>
                <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
                <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
                <script src="vendors/apexcharts/dist/apexcharts.min.js"></script>
                <script src="dist/js/irregular-data-series.js"></script>
                <script src="dist/js/init.js"></script>

    </body>

    </html>
<?php } ?>