<?php 
  
function convierte_json($query){
$CI =& get_instance();
$items = array();
if ($query->num_rows() > 0){
foreach ($query->result() as $row){
array_push($items, $row);
}
}
return json_encode($items);       
}


function migrafica($data, $strDiv, $width, $height, $title, $subtitle, $id){
$datos = convierte_json($data);

$html = '<div id="'.$strDiv.'" style="width:'.$width.'px; height:'.$height.'px;"></div><script type="text/javascript">data = '.$datos.';
chart'.$id.' = AmCharts.makeChart("'.$strDiv.'", {
type: "serial",
dataProvider: data,
categoryField: "SemanaASM",
startDuration: 1,
colors:["#ff6969","#fcd202","#9069b3"],
percentPrecision: 1,
backgroundColor:"#FFFFFF",
rotate: false,
categoryAxis: {
autoRotateAngle: 90,
autoRotateCount: 0,
autoWrap:true,
minHorizontalGap: 60,
gridPosition: "start"
},
valueAxes: [
{
id: "ValueAxis-1",
stackType: "regular",
position: "left",
unit: "",
title: "QTY Defects"//INSPECTED
},
{
id: "ValueAxis-2",
position: "right",
unit: "%",
title: "Porcent"
}],
titles: [{
size: "10px",
text: "'.$title.'"
},
{
text: "'.$subtitle.'"
}],
graphs: [{
type: "column",
title: "INSPECTED",
valueField: "Defect",
lineThickness: 1,
fillAlphas:1,
fillColors: "Color",
"fillColorsField": "Color",
lineColor: "Color",
labelText: "[[value]]",
bullet: "line",
valueAxis: "ValueAxis-1",
balloonText: "<span style=\'font-size:13px;\'><b>[[value]]</b></span>"
},
{
type: "line",
title: "Porcent",
valueField: "FPY",
lineThickness: 1,
labelText: "[[value]]",
bullet: "round",
valueAxis: "ValueAxis-2",
balloonText: "<span style=\'font-size:13px;\'><b>[[value]]%</b></span>"
},
{
type: "line",
title: "Target",
valueField: "Target",
lineThickness: 1,
labelText: "[[value]]",
bullet: "round",
valueAxis: "ValueAxis-2",
balloonText: "<span style=\'font-size:13px;\'><b>[[value]]%</b></span>"
}],
legend: {
position: "bottom",
valueText: "[[value]]",
valueWidth: 100,
valueAlign: "left",
equalWidths: false
}
});
</script>
';
return $html;
}
 ?>