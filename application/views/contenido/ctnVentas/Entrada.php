<!-- Mis CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/miscss/estilo.css"> 

<span>Vista Nueva De Ventas</span>

<div class="col-sm-12">
	<div class="input-group">
		
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
		<button class="btn btn-primary">
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
		<button class="btn btn-primary">
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
			<span>20 Productos en la venta actual.</span>

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
			<button class="btn btn-success tamano margen">
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

	
	
	
</div>






<script type="text/javascript">
	var url= "<?php echo base_url();?>";
</script>  
