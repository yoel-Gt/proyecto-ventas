<link rel="stylesheet" href="../assets/miscss/clienteReporte.css">

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-7">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Saldo Del Cliente</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div id="itemsClientes" class="col-xs-7 col-sm-7 col-md-7 separator social-login-box">
							<!-- <h5>Datos del cliente</h5> -->
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 login-box">
							<form role="form">
								<div class="input-group">
									<span class="input-group-addon"><span class="icon-user"></span></span>
									<input type="text" class="form-control" id="nombreCliente" placeholder="Nombre de cliente" required autofocus />
								</div>
								
								<!-- <div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" class="form-control" placeholder="Password" required />
								</div> -->
							</form>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div  class="col-xs-7 col-sm-7 col-md-7">
							
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5">
							<button type="button" onclick="Buscar_usuario();" class="btn btn-labeled btn-success">
								<span class="btn-label"><i class="icon-search"></i></span>Buscar</button>
							<button type="button" class="btn btn-labeled btn-danger">
								<span class="btn-label"><i class="icon-cancel-circle"></i></span>Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xs-12 col-sm-12 col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Resumen</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-7 col-sm-7 col-md-7 separator social-login-box">
							<div class="resumen__" id="ResumenClientes">
								
							</div>
							<div class="fechas_abono">
								<!-- //-------- -->
									<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" id="fechas_abono_id" role="menu" data-accordion="false">
    								       
    								</ul> 
								<!-- //--------- -->
							</div>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 login-box">
							<form role="form">
								<div class="input-group" id="img_cliente">	</div>
								<!-- <div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" class="form-control" placeholder="Password" required />
								</div> -->
							</form>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div  class="col-xs-7 col-sm-7 col-md-7">
							
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5">
							<!-- <button type="button" onclick="Buscar_usuario();" class="btn btn-labeled btn-success">
								<span class="btn-label"><i class="icon-search"></i></span>Buscar</button>
							<button type="button" class="btn btn-labeled btn-danger">
								<span class="btn-label"><i class="icon-cancel-circle"></i></span>Cancelar</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


	

	
</div>

<script>
	let url = "<?php echo base_url() ?>";
</script>


<!-- esto era una prueba para subir fotos a un servidor remoto -->
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
