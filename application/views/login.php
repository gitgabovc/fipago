<?php
defined('BASEPATH') or exit('No direct script access allowed');

switch ($msg) {
  case '1':
    $mensaje = 'Gracias por usar el sistema';
    $color = 'bg-blue';
    break;
  case '2':
    $mensaje = 'Usuario no valido';
    $color = 'bg-danger';

    break;

  default:
    $mensaje = '';
    $color = '';

    break;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fipagod</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admilte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admilte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>admilte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <h1>Login Fipago</h1>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <h2 class="text-white <?php echo $color ?>"><?php echo $mensaje ?></h2>
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar sesion</p>

        <!-- <form action="../../index3.html" method="post"> -->
        <?php
        echo form_open_multipart('usuarios/validarusuario')
        ?>
        <div class="input-group mb-3">
          <input type="text" name='login' class="form-control" placeholder="Usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name='password' class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">

          <!-- /.col -->

          <center>
            <button type="submit" class="btn btn-primary btn-block ">Sign In</button>

          </center>

          <!-- /.col -->
        </div>
        <?php
        echo form_close();
        ?>


        <!-- /.social-auth-links -->


      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>admilte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>admilte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>admilte/dist/js/adminlte.min.js"></script>
</body>

</html>