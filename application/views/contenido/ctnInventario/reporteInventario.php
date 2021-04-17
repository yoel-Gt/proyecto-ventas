
<h1>Vista Reporte Inventario</h1>

 <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">MIS PRODUCTOS</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="tabla" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>CODIGO</th>
                      <th>DESCRIPCION</th>
                      <th>PRECIO DE COMPRA</th>
                      <th>PRECIO DE VENTA</th>
                      <th>CANTIDAD</th>
                      <th>MANIMO</th>
                      <th>MAXIMO</th>
                    </tr>
                  </thead>
                  
                  <!-- <tbody>

                  </tbody> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>
