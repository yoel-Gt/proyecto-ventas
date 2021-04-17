
<section class="content">
 	<div class="container-fluid">
 		<div class="row">
 			<!-- left column -->
 			<div class="col-md-8">
 				<div class="card card-primary">
				 <?php echo $status ?>
					 <div class="card-header">
 						<h3 class="card-title">Agregar Nuevo Producto</h3>
 					</div>
				  <form action="<?php echo base_url();?>ctrlServicios/GuardarProducto" method="post" enctype="multipart/form-data">
 					<div class="card-body">
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">Codigo de barra</span>
 							</div>
 							<input name="pro_codigoBarra" type="text" class="form-control">
 						</div>
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">descripcion</span>
 							</div>
 							<input name="pro_descripcion" type="text" class="form-control">
 						</div>
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">precio de compra</span>
 							</div>
 							<input name="pro_precioC" type="text" class="form-control">
 						</div>
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" name="basic-addon1">precio de Venta</span>
 							</div>
 							<input name="pro_precioV" type="text" class="form-control">
 						</div>
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">Cantidad Actual</span>
 							</div>
 							<input name="pro_cantidadAc" type="text" class="form-control">
 						</div>
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">Mínimo</span>
 							</div>
 							<input name="pro_minimo" type="text" class="form-control">
 						</div>
 						<div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">Máximo</span>
 							</div>
 							<input name="pro_maximo" type="text" class="form-control">
						 </div>
						 <div class="input-group mb-3">
 							<div class="input-group-prepend">
 								<span class="input-group-text" id="basic-addon1">imagen</span>
 							</div>
 							<input type="file" name="file" class="form-control" style="padding: 3px;">
 						</div>
 					</div>
 					
 					<div class="card-footer">
 						<input type="submit" class="btn btn-primary">
					 </div>
				  </form>	 
 				</div>
 			</div>
 		</div>
 	</div>
 </section>



 <!-- //-------conexxion con javascript -->
 <script type="text/javascript">
 	var url = "<?php echo base_url(); ?>";
 </script>
