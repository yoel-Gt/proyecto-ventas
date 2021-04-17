<div class="content">
	<section class="content-header">
		<h1>
			Dasboard
			<small>panel</small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
<!-- pendiente por ruta --><a href="<?php echo base_url();?>Carpeta/documento" class="btn btn-primary btn-flat size"><span class="fa fa-plus"></span>agregar</a>
					</div>
				</div>
				<div class="flash-data" data-flashdata="<?=$this->session->flashdata('correcto');?>">
				</div>
				<hr><!-- Esto es una linea -->
				<div class="row">
					<div class="col-md-12">
						<table id="example1" class="table size table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>

								<?php if (!empty($articulos)):?> <!-- diferente de vacio --> 
									<?php foreach ($articulos as $atributos):?>
									<tr>
										<td><?php echo $atributos->idclientes;?></td>
										<td><?php echo $atributos->nombre;?></td>
										<td><?php echo $atributos->direccion;?></td>
										<td><?php echo $atributos->telefono;?></td>

										<?php
										if ($atributos->telefono == 9661233458) {
											$style="class='label label-success'";
											echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p>";
										}else{
											$style='class="label label-danger"';
											echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivado</font></span></p>";
										}
										?>
										<td>
											<div class="btn-group">
												<button type="button" class="btn size btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $atributos->idclientes;?>">
													<span class="icon-zoom-in"></span>
												</button>
												<a href="<?php echo base_url();?>ctrlServicios/Cedit/<?php echo $atributos->idclientes; ?>" class="btn size btn-warning">
													<span class="icon-quill"></span>
												</a>
												<a href="<?php echo base_url();?>ctrlServicios/Cdelete/<?php echo $atributos->idclientes; ?>" class="btn size btn-danger btn-remove">
													<span class="icon-bin"></span>
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





<!-- <button class="btn-remove">aceptar</button> -->

<!-- //-------lo dejare asi por el momento -->
<!--  <script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>  --> 