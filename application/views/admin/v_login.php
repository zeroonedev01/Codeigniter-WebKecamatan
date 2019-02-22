<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Kalimanah</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?php echo base_url() . 'assetss/favicon/favicon.ico' ?>"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/vendor/bootstrap/css/bootstrap.min.css ' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/fonts/font-awesome-4.7.0/css/font-awesome.min.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/fonts/Linearicons-Free-v1.0.0/icon-font.min.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/vendor/animate/animate.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/vendor/css-hamburgers/hamburgers.min.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/vendor/animsition/css/animsition.min.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/vendor/select2/select2.min.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/vendor/daterangepicker/daterangepicker.css' ?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/css/util.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assetss/css/main.css' ?>">
<!--===============================================================================================-->
</head>
<body>
  <div>
   <?php echo $this->session->flashdata('msg'); ?>
  </div>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url(<?php echo base_url() . 'assetss/images/bg-01.jpg' ?>);">
          <span class="login100-form-title-1">
            Login Admin Website Kalimanah
          </span>
        </div>

        <form class="login100-form validate-form" action="<?php echo site_url() . 'admin/login/auth' ?>" method="post">
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" name="username" placeholder="Enter username">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Enter password">
            <span class="focus-input100"></span>
          </div>


          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/vendor/jquery/jquery-3.2.1.min.js' ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/vendor/animsition/js/animsition.min.js' ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/vendor/bootstrap/js/popper.js' ?>"></script>
  <script src="<?php echo base_url() . 'assetss/vendor/bootstrap/js/bootstrap.min.js' ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/vendor/select2/select2.min.js' ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/vendor/daterangepicker/moment.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assetss/vendor/daterangepicker/daterangepicker.js' ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/vendor/countdowntime/countdowntime.js' ?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url() . 'assetss/js/main.js' ?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>