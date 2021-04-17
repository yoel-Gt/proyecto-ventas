$(document).on('keypress', '#text_cliente',function(e){
	if(e.which  === 13){
		Buscar__cliente();
		e.preventDefault();
	}
});

function Buscar__cliente() {
	let cliente = $("#text_cliente").val();
	let Perfil = "";
	let saldo = 0;
	let actionOr;
	if (cliente == '' ) {
		cliente = $('#id__clientes').val();
	}
	// /^\s+$/.test(cliente)   valida que no coloque espacios para que no se ejecute la funcion
	if (cliente == "" || /^\s+$/.test(cliente)) {
		$.notify("inserte un dato valido", "danger");
	} else {
		if (isNaN(cliente)) {
			//letras
			actionOr = "nombre";
		} else {
			//numero
			actionOr = "idclientes";
		}

		$.ajax({
			url: url + "ctrlServicios/buscar_cliente_abono",
			type: "POST",
			async: true,
			data: { cliente, actionOr },
			success: function (result) {
				// console.table(JSON.parse(result));
				let item = JSON.parse(result);
				console.log(item);
				console.log(item.limite_credito);
				Perfil = `<input type="hidden" id="id__clientes" value="${item.idclientes}">
					  <img class="profile-img" src="../assets/imagenes/empleados/${item.foto}" alt="">
					  <h5>${item.nombre}</h5>`;
				saldo = item.saldoActual;

				$("#img_perfil_cliente").html(Perfil);
				$("#saldo_cliente").html(saldo);
			},
		});
	}
}

function Cobrar_cliente() {
	let monto = $('#monto_a_pagar').val();
	let idCliente = $('#id__clientes').val();
	
	$.ajax({
		url:url + "ctrlServicios/abono_cliente",
		type:'POST',
		async: true,
		data:{monto,idCliente},
		success: function(status){
			let estatus = JSON.parse(status);
			console.log(JSON.parse(status));
			if (estatus=='No_Operacion') {
				$.notify('El monto a pagar, es mayor al adeudo',{className:'error',position:'top center'});
			}else if(estatus=='OK'){
				$.notify('Operaccion Exitosa',{className:'success',position:'top center'});
				Buscar__cliente();
			}else{
				alert("Error No Controlado "+estatus);
			}
		}
	});
}
