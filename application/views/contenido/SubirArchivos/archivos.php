<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Ventas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/style.css">

<!--   terminan mis estilos css -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-logo">
    <a href="../../index2.html"><b>Crear </b>Nuevo Usuario</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Cree su usuario y contraseña para Registrarse.</p>

      <form action="<?php echo base_url();?>ctrlSesion/Crear_Sesion_User" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="imagen_empleado" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
				</div>
				<div class="input-group mb-3">
          <input type="file" class="form-control" name="fileImagen" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a href="<?php echo base_url()?>CtrlSesion/" class="" id="remember">
              <label for="remember">Regresar</label>
            </a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button id="ingresar" type="submit" class="btn btn-primary btn-block">Registrar</button>
					</div>
					<!-- <span><?php echo $error ; ?></span> -->
          <!-- /.col -->
        </div>
			</form>
			
			

<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- <script src="<?php echo base_url();?>js/empleados.js"></script> -->
</body>
</html>
