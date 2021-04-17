//---------MODULO CLIENTE NUEVO----

//BOTON GUARDAR


document.addEventListener("DOMContentLoaded", () =>{
	let form = document.getElementById('form_subir');
	form.addEventListener("submit", function (e){
		e.preventDefault();
		subir_archivos(this);
	});
});

function subir_archivos(form) {
	let nombreImagen = $("#nombreImagen").val();
	let barraEstado = form.children[0].children[5].children[0];
	let span = barraEstado.children[0];
	// let botonCancelar = form.children[2].children[0];

	barraEstado.classList.remove('barra_verde','barra_roja','barra_neutra');
	//peticion
	let peticion = new XMLHttpRequest();
	//proceso
	peticion.upload.addEventListener("progress", (event) =>{

		let porcentaje = Math.round((event.loaded / event.total) * 100);

		barraEstado.style.width = porcentaje + '%';
		span.innerHTML = porcentaje + '%';
	});

	//finalizado
	peticion.addEventListener("load",() =>{
		barraEstado.classList.add('barra_verde');
		span.innerHTML = "proceso Completado";
	});

	peticion.open('POST','../subirArchivos/subir.php');
	peticion.send(new FormData(form));

	let imagen = nombreImagen.substring(12);

	if ($("#inputNombre").val() == '' || $("#inputDireccion").val() == '') {
        // lo Dejo vacio para que solo me muestre lo que le especifico en el formulario de la vista(nuevoCliente)
    }else{
        $.post(url+"ctrlServicios/GuardarCliente",
    {
        nombre : $("#inputNombre").val(),
        direccion : $("#inputDireccion").val(),
        telefono : $("#inputTelefono").val(),
		credito : $("#inputCredito").val(),
		imagen:imagen
    },

    function  (codigo){
    var result = JSON.parse(codigo);
    if (result == true) {

		$.notify("datos Guardados","success");

		$("#nombreImagen").val(null);
		barraEstado.classList.remove('barra_verde');
		barraEstado.classList.add('barra_neutra');
        $("#inputNombre").val('');
        $("#inputDireccion").val('');
        $("#inputTelefono").val('');
        $("#inputCredito").val('');
    }else{
		$.notify("error al guardar","error");
	}
        

});
    }
	

}
    


// BOTON CANCELAR
$('#btnCancelar').click(function(){
    $.notify("datos Cancelados","error");

    $("#inputNombre").val('');
    $("#inputDireccion").val('');
    $("#inputTelefono").val('');
    $("#inputCredito").val('');

});

//-------MUESTRA EL CONTENIDO DEL MODULO (MODIFICAR CLIENTE)-------
$.post(url+"ctrlServicios/mostrarClie",
    function (data){
        var objeto = JSON.parse(data);
        var output = '';
        $.each(objeto, function(i,item){ //i = italika(puede ser una letra cualquiera)  item =item(tambien puede ser una variable cualquiera)
            output +=
                '<tr>'+
                    '<th>'+item.idclientes+'</th>' +
                    '<th>'+item.nombre+'</th>' +
                    '<td>'+item.direccion+'</td>' +
					'<td>'+item.telefono+'</td>' +
					'<td><img style="height: auto; width: 70px;" src="../assets/imagenes/otros/'+item.foto+'" alt=""></td>' +
                    '<td>'+"$"+item.limite_credito+'</td>' +
                    '<td><button value="actualizar" title="actualizar" class="btn btn-primary btn-edit"><i class="fas fa-check-circle"></i></button>&nbsp;'+
                    '<button value="eliminar" title="eliminar" class="btn btn-danger btn-delete"><i class="far fa-dizzy"></i></button></td>'+
                '</tr>'
                });
        //NOTA: El &nbsp; del boton permite hacer una separacion entre los iconos

                $('#tabla tbody').append(output);
});

//----MUESTRA LOS CLIENTES POR BUSQUEDA DEL NOMBRE (MODIFICAR CLIENTE)--------------

$('#inputBuscar').keyup(function(){
    
    var text = $('#inputBuscar').val();
    var longitud = $('#inputBuscar').val().length;

    if (longitud >= 3) {
        $('#tabla tbody').html('');
        $.post(url+"ctrlServicios/mostrarClieBusqueda",
    {texto : text},
    function (data){
        var objeto = JSON.parse(data);
        var output = '';
        $.each(objeto, function(i,item){ //i = italika(puede ser una letra cualquiera)  item =item(tambien puede ser una variable cualquiera)
            output +=
                '<tr>'+
                    '<th>'+item.idclientes+'</th>' +
                    '<th>'+item.nombre+'</th>' +
                    '<td>'+item.direccion+'</td>' +
                    '<td>'+item.telefono+'</td>' +
                    '<td>'+item.limite_credito+'</td>' +
                    '<td><button value="actualizar" title="actualizar" class="btn btn-primary btn-edit"><i class="fas fa-check-circle"></i></button>&nbsp;'+
                    '<button value="eliminar" title="eliminar" class="btn btn-danger btn-delete"><i class="far fa-dizzy"></i></button></td>'+
                '</tr>'
                });

                $('#tabla tbody').append(output);
        });
    }else if (longitud == 0) {
        $('#tabla tbody').html('');
        $.post(url+"ctrlServicios/mostrarClieBusqueda",
    {texto : text},
    function (data){
        var objeto = JSON.parse(data);
        var output = '';
        $.each(objeto, function(i,item){ //i = italika(puede ser una letra cualquiera)  item =item(tambien puede ser una variable cualquiera)
            output +=
                '<tr>'+
                    '<th>'+item.idclientes+'</th>' +
                    '<th>'+item.nombre+'</th>' +
                    '<td>'+item.direccion+'</td>' +
                    '<td>'+item.telefono+'</td>' +
                    '<td>'+item.limite_credito+'</td>' +
                    '<td><button value="actualizar" title="actualizar" class="btn btn-primary btn-edit"><i class="fas fa-check-circle"></i></button>&nbsp;'+
                    '<button value="eliminar" title="eliminar" class="btn btn-danger btn-delete"><i class="far fa-dizzy"></i></button></td>'+
                '</tr>'
                });
        //data-toggle="modal" es siempre fijo no cambia  y el data-target="#idmodalCli" si cambia porque es por el donde vamos a mandar a llamar al modal.

                $('#tabla tbody').append(output);
        });
    }//termina else if
   
});//cierre de la funcion keyup.

//------FUNCION EDITAR (MODIFICAR CLIENTE)----------------------
// function sendDataAjax()
//vamos hacerlo de dos manera la primera sera con el boton actualizar y la otra forma con el boton eliminar
$(document).on('click','.btn-edit', function(elemento){
    elemento.preventDefault();//la propiedad .preventDefault() es propio de javascript que nos permite que la darle click en el boton esta no tenga que refrescar o actualizar la pagina.
    var id = $(this).parent().parent().children("th:eq(0)").text();
    var nombre = $(this).parent().parent().children("th:eq(1)").text(); //console.log($(this).parent().parent().first().text()); permite mostrar todos los datos del campo que se sea selecionado 
    var lugar = $(this).parent().parent().children("td:eq(0)").text();
    var telefono = $(this).parent().parent().children("td:eq(1)").text();
    var credito = $(this).parent().parent().children("td:eq(2)").text();

    $("#ModId").val(id);
    $("#ModNombre").val(nombre);
    $("#ModLugar").val(lugar);
    $("#ModTelefono").val(telefono);
    $("#ModCredito").val(credito);

    $("#idmodalCli").modal({backdrop: 'static', keyboard: false});

    $("#btnActualizar").click(actualizar);
});
//------------------
function actualizar(){
    $.post(url+"ctrlServicios/ActualizarCliente",
    {
        id : $("#ModId").val(),
        nombre : $("#ModNombre").val(),
        direccion : $("#ModLugar").val(),
        telefono : $("#ModTelefono").val(),
        credito : $("#ModCredito").val()
    },

    function  (codigo){
    var result = JSON.parse(codigo);

    if (result == true) {
        $.notify("Datos actualizados","success");

        $("#ModId").val('');
        $("#ModNombre").val('');
        $("#ModLugar").val('');
        $("#ModTelefono").val('');
        $("#ModCredito").val('');
    }
    

  });  
}
//-----BOTON ELIMINAR- CLIENTE----
$(document).on('click', '.btn-delete', function(elemento){
    elemento.preventDefault(); //la propiedad .preventDefault() es proia de javascript que nos permite que al darle click en el boton esta no tenga que refrescar o actualizar la pagina.

    var id = $(this).parent().parent().children("th:eq(0)").text();
    var nombre = $(this).parent().parent().children("th:eq(1)").text();

    $("#ModIdEli").val(id);
    $("#ModNombreEli").val(nombre);

    $("#idmodalCliEliminar").modal({backdrop: 'static', keyboard: false});

    $("#btnEliminarCli").click(Eliminar);
 
});

//VISUALIZA EL CLIENTE A EDITAR
function btn_editar_cliente(idCliente) {
	let id_cliente=idCliente;
	$.ajax({
		url: url + "ctrlServicios/EditarCliente",
		type: "POST",
		async:true,
		data: {id_cliente:id_cliente},
		success:function(result) {
			let cliente=JSON.parse(result);
			$('#clie_nombre').val(cliente[0].nombre);
			$('#clie_direccion').val(cliente[0].direccion);
			$('#clie_telefono').val(cliente[0].telefono);
			$('#clie_id').html(cliente[0].idclientes);

			$("#modal_cliente").modal("show");
		}
		
	});

}
//ACTUALIZACION DEL CLIENTE
function btn_cambios_cliente() {
	$.ajax({
		url: url + "ctrlServicios/btn_cambios_cliente",
		type:'POST',
		async:true,
		data: {
			nombre:$('#clie_nombre').val(),
			direccion:$('#clie_direccion').val(),
			telefono:$('#clie_telefono').val(),
			idcliente:$('#clie_id').html()
		},
		success:function(status){
			if(JSON.parse(status) == 1){
				$("#modal_cliente").modal("hide");
				$.notify('update','success');
				tabla_clientes();
			}else{
				$("#modal_cliente").modal("hide");
				$.notify('no se pudo actualizar','error');
			}
		}
	});
}
//VUELVE A MOSTRAR LA LISTA DE LOS CLIENTES
function tabla_clientes() {
	$.ajax({
		url: url +"ctrlServicios/tabla_clientes",
		type:'POST',
		async:true,
		success:function(data){
			$("#tbody_cliente").html(data);
		}
	});
}

//MODAL VISUALIZACION DE CLIENTE DETALLADO
function btn_view_cliente(idCliente) {
	$('#modal_cliente_detalle').modal('show');
	$.ajax({
		url: url+"ctrlServicios/view_Cliente_detail",
		type:'POST',
		async:true,
		data:{idCliente:idCliente},
		success:function(data){
			console.log(data);
			$('#view_modal_cliente').html(data);
		}
	});
}
 
// MODAL DAR DE BAJA A UN CLIENTE
let id_Cliente = '';
function btn_baja_cliente(idCliente) {
	$("#clienteID").html(idCliente + ' ?');
	$('#Modal_alerts').modal("show");
	id_Cliente = idCliente;
}

function btn_baja_cliente_ok(idCliente) {
	
	$.ajax({
		url: url +"ctrlServicios/baja_de_cliente",
		type:'POST',
		async:true,
		data:{idCliente:idCliente},
		success:function(result){
			if(JSON.parse(result) == 1){
				$('#Modal_alerts').modal("hide");
				$.notify('update','success');
				tabla_clientes()
			}else{
				$.notify('error al actualizar','error');
			}
		}
	});
}


// const imagenPreview =document.getElementById('img_preview');
// const imgUploader = document.getElementById('img_uploader');
// const CLUDINARY_URL = base_url()+"assets/imagenes/productos/" ;
// const CLUDINARY_UPLOAD_PRESET='';
// console.log(url);
// imgUploader.addEventListener('change', async (e) =>{
// 	// console.log(e);
// 	const file = e.target.files[0];
// 	const  FormData = new FormData();
// 	FormData.append('file',file);
// 	// FormData.append('upload_preset', CLUDINARY_UPLOAD_PRESET);
	
// 	const respuesta = await axios.post(CLUDINARY_URL,FormData,{
// 		Headers:{
// 			'content-type': 'multipart/form-data'
// 		}
		
// 	});

// 	console.log(respuesta);
// });

