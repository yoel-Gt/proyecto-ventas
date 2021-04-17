<!-- Mis CSS -->
<div class="col-sm-12">
	<div class="input-group">
		<input id="IdCajero" type="hidden" value="<?php echo $this->session->userdata('idusuario')?>">
		<label class="col-form-label">Codigo del Prodcuto:</label>&nbsp;
		<input id="txt_cod_porducto" class="form-control" type="text" placeholder="Codigo de Barra">
		<span class="input-group-btn">
			<button onclick="venta();" class="btn btn-success">Enter-Agregar Producto
				<span class="icon-reply"></span>
			</button>
		</span>
		<div class="col-sm-4"></div>
	</div><br>

	<div class="form-group">
		<button class="btn btn-primary">
			<span class="icon-files-empty"></span>INS -Varios
		</button>
		<button class="btn btn-primary">
			<span class="icon-file-empty"></span>CTRL+P Art. Comun

		</button>
		<button class="btn btn-primary" onclick="modal_ventas();">
			<span class="icon-search"></span>F10 Buscar
		</button>
		<button class="btn btn-primary">
			<span class="icon-star-full"></span> F11 Mayoreo

		</button>
		<button class="btn btn-primary">
			<span class="icon-coin-dollar"></span> F7 Entradas

		</button>
		<button class="btn btn-primary">
			<span class="icon-coin-dollar"></span> F8 Salidas

		</button>
		<button type="button" class="btn btn-primary" onclick="eliminar_producto(id_fila_selected);">
			<span class="icon-bin"></span>Del Borrar Art
		</button>
	</div><br>

	<div>
		<table class="table-fixed" >
			<thead>
			<tr class="color table-bordered">
				<th style="width: 180px" >Codigo de Barra</th>
				<th style="width: 250px" >Descripcon del Producto</th>
				<th style="width: 140px" >Precio venta</th>
				<th style="width: 100px" >Cantidad</th>
				<th hidden style="width: 100px" >Precio Compra</th>
				<th style="width: 100px" >Importe</th>
				<th style="width: 100px" >Existencia</th>
				<th style="width: 760px" ></th>
			</tr>
			</thead>

			<tbody class="table-bordered" id="detalle_ventas">
			<!-- Los datos de la tala vienen de ajax , del script: js/ventas/ventas.js -->
			</tbody>
			
		</table>
	</div><br>

	<!-- My footer -->
	<div class="form-group posicion_izquierda">
		<div class="">
			<span id="spanProdVentActual"></span>

			<div class="form-group-btn">
				<button class="btn btn-primary">
					<span class="icon-loop2"></span> F5 Cambiar
				</button>
				<button class="btn btn-primary">
					<span class="icon-star-half"></span> F6 Pendiente
				</button>
				<button class="btn btn-primary">
					<span class="icon-bin2"></span> Eliminar
				</button>
			</div>
		</div>
		

		<div class="">
			<button type="button" class="btn btn-success tamano margen" data-toggle="modal" data-target="#modalMEdioDePago"><!--data-backdrop="static" -->
				<span class="icon-cart"></span> F12 Cobrar
			</button>
			<label id="PesosTotales" class="tamano margen_derecho" for="">$ 00.00</label>
		</div>

	</div>


	<div class="form-group posicion_izquierda">
		<div class="">
			<span class="stilos_span">Total</span>
			<span class="stilos_span">Paga con:</span>
			<span class="stilos_span">Cambio</span>
		</div>

		<div>
			<button class="btn btn-default">
				<span class="icon-download3"></span> Reimprimir Ultimo Ticket
			</button>
			<button class="btn btn-default">
				<span class="icon-file-text2"></span> Ventas del día y Devoluciones
			</button>
		</div>
		
	</div>
	  
	<!-- MODAL medio de pago-->
	<div class="modal fade" id="modalMEdioDePago" tabindex="-1" role="dialog">
  		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
  		  	<div class="modal-content">
  		  	  	<div class="modal-header">
  		  	  	  <h6 class="modal-title" id="exampleModalLabel">Venta del Producto a Cobrar</h6>
  		  	  	  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  		  	  	    <span aria-hidden="true">&times;</span>
  		  	  	  </button> -->
  		  	  	</div>
  		  	  	<div class="modal-body div-fond-body">
  		  	  	  <form>
					<div class="col-sm-7 float-left div-fond1">
					
						<div class="text-center">
							<label class="">Total a Cobrar</label>
						</div>
						<div class="text-center">
							<h3 id="h3totalACobrar">00.00</h3>
						</div>
  		  	  	    		<div class="form-group">
  		  	  	    		  <button type="button" class="btn btn-outline-info">
								<span class="icon-file-text2"></span>Efectivo
						  </button>
						  <button type="button" class="btn btn-outline-info">
								<span class="icon-file-text2"></span>Credito
						  </button>
						  <button type="button" class="btn btn-outline-info">
								<span class="icon-file-text2"></span>Tarte de Credito
						  </button>
						  <button type="button" class="btn btn-outline-info">
								<span class="icon-file-text2"></span>Vale
						  </button>
  		  	  	    		</div>

						<div class="input-group mb-3">
  							<div class="input-group-prepend">
  							  <span class="input-group-text">Paga con: $</span>
  							</div>
  							<input type="text" id="inputPagaCon" class="form-control col-sm-6" aria-label="Amount (to the nearest dollar)">
						</div>

						<div class="input-group mb-3">
  							<div class="input-group-prepend">
  							  <span class="input-group-text" id="spanCambio">Su cambio: $0</span>
  							</div>
						</div>
					</div>
					<div class="col-sm-5 float-right div-fond2">
						<div class="form-group">
  		  	  	    		  <button type="button" class="form-control btn btn-outline-success mb-3">
								<span class="icon-file-text2"></span>Cobrar e imprimir ticket
						  </button>
						  <button type="button" onclick="registrar_venta();" class="form-control btn btn-outline-success mb-3" data-dismiss="modal">
								<span class="icon-file-text2"></span>cobrar solo registrando la venta
						  </button>
						  <button type="button" class="form-control btn btn-outline-success mb-3">
								<span class="icon-file-text2"></span>cancelar
						  </button>
						  <div class="text-center">
						  	<button type="button" class="btn btn-outline-success mb-3">
								<span class="icon-file-text2"></span>ingresar nota
						  	</button>
						  </div>
						  
  		  	  	    		</div>

					</div>  	
  		  	  	  </form>
  		  	  	</div>
  		  	  	<div class="modal-footer div-fond-footer">
  		  	  	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  		  	  	  <button type="button" class="btn btn-primary">Send message</button>
  		  	  	</div>
  		  	</div>
  		</div>
	</div>
	<!-- ------ -->
	<!-- MODAL X -->
	<div class="modal" tabindex="-1" role="dialog" id="modal_Ventas">
  <div class="modal-dialog" role="document">
    <div class="modal-content contenido_venta_modal">
      <div class="modal-header">
        <h5 class="modal-title">Buscar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<input type="text" class="form-control" id="desc_produc" onkeyup="buscador_producto();" placeholder="Busqueda">
		<div class="tabla__contenedores">
			<table>
				<tr>
					<td>#</td>
					<td>Descripcion</td>
					<td>Precio</td>
				</tr>
				<tbody id="tabla__contenedor">

				</tbody>
			</table>
		</div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!-- ---------- -->
	
</div>



<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>  
