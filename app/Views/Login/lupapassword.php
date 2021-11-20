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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- autocomplet -->
</head>
<body>
<script src="../assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <div class="main-wrapper">
      <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center">
        <main class="auth-page">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                <div class="mdc-card">
                  <form method="POST" role="form" action="<?= base_url('Nilai/add')?>">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <input class="mdc-text-field__input" id="username" name="username" autocomplet="false">
                            <div class="mdc-line-ripple"></div>
                            <label for="username" class="mdc-floating-label">Username</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <input class="mdc-text-field__input" type="password" id="password" name="password">
                            <div class="mdc-line-ripple"></div>
                            <label for="password" class="mdc-floating-label">Password</label>
                          </div>
                        </div>
                         <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                           <a href="#">Daftar</a>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex align-items-center justify-content-end">
                          <a href="#">Forgot Password</a>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <input id="#id_simpan" type="submit" value="Login" class="mdc-button mdc-button--raised w-100">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
            </div>
          </div>
        </main>
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
</body>
</html>