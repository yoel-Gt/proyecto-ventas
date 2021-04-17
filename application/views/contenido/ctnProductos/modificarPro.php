<h1>Vista Modificar </h1>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
	  <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">MODIFICAR PRODUCTO</h3>
	              </div>
	            
	                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px; padding-top: 20px; margin-left: 20px">
                    <input type="text" id="buscarProduct" name="buscarProduct" class="form-control float-right" placeholder="Coloque El Codigo De Barra">

                    <div class="input-group-append">
                      <button type="botton" id="btnBuscar" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <!-- <form action="" method="post"> -->
	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="exampleInputEmail1">Codigo de barra</label>
	                    <input type="text" class="form-control" id="codigoBarra" placeholder="Codigo" disabled>
	                  </div>
	                  <div class="form-group">
	                    <label for="">descripcion</label>
	                    <input type="text" class="form-control" id="descripcion" placeholder="descripcion">
	                  </div>
	                  <div class="form-group">
	                    <label for="">precio de compra</label>
	                    <input type="text" class="form-control" id="precioVenta" name="precioVenta" placeholder="$0.00">
	                  </div>
	                  <div class="form-group">
	                    <label for="">precio de Venta</label>
	                    <input type="text" class="form-control" id="precioCompra" name="precioCompra" placeholder="$0.00">
	                  </div>
<!-- 	                  <div class="form-group">
	                    <label for="exampleInputFile">Agregar imagen</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="exampleInputFile">
	                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                    </div>
	                  </div> -->
	                  <div class="form-group">
	                    <label for="">Cantidad Actual</label>
	                    <input type="text" class="form-control" id="cantidadActual_ca" name="cantidadActual" placeholder="0.00">
	                  </div>
	                  <div class="form-group">
	                    <label for="">Mínimo</label>
	                    <input type="text" class="form-control" id="minimo_as" name="minimo" placeholder="0.00">
	                  </div>
	                  <div class="form-group">
	                    <label for="">Máximo</label>
	                    <input type="text" class="form-control" id="maximo_ns" name="maximo" placeholder="0.00">
	                  </div>
	                </div>
	                <!-- /.card-body -->
				 <!-- </form> -->
	                <div class="card-footer">
	                  <button type="submit" id="modificar" class="btn btn-primary">Guardar</button>
	                </div>
	             
	            </div>
	        </div>
	    </div>
	</div>
</section>

<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>