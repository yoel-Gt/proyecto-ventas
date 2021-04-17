function  catalogo_productos(){
	$.ajax({
		url: url + "ctrlServicios/catalogo_productos",
		type:'POST',
		async:true,
		success:function(products){
			let product = JSON.parse(products);
			let contenido='';
			product.forEach(producto =>{
				contenido+=
				'<div class="contenido__catalogo__producto">'+
					'<img class="img_pro" src="../'+producto.imagen+'" alt="">'+
					'<center><h4>'+producto.descripcion+'</h4>'+
					'<h5>$'+producto.precio_venta+'</h5>'+
					'<img data-value="'+producto.codigo_barra+'" class="codigo"/>'+
					'<span id="span1"></span>'+
					'<span id="span2"></span>'+
					'<span id="span3"></span>'+
					'<span id="span4"></span>'+
				'</div>';
			});
			
			// '<h6>'+producto.codigo_barra+'</h6></center>'+
			$('.contaner__catalogo__producto').html(contenido);
			JsBarcode(".codigo").options({displayValue: false,height: 10}).init();
		}
	});
}

// function img_codigo(){
// 	alert("aqui")
// 	JsBarcode("#codigo", "mireli")


// }

//---------CONFIGURACIONES DE JSBARCODE-----------
// JsBarcode("nombre De la Clase o id","valor a convertir codigo")
// 	.options({
// 		format: "CODE128",// El formato
// 		width: 2, // La anchura de cada barra
// 		height: 30, // La altura del código
// 		displayValue: true, // ¿Mostrar el valor (como texto) del código de barras?
// 		text: "Hola", // Texto (no código) que acompaña al barcode
// 		fontOptions: "bold", // Opciones de la fuente del texto del barcode
// 		textAlign: "left", // En dónde poner el texto. center, left o right
// 		textPosition: "top", // Poner el texto arriba (top) o abajo (bottom)
// 		textMargin: 10, // Margen entre el texto y el código de barras
// 		fontSize: 8, // Tamaño de la fuente
// 		background: "#8bc34a", // Color de fondo
// 		lineColor: "#FF0000", // Color de cada barra
// 		marginTop: 10, // Margen superior
// 		marginRight: 10, // Margen derecho
// 		marginBottom: 5, // Margen inferior
// 		marginLeft: 35, // Margen izquierdo
// 	})
//  .init();
