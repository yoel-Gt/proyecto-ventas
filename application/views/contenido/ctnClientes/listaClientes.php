<div class="content">
	<section class="content">
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-primary btn-sm"><span class="fa fa-plus"></span>agregar Cliente</button>
					</div>
				</div>
				<!-- <div class="flash-data" data-flashdata="<?=$this->session->flashdata('correcto');?>"> -->
				</div>
				<hr><!-- Esto es una linea -->
				<div class="row">
					<div class="col-lg">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th>Credito</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody id="tbody_cliente">

								<?php if (!empty($articulos)):?> <!-- diferente de vacio --> 
									<?php foreach ($articulos as $atributos):?>
									<tr>
										<td><?php echo $atributos->idclientes;?></td>
										<td><?php echo $atributos->nombre;?></td>
										<td><?php echo $atributos->direccion;?></td>
										<td><?php echo $atributos->telefono;?></td>

										<?php
										if ($atributos->credito_activo == 1) {
											$style="class='label label-success'";
											echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p>";
										}else{
											$style='class="label label-danger"';
											echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivado</font></span></p>";
										}
										?>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-info btn-sm" onclick="btn_view_cliente(<?php echo $atributos->idclientes;?>);">
													<span class="icon-zoom-in"></span>
												</button>
												<button onclick="btn_editar_cliente(<?php echo $atributos->idclientes; ?>);" class="btn btn-warning btn-sm" id="btn_edit">
													<span class="icon-quill"></span>
												</button>
												<button onclick="btn_baja_cliente(<?php echo $atributos->idclientes; ?>);" class="btn btn-danger btn-sm" id="btn_baja">
													<span class="icon-bin"></span>
												</button>
												</a>
											</div>
										</td>
									</tr>
									<?php endforeach?>
								<?php endif;?>
							</tbody>
						</table>
					</div>
					
				</div>

			</div>
		</div>
	</section>
</div>

<!-- // MODAL -->
<div id="modal_cliente" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Cliente <span id="clie_id"></span></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">

	  	<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">Nombre</span>
  			</div>
  			<input id="clie_nombre" type="text" class="form-control">
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
    		<span class="input-group-text" id="basic-addon1">Dirección</span>
  		</div>
  			<input id="clie_direccion" type="text" class="form-control">
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
    		<span class="input-group-text" id="basic-addon1">Telefono</span>
  		</div>
  			<input id="clie_telefono" type="text" class="form-control">
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" onclick="btn_cambios_cliente();" class="btn btn-primary">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- //modal alerta -->
<div class="modal fade" id="Modal_alerts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alerta!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
        Esta seguro que quiere dar de baja al cliente No. <span id="clienteID"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" onclick="btn_baja_cliente_ok(id_Cliente);" class="btn btn-primary">Si</button>
      </div>
    </div>
  </div>
</div>

<!-- //modal cliente a detalle -->
<div id="modal_cliente_detalle" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cliente <span id="clie_id"></span></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body flex" id="view_modal_cliente">
		
		
      </div>
      <div class="modal-footer">
        <button type="button" onclick="btn_cambios_cliente();" class="btn btn-primary">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- //-------conexxion con javascript jsClientes.js -->
 <script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>  
