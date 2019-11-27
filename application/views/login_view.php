<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sign In</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/fontastic.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.default.css" id="theme-stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/custom.css">
</head>

<body>
  <div class="page login-page">
    <div class="container d-flex align-items-center">
      <div class="form-holder has-shadow">
        <div class="row">
          <!-- Logo & Information Panel-->
          <div class="col-lg-3 bg-white">
          </div>
          <!-- Form Panel    -->
          <div class="col-lg-6 bg-white">
            <div class="form d-flex align-items-center">
              <div class="content">
                <form method="post" class="form-validate" action="<?php echo site_url('login/auth'); ?>">
                  <h2 class="form-signin-heading">PKKS</h2>
                  <?php echo $this->session->flashdata('msg'); ?>
                  <div class="form-group">
                    <input id="login-username" type="text" name="k_user" required data-msg="Silakan Masukkan Kode User" class="input-material">
                    <label for="login-username" class="label-material">Kode User</label>
                  </div>
                  <div class="form-group">
                    <input id="login-password" type="password" name="password" required data-msg="Silakan Masukkan Password" class="input-material">
                    <label for="login-password" class="label-material">Password</label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-3 bg-white">
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- JavaScript files-->
  <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="<?php echo base_url() ?>/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
  <!-- Main File-->
  <script src="<?php echo base_url() ?>/assets/js/front.js"></script>
</body>

</html>