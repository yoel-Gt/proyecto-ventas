$(document).on('keypress', '#nombreCliente',function(e){
	if(e.which  === 13){
		Buscar_usuario();
		e.preventDefault();
	}
});

function Buscar_usuario() {
	// e.preventDefault();
	$.ajax({
		url:url +"ctrlServicios/saldo_cliente",
		type:"POST",
		async:false,
		data:{nombre:$('#nombreCliente').val()},
		success:function (params) {
			if (JSON.parse(params) == 'Error') {
				$.notify("Error de Conexion",'error');
			}else if(JSON.parse(params) == 'NA'){
				$('#nombreCliente').notify("Sin Coincidencia",{className:'info',position:'top center'});
			}else{
				let items = JSON.parse(params);
				contenedor = '';
				// contenedor +=`<div class="content-list">`
				$.each(items,function(e,item){
					contenedor+= `<div class="content-list">
					<b><span class="uperCase_"><a href="#" onclick="resumen_cliente(${item.idclientes})";>${item.nombre}</a></span></b>
					<span class="icon"><i class="icon-home2"></i>${item.direccion}<span>
					`;
					if (item.credito_activo == 1) {
						contenedor+=`<span class="icon-ok icon-smile2"></span>`;
					}else{
						contenedor+=`<span class="icon-fail icon-sad2"></span>`;
					}
					contenedor+=`</div>`;
				});
				
				$('#itemsClientes').html(contenedor);
				
			}
			
		}
	});
}

function resumen_cliente(id) {
	// console.table(`ID:${id}`);
	// var last_id =id;
	$.ajax({
		url:url +"ctrlServicios/resumen_cliente",
		type:'POST',
		data:{id},
		async:false,
		success:function(result){
			console.log(JSON.parse(result));
			let objeto = JSON.parse(result);
			
			console.log(objeto);
			let contenedor= '';
			let foto = ''; 
			if(objeto == 'NA'){
				$('#ResumenClientes').notify('No Existe Registro',{className:'info',position:'top center'});
				$('#ResumenClientes').html('');
				$('#fechas_abono_id').html('');
				$('#img_cliente').html('');
			}else if(objeto =='Error'){
				$.notify('Error De Conexion',{className:'error',position:'top center'})
			}else{

				let items =objeto[1];
				let item = objeto[0];

				contenedor+=`
					<span>Nombre:</span>
					<h5>${item['nombre']}</h5>
					<span class="name_">Telefono:</span>
					<p>${item['telefono']}</p>
					<span class="saldo_cli">Saldo:</span>
					<p class="saldo__">$ ${item['saldoActual']}</p>
				`;

				foto = `<center><img src="../assets/imagenes/empleados/${item['foto']}" alt="Cliente"></center>`;

			$('#ResumenClientes').html(contenedor);
			$('#img_cliente').html(foto);

			let listaFechas='';
			$.each(items,function(i,item){

				if (item.liquidacion == 1) {
					listaFechas+=`
				<li class="nav-item has-treeview menu-close">
    				<a href="#" class="nav-link active" style="
					background-color: #4fa746;">
    					<i class="nav-icon icon-stats-dots"></i>
    					<p>
							${item.fecha_abonos}
    						<i class="right fas fa-angle-left"></i>
    					</p>
    				</a>
    				<ul class="nav nav-treeview">
    				    <li class="nav-item">
    						<a href="#" class="nav-link ">
    							<i class="far fa-circle nav-icon"></i>
									<p>Credito:${item.adeudo}</p><br>
								<i class="far fa-circle nav-icon"></i>	
									<p>Abono:${item.abonos}</p><br>
								<i class="far fa-circle nav-icon"></i>
									<p>Saldo:${item.saldo}</p>
    						</a>
    					</li>
    				</ul>
				`;
				}else{
					listaFechas+=`
				<li class="nav-item has-treeview menu-close">
    				<a href="#" class="nav-link active">
    					<i class="nav-icon icon-stats-dots"></i>
    					<p>
							${item.fecha_abonos}
    						<i class="right fas fa-angle-left"></i>
    					</p>
    				</a>
    				<ul class="nav nav-treeview">
    				    <li class="nav-item">
    						<a href="#" class="nav-link ">
    							<i class="far fa-circle nav-icon"></i>
									<p>Credito:${item.adeudo}</p><br>
								<i class="far fa-circle nav-icon"></i>	
									<p>Abono:${item.abonos}</p><br>
								<i class="far fa-circle nav-icon"></i>
									<p>Saldo:${item.saldo}</p>
    						</a>
    					</li>
    				</ul>
				`;

				}

			});
			$('#fechas_abono_id').html(listaFechas);

			}
		}
	});
}


