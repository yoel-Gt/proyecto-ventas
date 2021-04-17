document.addEventListener("DOMContentLoaded", () =>{
	let form = document.getElementById('form_subir');
	form.addEventListener("submit", function (e){
		event.preventDefault();
		subir_archivos(this);
	});
});

function subir_archivos(form) {
	let nombreImagen = $("#nombreImagen").val();
	let barraEstado = form.children[0].children[5].children[0];
	let span = barraEstado.children[0];
	// let botonCancelar = form.children[2].children[0];

	barraEstado.classList.remove('barra_verde','barra_roja');

	//peticion
	let peticion = new XMLHttpRequest();

	//proceso

	peticion.upload.addEventListener("progress", (event) =>{

		let porcentaje = Math.round((event.loaded / event.total) * 100);

		console.log(porcentaje);
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

	
	//cancelar
	// botonCancelar.addEventListener("click", ()=>{
	// 	peticion.abort();
	// 	barraEstado.classList.remove('barra_verde');
	// 	barraEstado.classList.add('barra_roja');
	// 	span.innerHTML = "proceso Cancelado";
	// });

	console.log(nombreImagen.substring(12));
	

}
