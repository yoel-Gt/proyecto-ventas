	<div class="col-sm-7">
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ajustar Inventario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                	<div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Codigo Del Producto:</label>
                    <div class="col-sm-7">
                      <input type="text" id="CodBarraVajo" name="buscarProduct" class="form-control float-right" placeholder="Coloque El Codigo De Barra">

                      <input type="hidden" id="idprod" name="buscarProduct" class="form-control float-right" placeholder="Coloque El Codigo De Barra">
                    </div>
                     <div class="input-group-append">
                      <button type="botton" id="btnBuscarPro" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                  <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Descripcion:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="inputDescripcion" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Cantidad Actual:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputCantidadActual" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">+ Cantidad:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputCantidad" placeholder="Cantidad A Agregar" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Costo:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputCosto">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Precio de Venta:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPrecioVenta">
                    </div>
                  </div>
                </div>
            </form>    
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="btnGuardarPro" class="btn btn-info">Realizar Ajuste del Inventario</button>
                  <button type="submit" id="btnCancelarPro" class="btn btn-danger float-right">Cancelar</button>

                <!-- /.card-footer -->
              
            </div>
    	</div>
	</div> 
</div>   


<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>   
