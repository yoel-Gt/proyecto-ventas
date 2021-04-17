<link rel="stylesheet" href="../assets/miscss/estilosInventario.css">

<div class="container">
    	<div class="row">
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Productos</h3>
						<button type="button" class="btn btn-warning btn_Y" onclick="visualizar_productos_bajo();">PRODUCTOS CON INVENTARIO BAJO</button>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filtrar Producto" />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>Precio de Compra</th>
								<th>Precio de Venta</th>
							</tr>
						</thead>
						<tbody id="grid_productos_bajos">
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>
