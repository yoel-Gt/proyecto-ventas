<link rel="stylesheet" href="../assets/miscss/miCssSubirArchivo.css">
<div class="col-sm-7">
	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">Prueba subir Imagen JS</h3>
		</div>
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
		</form>
	</div>
</div>


<script type="text/javascript">
	var url = "<?php echo base_url(); ?>";
</script>
