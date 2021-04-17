<h1>colores pa</h1>
<div id="contenedor_grafico">
  <canvas id="myChart" width="300" height="80"></canvas>
</div>
<!-- <script type="text/javascript" src="assets/stileGraficas/mygraficas.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">


var paramAño = [];
var paramCantidad = [];
var bgColor = [];
var bgBorder = [];
var url= "<?php echo base_url();?>";
var usuarioid= 1;//"<?php echo $_SESSION['idusuario'];?>"

$(document).ready(function(){
  $.post(url +"ctrlServicios/GraficaPro",
     {
        data : usuarioid
    },
   
    function(data){
      var obj = JSON.parse(data);
     
       paramAño = [];//lo vaciamos para carcar nuevamente
       paramCantidad = [];//lo vaciamos para carcar nuevamente

     bgColor = [];
     bgBorder = [];
     $.each(obj, function(i,item){
       var r = Math.random() * 255;
       r = Math.round(r);
       var rb = Math.random() * 255;
       rb = Math.round(rb);

       var g = Math.random() * 255;
       g = Math.round(g);
       var gb = Math.random() * 255;
       gb = Math.round(gb);

       var b = Math.random() * 255;
       b = Math.round(b);
       var bb = Math.random() * 255;
       bb = Math.round(bb);

       paramCantidad.push(item.cantidad);
       paramAño.push(item.año);
       bgColor.push('rgba('+r+','+g+','+b+', 0.5)');
       bgBorder.push('rgba('+rb+','+gb+','+bb+', 1.2)');
     });
      
     //Eliminamos y creamos la etiqueta canvas
     $('#myChart').remove();
     $('#contenedor_grafico').append("<canvas id='myChart' width='300' height='80'></canvas>");

     var ctx = $("#myChart");
     var myChart = new Chart(ctx, {
         type: 'line',//Tipos De Graficas (pie,bar,line)
         data: {
             labels: paramAño, // aqui los datos del eje X
             datasets: [{
                 label: 'Fechas',//Titulo
                 data: paramCantidad,// aqui los datos del eje Y
                 backgroundColor: bgColor,// Color de contenido
                 borderColor: bgBorder, //color de borde
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero:true
                     }
                 }]
             }
         }
     });
      
   });
});


</script>
     
        












