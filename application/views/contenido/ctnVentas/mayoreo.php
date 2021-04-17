<h1>Vista Mayoreo</h1>

<script type="text/javascript">



	function calcular(){
			var text = $("#num1").val();
			var nText = text.length;
			var i;
			for (i = 0; i < nText; i++) {
			if (text.substr(i,1) === "a" || text.substr(i,1) === "e" || text.substr(i,1) === "i" || text.substr(i,1) === "o" || text.substr(i,1) === "u") {
				
			 var z = text.substr(i,1)
			console.log(z);
			;
			
		}

	}
	 
}
	 // function calcular(){
	 // 	var num1 = $("#num1").val()
	 // 	var dividir = 2
	 // 	// var dividir2 =Math.floor(num1/2)
	 // 	if (num1 % dividir ==0) {
	 // 		$("#dato").html("<h5> el numero es divisiblie por 2</h5>")
	 // 	}else{
	 // 		$("#dato").html("<h5> el numero no es divisiblie por 2</h5>")
	 // 	}
	 	
	 // }

	// var anioVisiesto = prompt("Escriba el año:")
	// function calcular(){
	// 	var anioVisiesto = $("#Bisiesto").val()
	// 	// var resultado_A = (anioVisiesto/4)
	// 	// var resultado_B = Math.floor(resultado_A)
		
	// 	// var	resultado_C = (anioVisiesto/100)
	// 	// var	resultado_D = Math.floor(resultado_C)
	
	// 	// var	resultado_E = (anioVisiesto/400)
	// 	// var	resultado_F = Math.floor(resultado_E)
		
	// 	if ((anioVisiesto % 4 == 0 && anioVisiesto % 100 != 0) || anioVisiesto % 400 == 0) 	{
	// 		$("#dato").html("<h5> el año " +anioVisiesto+ " es visiesto </h5>")
	// 	}else{
	// 		$("#dato").html("<h5> el año " +anioVisiesto+ " no es Bisiesto </h5>")
	// 	}
	// 	$("#Bisiesto").val('')
	// }

</script>

<!-- <div class="col-sm-12">
	<div class="row">
		<div class="col-sm-3 ">
			<input type="text" name="Bisiesto" id="Bisiesto">
		</div>
		<div class="col-sm-3">
			<button class="btn btn-primary" onclick="calcular();">calcular Año Visiesto</button>
		</div>
		<div class="col-sm-3" id="dato" style="color:#FFE807; background-color:#4705A6;text-align: center;  "></div>	
	</div>
</div> -->

<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-2 ">
			<input type="text" name="num1" id="num1">
		</div>
		<div class="col-sm-3">
			<button class="btn btn-primary" onclick="calcular();">calcular numero mayor</button>
		</div>
		<div class="col-sm-3" id="dato" style="color:#FFE807; background-color:#4705A6;text-align: center;  "></div>	
	</div>
</div>