<link rel="stylesheet" href="../assets/miscss/miCssSubirArchivo.css">
	<div class="col-sm-7">
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Nuevo Cliente</h3>
              </div>
              <form class="form-horizontal" id="form_subir">
                <div class="card-body">
									<!-- 0 -->
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Nombre Completo:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputNombre" placeholder="Nombre Y Apellidos" required>
                    </div>
									</div>
									<!-- 1 -->
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dirección:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputDireccion" placeholder="Lugar en el que vive" required>
                    </div>
									</div>
									<!-- 2 -->
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Telefono(s):</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputTelefono" pattern="[0-9]{10}" placeholder="Numerico" required>
                    </div>
									</div>
									<!-- 3 -->
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Limite de Crédito:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputCredito" placeholder="Cantidad Maxima De credito">
                    </div>
									</div>
										<!-- 4 -->
									<div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Fotografia:</label>
                    <div class="col-sm-5">
                      <input type="file" name="archivo" id="nombreImagen" required>
                    </div>
									</div>
										<!-- 5 -->
									<div class="form-group row barra">
											<div class="barra_azul form-control" id="barra_estado">
												<span></span>
											</div>
									</div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer acciones">
                  <button type="submit" id="btnGuardar" class="btn btn-info" value="enviar">Guardar Cliente</button>
                  <button type="submit" id="btnCancelar" class="btn btn-danger float-right">Cancelar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
		</div> 


<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>   
