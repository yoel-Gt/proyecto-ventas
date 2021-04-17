<h1>Vista Modificar Cliente</h1>
<link rel="stylesheet" type="text/css" href=""><!-- ../assets/miscss/estilo.css -->


<div class="col-sm-10">
			<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Modificar Cliente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- <form class="form-horizontal"> -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Buscar:</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="inputBuscar" placeholder="escriba el nombre" required>
										</div>
                  </div>
   				<div class="card-body table-responsive p-0">
                <table id="tabla" class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>LUGAR</th>
											<th>TELEFONO</th>
											<th>FOTO</th>
											<th>LIMITE CREDITO</th>
                      <th>OPCIONES</th>
                    </tr>
                  </thead>
                  
                  <tbody>

                  </tbody>
                </table>
              </div>	
                </div>
                <!-- /.card-body -->
                
              <!-- </form> -->
						</div>
						
    </div> 

<!--------------------- MI MODAL (MODIFICAR CLIENTE)-->

<div class="modal fade" id="idmodalCli" role="dialog">
            <div class="modal-dialog">

          <!-- Modal content-->
        <div class="modal-content">
             <div class="modal-header">
              <div class="form-group">
             <h4 style="color:black;"><span class="glyphicon glyphicon-edit" >Editar Cliente</span></h4>
             </div>
             <div class="form-group">
             <button type="button" class="close" data-dismiss="modal" style="color:#F3331C;"><i class="icon-redo2"></i></button> 
             </div>
             </div>
           
          
              <div class="modal-body">
            <div class="form-group" style="color:#4B0082;">   
              <label ><b>NOMBRE</b></label>
              <input type="hidden" id="ModId" name="ModId">
              <input type="text" class="form-control" id="ModNombre" disabled="disabled" >
              </div>
              
              <div class="form-group" style="color:#4B0082;">   
              <label ><b>LUGAR</b></label>
              <input type="text" class="form-control" rows="2" id="ModLugar" >
              </div>
              <div class="form-group" style="color:#4B0082;">   
              <label ><b>TELEFONO</b></label>
              <input type="text" class="form-control" rows="2" id="ModTelefono" >
              </div>
              <div class="form-group" style="color:#4B0082;">   
              <label ><b>LIMITE DE CREDITO</b></label>
              <input type="text" class="form-control" rows="2" id="ModCredito" >
              </div>
        
              
              <button type="submit" class="btn btn-primary btn btn-primary" id="btnActualizar"><b>Guardar</b></button>
              
              </div>  
          
          </div> 
        </div>
      </div>

<!-- //-----MI MODAL ELIMINAR CLIENTE--------------------------->
<div class="modal fade" id="idmodalCliEliminar" role="dialog">
            <div class="modal-dialog">

          <!-- Modal content-->
        <div class="modal-content">
             <div class="modal-header">
              <div class="form-group">
             <h4 style="color:black;"><span class="glyphicon glyphicon-edit" >Eliminar Cliente</span></h4>
             </div>
             <div class="form-group">
             <button type="button" class="close" data-dismiss="modal" style="color:#F3331C;"><i class="icon-redo2"></i></button> 
             </div>
             </div>
           
          
              <div class="modal-body">
            <div class="form-group" style="color:#4B0082;">   
              <label ><b>"Esta seguro que desea eliminar el cliente seleccionado"</b></label>
              <input type="hidden" id="ModIdEli" name="ModIdEli">
              <input type="text" class="form-control" id="ModNombreEli" disabled="disabled" >
              </div>

              <button type="submit" class="btn btn-danger btn btn-primary" id="btnEliminarCli"><b>Eliminar</b></button>
              
              </div>  
          
          </div> 
        </div>
      </div>

<!-- //-------- SCRIPT------- -->
    <script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>   
