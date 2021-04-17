//---------MOSTRAR PRODUCTOS EN EL REPORTE DE INVENTARIO------
var mas ='';

$.post(url+"ctrlServicios/reportInventario",
    function (data){
    	var c = JSON.parse(data);
    	$.each(c, function(i,item){ //i = italika(puede ser una letra cualquiera)  item =item(tambien puede ser una variable cualquiera)
    		$('#tabla').append(
    			'<tr>'+
                    '<th>'+item.idproduct+'</th>' +
                    '<td>'+item.codigo_barra+'</td>' +
                    '<td>'+item.descripcion+'</td>' +
                    '<td>'+'$'+item.precio_venta+'</td>' +
                    '<td>'+'$'+item.precio_compra+'</td>' +
                    '<td>'+item.cantidad+'</td>' +
                    '<td>'+item.minimo+'</td>' +
                    '<td>'+item.maximo+'</td>' +
                '</tr>'
    			);

	});
});
//-----------PRODUCTOS BAJO DE INVENTARIO-------------------------------------
$.post(url+"ctrlServicios/ProductoBajoInventario",
    function (data){
        var BajoInv = JSON.parse(data);
        $.each(BajoInv, function(i,itemss){ //i = italika(puede ser una letra cualquiera)  item =item(tambien puede ser una variable cualquiera)
            $('#tablaBajoInv').append(
                '<tr>'+
                    // '<th>'+itemss.idproduct+'</th>' +
                    '<td>'+itemss.codigo_barra+'</td>' +
                    '<td>'+itemss.descripcion+'</td>' +
                    '<td>'+'$'+itemss.precio_venta+'</td>' +
                    '<td>'+'$'+itemss.precio_compra+'</td>' +
                    '<td style="background-color: #f00;">'+itemss.cantidad+'</td>' +
                    '<td>'+itemss.minimo+'</td>' +
                    '<td>'+itemss.maximo+'</td>' +
                '</tr>'
                );

    });
});
//------------MOSTRAR DATOS DE AJUSTE DE INVENTARIO-------------------------
$('#btnBuscarPro').click(function(){
    $.post(url+"ctrlServicios/mostrarAjustInv",
    {
        buscarProVajo : $('#CodBarraVajo').val()
    },

    function  (producto){
    var prodInv = JSON.parse(producto);
if (prodInv == null) {
    $.notify("El producto no existe");

        $("#idprod").val('');
        $("#inputDescripcion").val('');
        $("#inputCosto").val('');
        $("#inputPrecioVenta").val('');
        $("#inputCantidadActual").val('');
}else{

    $.notify("datos Encontrados", "success");
        $("#idprod").val(prodInv.idproduct);
        $("#inputDescripcion").val(prodInv.descripcion);
        $("#inputCosto").val(prodInv.precio_compra);
        $("#inputPrecioVenta").val(prodInv.precio_venta);
        $("#inputCantidadActual").val(prodInv.cantidad);
}
        

});
});
//------------ACTUALIZAR DATOS DE AJUSTE DE INVENTARIO-------------------------
$('#btnGuardarPro').click(function(){

    if ($("#inputCantidad").val() == '') {
        $.notify("Llene El Campo","error")

    }else{
        $.post(url+"ctrlServicios/ActualizarAjustInv",
        {
            id: $("#idprod").val(),
            costo: $("#inputCosto").val(),
            cantidad: $("#inputCantidad").val(),
            precioventa: $("#inputPrecioVenta").val()
        },
        function (ActualizarInv){
            var Actualizar = JSON.parse(ActualizarInv);
            if (Actualizar == true) {
                $.notify("datos Actualizados", "success");

                $("#CodBarraVajo").val('');
                $("#inputDescripcion").val('');
                $("#inputCantidadActual").val('');
                $("#inputCosto").val('');
                $("#inputCantidad").val('');
                $("#inputPrecioVenta").val('');

            }
            
            
        });

    }


});

//---------COLOCA EL CODIGO Y MUESTRA LOS DATOS PARA MODIFICAR PRODUCTOS--------------

$('#btnBuscar').click(function(){
    $.post(url+"ctrlServicios/mostrarDatomodificarProducto",
    {
        buscarPro : $("#buscarProduct").val()
    },

    function  (codigo){
    var c = JSON.parse(codigo);
if (c == null) {
    $.notify("El producto no existe");
}else{

    $.notify("datos Encontrados", "success");
        $("#codigoBarra").val(c.idproductos);
        $("#descripcion").val(c.descripcion);
        $("#precioCompra").val(c.precio_compra);
        $("#precioVenta").val(c.precio_venta);
        $("#cantidadActual_ca").val(c.cantidad);
        $("#minimo_as").val(c.minimo);
        $("#maximo_ns").val(c.maximo);
}
        

});
});
// ---------BOTON PARA MODIFICAR PRODUCTOS--------------
$('#modificar').click(function(){//pendiente por conponer no actualiza

    $.post(url+"ctrlServicios/modificarProducto",
        {
            codigoll: $("#codigoBarra").val(), descripcion: $("#descripcion").val(),
             precioVenta: $("#precioVenta").val(), 
             precioCompra: $("#precioCompra").val(),
             cantidadActual: $("#cantidadActual_ca").val(), 
             minimo: $("#minimo_as").val(), maximo: $("#maximo_ns").val()
        },

    function  (codigoss){
    var insert = JSON.parse(codigoss);
   
if (insert != null) {

    $.notify("datos Actualizados", "success");
    
}else{
        $.notify("El producto no existe");  
}
        

});
});




//---=========================================























































//-------RANDON NUMEROS ALEATORIOS SIN REPETIR----
// $("#numAleatorio").click(function(){
// var minimo=10000000;
// var maximo=40000000;
// var num= Math.floor(Math.random()*(minimo-(maximo+1))+(maximo+1));  
// alert(num);  

// });
//------------------------------------------------

//prueba de un pligin
// $(".btn-remove").click(function(){
//     swal({
//   title: "Estas Seguro que deseas eliminar?",
//   text: "El registro se eliminara por completo!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("El Archivo ha sido eliminado!", {
//       icon: "success",
//     });
//   } else {
//     swal("Tu archivo no se elimino. esta Intacto!");
//   }
// });
// });
