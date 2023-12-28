<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['user_id'] == 0)) {
  header('location:logout.php');
} else {
  echo "Hello world..!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>Manage Invoices</title>
  <!-- Data Table CSS -->
  <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
  <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
  <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- HK Wrapper -->
  <div class="hk-wrapper hk-vertical-nav">
    <!-- Top Navbar -->
    <?php include_once('includes/navbar.php');
    include_once('includes/sidebar.php');
    ?>
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav -->

    <!-- Main Content -->
    <div class="hk-pg-wrapper">
      <!-- Breadcrumb -->
      <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
          <li class="breadcrumb-item"><a href="#">pending</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pending product</li>
          <!-- <li class="breadcrumb-item ">Approval product</li> -->
        </ol>
      </nav>
      <!-- /Breadcrumb -->
      <!-- Container -->
      <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
          <h4 class="hk-pg-title">Pending product</h4>
        </div>
        <!-- /Title -->
        <!-- Row -->
        <div class="row">
          <div class="col-xl-12">
            <section class="hk-sec-wrapper">
              <div class="row">
                <div class="col-sm">
                  <div class="table-wrap">
                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Customer Name</th>
                          <th>Customer Contact no.</th>
                          <th>Payment Mode</th>
                          <th>Request Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $rno = mt_rand(10000, 99999);
                        $query = mysqli_query($con, "select * from category");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['CustomerName']; ?></td>
                            <td><?php echo $row['CustomerContact']; ?></td>
                            <td><?php echo $row['PaymentMode']; ?></td>
                            <td><?php echo $row['RequestDate']; ?></td>
                            <td>
                              <a href="#" class="mr-2" data-toggle="tooltip" data-original-title="Approve">
                                <i class="icon-check"></i>
                              </a>
                              </a>
                              <a href="#" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Do you really want to reject?');">
                                <i class="icon-trash txt-danger"></i>
                              </a>
                            </td>
                          </tr>
                        <?php
                          $cnt++;
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- /Row -->

      </div>
      <!-- Container -->

      <!-- Footer -->
      <?php include_once('includes/footer.php'); ?>
      <!-- /Footer -->
    </div>
    <!-- /Main Content -->
  </div>
  <!-- /HK Wrapper -->

  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="dist/js/jquery.slimscroll.js"></script>
  <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="vendors/jszip/dist/jszip.min.js"></script>
  <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
  <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="dist/js/dataTables-data.js"></script>
  <script src="dist/js/feather.min.js"></script>
  <script src="dist/js/dropdown-bootstrap-extended.js"></script>
  <script src="vendors/jquery-toggles/toggles.min.js"></script>
  <script src="dist/js/toggle-data.js"></script>
  <script src="dist/js/init.js"></script>
</body>

</html>