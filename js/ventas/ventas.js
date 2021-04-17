//#########  Agregar los productos a la tabla  ############
// isNaN(dato)
//EJECUTA LA FUNCION VENTA POR MEDIO DE ENTER
let totalAcobrar=0;
$('#txt_cod_porducto').keypress(function (event) {
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if (keycode == '13') {
		venta();
	}
});
// BUSCA Y VALIDA SI EXISTE EL PRODUCTO
let id_fila_selected; //variable global tomar el id de la fila
function venta() {
	let codigo = $('#txt_cod_porducto').val();
	$.ajax({
		url: url + 'ctrlServicios/valida_product',
		type: 'POST',
		async: true,
		data: { codigo: codigo },
		success: function (estado) {
		
			if (estado == 7) {
				$.ajax({
					url: url + 'ctrlServicios/seach_product',
					type: 'POST',
					async: true,
					data: { codigo: codigo },
					success: function (data) {

						let producto = JSON.parse(data);
						let output = '';
						let total = 0;
						let camtidadProducto = 0;

						$('#detalle_ventas').html('');
						var count=0;
						$.each(producto, function (i, item) {
							count++;
							output +=
								'<tr class="tr-selected" id="fila'+count+'" onclick="seleccionar(this.id);">' +
								'<td style="width: 180px" class="color_CodBarra item_Barra"> ' + item.barcode + ' </td>' +
								'<td style="width: 250px" class="item_Descript">' + item.descript + '</td>' +
								'<td style="width: 140px" align="center" class="item_Precio">' + item.precio_venta + '</td>' +
								'<td style="width: 100px" align="center" class="item_Cantidad">' + item.cantidad + '</td>' +
								'<td hidden style="width: 100px" align="center" class="item_precio_compra">' + item.precio_compra + '</td>' +
								'<td style="width: 100px" class="color_Import" align="right">' + item.Total + '</td>' +
								'<td style="width: 100px" align="center">' + item.stock + '</td>' +
								'</tr>';

							total += parseFloat(item.Total);

							camtidadProducto = camtidadProducto + parseInt(item.cantidad);
						});
						$('#detalle_ventas').append(output);
						$('#spanProdVentActual').html(camtidadProducto + " Productos en la venta actual.");
						$('#PesosTotales').html('$ ' + total.toFixed(2));
						totalAcobrar = total.toFixed(2)
						$('#h3totalACobrar').html('$ ' + totalAcobrar);

					}
				});

			} else if (estado == 5) {
				$.notify("Sin Stock", "error");
			} else {
				$.notify("El Producto No Existe", "danger");
			}
			//limpio el input codigo de barra
			$('#txt_cod_porducto').val('');

		},
		error: function (error) {
		}

	});
}
//SELECIONADA LA FILA CON UN COLOR
function seleccionar(id_fila){
	if($('#'+id_fila).hasClass('tr-selecionada')){
		$('#'+id_fila).removeClass('tr-selecionada');
	}else{
		$('#'+id_fila).addClass('tr-selecionada');
	}
	id_fila_selected =id_fila;
}
//ELIMINARLA LA FILA SELECCIONADA
function eliminar_producto(id_fila) {
	//$('#'+id_fila).remove();
	let elementosTD=$('#'+id_fila).html();
	let logn =elementosTD.substring(25, 67)
	let IDBarra = logn.split(' ');
	IDBarra=IDBarra[2];
	
	$.ajax({
		url: url+'ctrlServicios/eliminar_producto',
		type: 'POST',
		async:true,
		data: {IDBarra:IDBarra},
		success:function (data){
			if (data !== '"fail"') {
				let producto = JSON.parse(data);
				let output = '';
				let total = 0;
				let camtidadProducto = 0;

				$('#detalle_ventas').html('');
				var count=0;
				$.each(producto, function (i, item) {
					count++;
					output +=
						'<tr class="tr-selected" id="fila'+count+'" onclick="seleccionar(this.id);">' +
						'<td style="width: 180px" class="color_CodBarra item_Barra"> ' + item.barcode + ' </td>' +
						'<td style="width: 250px" class="item_Descript">' + item.descript + '</td>' +
						'<td style="width: 140px" align="center" class="item_Precio">' + item.precio_venta + '</td>' +
						'<td style="width: 100px" align="center" class="item_Cantidad">' + item.cantidad + '</td>' +
						'<td hidden style="width: 100px" align="center" class="item_precio_compra">' + item.precio_compra + '</td>' +
						'<td style="width: 100px" class="color_Import" align="right">' + item.Total + '</td>' +
						'<td style="width: 100px" align="center">' + item.stock + '</td>' +
						'</tr>';

						total += parseFloat(item.Total);

						camtidadProducto = camtidadProducto + parseInt(item.cantidad);
					});
					$('#detalle_ventas').append(output);
					$('#spanProdVentActual').html(camtidadProducto + " Productos en la venta actual.");
					$('#PesosTotales').html('$ ' + total.toFixed(2));
					totalAcobrar = total.toFixed(2)
					$('#h3totalACobrar').html('$ ' + totalAcobrar);
			}else{
				$.notify('msj: '+JSON.parse(data),'error')
			}
			
			
		}
	});

}

//CALCULO DEL MONTO A PAGAR
$('#inputPagaCon').keyup(function(event){
	let isnumber = event.key
	let montoACobrar;
	let pagaCon;
	let totalCambio;
	if (isnumber == 'Backspace') {
		if ($('#inputPagaCon').val() == '') {
			$('#spanCambio').html('Su cambio: $0');
		}else{
			montoACobrar= totalAcobrar;
			pagaCon = $('#inputPagaCon').val();

			totalCambio = parseFloat(pagaCon) - parseFloat(montoACobrar);
			console.log(totalCambio);
			$('#spanCambio').html('Su cambio: $' + totalCambio.toFixed(2));
		}

	}else if(isNaN(isnumber)){
		$.notify('Ingrese un dato numerico','error');
	}else{
		montoACobrar= totalAcobrar;
		pagaCon = $('#inputPagaCon').val();

		totalCambio = parseFloat(pagaCon) - parseFloat(montoACobrar);
		console.log(totalCambio);
		$('#spanCambio').html('Su cambio: $' + totalCambio.toFixed(2));
	}
});

//REALIZAR VENTA
function registrar_venta(){
	let item_Barra=[];
	let item_descripcion=[];
	let item_Cantidad=[];
	let item_Precio_venta=[];
	let item_precio_compra=[];
	let idCliente= 0;
	let idCajero=0;
	idCajero = $('#IdCajero').val();

	$('.item_Barra').each(function(){
		item_Barra.push($(this).text())
	});
	$('.item_Descript').each(function(){
		item_descripcion.push($(this).text())
	});
	$('.item_Precio').each(function(){
		item_Precio_venta.push($(this).text())
	});
	$('.item_Cantidad').each(function(){
		item_Cantidad.push($(this).text())
	});
	$('.item_precio_compra').each(function(){
		item_precio_compra.push($(this).text())
	});
	console.log(item_Barra);
	$.ajax({
		url: url + 'ctrlServicios/guardar_venta',
		type: 'POST',
		async: true,
		data: {
			item_Barra:item_Barra,
			item_descripcion,
			item_Cantidad,
			item_Precio_venta, 
			item_precio_compra,
			idCajero,
			idCliente},
		success: function(result) {
			if(result > 0){
				$.notify('venta realizada','success');
				limpiar_venta_actual();
			}else{
				$.notify('Ocurrio Un Error Al Guardar','error');
			}
		}
	});
}
//LIMPIA LA VENTA ACTUAL DESPUES DE REALIZAR LA VENTA
function limpiar_venta_actual(){
	
	$.ajax({
		url: url + 'ctrlServicios/limpiar_venta_actual',
		type:'POST',
		async: true,
		success: function(result){
			$('#detalle_ventas').html('');
			$('#spanProdVentActual').html('');
			$('#PesosTotales').html('');
			// $('#submit').click();
		}
	});
}

//BUSCAR 

function modal_ventas() {
	// let contenido='';
	// contenido =`
	// <div class="modal-header">
    //     <h5 class="modal-title">Modal title</h5>
    //     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    //       <span aria-hidden="true">&times;</span>
    //     </button>
    //   </div>
    //   <div class="modal-body">
    //     <p>Modal body text goes here.</p>
    //   </div>
    //   <div class="modal-footer">
    //     <button type="button" class="btn btn-primary">Save changes</button>
    //     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    //   </div>
	// `;
	// $('.contenido_venta_modal').html(contenido);
	$('#modal_Ventas').modal('show');
}

function buscador_producto() {
	let producto = $('#desc_produc').val();
	if(producto == ''){
		$('#tabla__contenedor').html('');
	}else{
		$.ajax({
			type:'POST',
			url:url+"ctrlServicios/buscador_producto",
			data:{producto},
			success:function(result){
				
				$('#tabla__contenedor').html(result);
			}
		});
	}
	
}
