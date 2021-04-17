<link rel="stylesheet" href="../assets/miscss/miCssSubirArchivo.css">
<h1>Esta seccion ya no se ocupara por ahora</h1>
<h1>Vista Nuevo Cliente</h1>
<div class="col-sm-7">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Prueba subir Imagen JS</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form class="form-horizontal" id="form_subir">
			<!-- <div class="card-body"> -->
				<!-- 0 -->
				<div class="form-group row">
					<label for="">archivo a subir:</label>
					<input type="file" name="archivo" id="nombreImagen" required>
				</div>
				<!-- 1 -->
				<div class="form-group row barra">
					<div class="barra_azul" id="barra_estado">
						<span></span>
					</div>
				</div>
				<!-- 2 -->
				<div class="form-group row acciones">
					<input type="submit" class="btn btn-primary" value="enviar">
					<input type="button" id="cancelar" value="Cancelar">
				</div>
			<!-- </div> -->
			<!-- /.card-body -->
			<!-- <div class="card-footer">
				<button type="submit"  class="btn btn-info">Guardar Cliente</button>
				<button type="submit" id="btnCancelar" class="btn btn-danger float-right">Cancelar</button>
			</div> -->
			<!-- /.card-footer -->
		</form>
	</div>
</div>


<script type="text/javascript">
	var url = "<?php echo base_url(); ?>";
</script>
