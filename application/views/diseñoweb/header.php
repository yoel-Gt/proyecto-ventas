<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta lang="es">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VENTAS 3HNS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Mi plugin bootstrap para diseños de label-->
    <!-- <link rel="stylesheet" href="../assets/miscss/bootstrap.min.css"> -->
    <!-- TERMINA Mi plugin bootstrap para diseños de label-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- librerias Graficas Morris.js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!-- termina-->

   <!-- estos son mis estilos CSS #yoel -->
  <link rel="stylesheet" type="text/css" href="../assets/fonts/style.css">

 <!-- Este es mi plugin para diseño de tabla-->
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
 <!--  <link rel="stylesheet" href="../assets/template/datatables_netbs/css/jquery.dataTables.css"> -->

<!--   terminan mis estilos css -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- mi stilo para ciertos cambios -->
  <link rel="stylesheet" href="../assets/miscss/estilo.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- LINK PARA GRAFICAS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

  <!-- CABECERA -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul> 

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="notify_globo">
					<i class="far fa-comments"></i>
							
          <span class="badge badge-danger navbar-badge" >0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<div id="contenido_cliente">

					</div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


<!-- NOTIFICACIONES -->
<script>
let urlN = "<?php echo base_url();?>";
let notificacion = '';
let contenido='';
	$.ajax({
		url: urlN +"ctrlServicios/notificacion_cliente",
		type:'POST',
		async:true,
		success:function(objeto){
			// console.log(JSON.parse(objeto));
			let valor = JSON.parse(objeto);
			let items = valor[1]; 
			
			notificacion=`
					<i class="far fa-comments"></i>
					<span class="badge badge-danger navbar-badge" >${valor[0]}</span>
			`;
			$('#notify_globo').html(notificacion);

			$.each(items, function(i,item){
				contenido+=`
				<a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="../assets/imagenes/empleados/${item.foto}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  ${item.nombre}
                  <span class="float-right text-sm text-success"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">$ ${item.credito_utilizado}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>${item.dias} dias</p>
              </div>
            </div>
           
          </a>
					<div class="dropdown-divider"></div>
				`;
			});

			$('#contenido_cliente').html(contenido);
			
		}
	});

</script>

