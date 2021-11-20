<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Telegram Bot</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('template/assets/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('template/assets/vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('template/assets/vendors/flag-icon-css/css/flag-icon.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('template/assets/vendors/jvectormap/jquery-jvectormap.css')?>">
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url('template/assets/css/demo/style.css')?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url('template/assets/images/favicon.png')?>" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- autocomplet -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
<!-- toats -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- pusherr notifikasi -->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>
<body>
<script src="<?= base_url('template/assets/js/preloader.js')?>"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
        <?php include('sidebar.php'); ?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
        <?php include('navbar.php'); ?>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <?= $this->renderSection('content'); ?>
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php'); ?>
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="<?= base_url('template/assets/vendors/js/vendor.bundle.base.js ')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?= base_url('template/assets/vendors/chartjs/Chart.min.js')?>"></script>
  <script src="<?= base_url('template/assets/vendors/jvectormap/jquery-jvectormap.min.js')?>"></script>
  <script src="<?= base_url('template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url('template/assets/js/material.js')?>"></script>
  <script src="<?= base_url('template/assets/js/misc.js')?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('template/assets/js/dashboard.js')?>"></script>
  <!-- End custom js for this page-->
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
     <script>
    $(document).ready(function() {
      $('#myTable').DataTable( {
          autoFill: true
      } );
    } );
</script>


</body>
</html> 