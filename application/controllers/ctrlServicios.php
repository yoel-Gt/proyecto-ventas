<?php

/**
 * 
 */
require('./assets/fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
	// Título
	//el numero 1 es para ponerle un borde si le ponemos o se queda sin borde
	$this->Cell(60,10,'Reporte de Productos',1,0,'C');
    // Salto de línea
	$this->Ln(20);
	//encabezado de las columnas
	$this->Cell(50,10,'Codigo',1,0,'C',0);
	$this->Cell(100,10,'Productos',1,0,'C',0);
	$this->Cell(40,10,'Precio',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

class ctrlServicios extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelServicios');
		$this->load->library('encryption');
	}
	// -----------------FUNCIONES PRODUCTOS---------------------------------

	// public function GuardarProducto(){
	// 	$datos['codigo'] = $this->input->post('codigoBarra');
	// 	$datos['descripcion'] = $this->input->post('descripcion');
	// 	$datos['precio_venta'] = $this->input->post('precioVenta');
	// 	$datos['precio_compra'] = $this->input->post('precioCompra');

	// 	$this->modelServicios->GuardarProducto($datos);
	// }

	//---------------notificaciones
	public function notificacion_cliente()
	{
		$result =$this->modelServicios->notificacion_cliente();
		echo json_encode($result);
	}

	//####### NUEVA FUNCION PARA VENTA VERCION 2
	public function valida_product(){
		$codigoProducto = $this->input->post('codigo');
		$result = $this->modelServicios->valida_product($codigoProducto);
		echo ($result); 
	}

	public function seach_product()
	{
		$codigoProducto = $this->input->post('codigo');
		$result = $this->modelServicios->seach_product($codigoProducto);
		echo json_encode($result);
		
		//echo $sql;
	}

	//ELIMINAR UN PRODUCTO DE LA VENTA ACTUAL
	public function eliminar_producto()
	{
		$IDBarra=$_POST["IDBarra"];
		$result=$this->modelServicios->eliminar_producto($IDBarra);
		echo json_encode($result);
	}
	// ### REALIZAR VENTA
	public function guardar_venta()
	{
		if(isset($_POST["item_Barra"])){
			$item_Barra=$_POST["item_Barra"];
			$item_descripcion=$_POST["item_descripcion"];
			$item_Cantidad=$_POST['item_Cantidad'];
			$item_Precio_venta=$_POST['item_Precio_venta'];
			$item_precio_compra=$_POST['item_precio_compra'];
			$idCajero=$_POST['idCajero'];
			$idCliente=$_POST['idCliente'];

			$result = $this->modelServicios->guardar_venta($item_Barra,$item_descripcion,$item_Cantidad,$item_Precio_venta,$item_precio_compra,$idCajero,$idCliente);
			echo json_encode($result);
		}
		
	}
	//### LIMPIAR VENTA ACTUAL
	public function limpiar_venta_actual()
	{
		$result=$this->modelServicios->limpiar_venta_actual();
	}

	//### METODO NORMAL (FORMA DOS DE HACERLO)
	public function GuardarProducto(){
		$datos = array(
			'barra' => $this->input->post('pro_codigoBarra'),
			'descripcion' => $this->input->post('pro_descripcion'),
			'precioC' => $this->input->post('pro_precioC'),
			'precioV' => $this->input->post('pro_precioV'),
			'cantidadAc' => $this->input->post('pro_cantidadAc'),
			'minimo' => $this->input->post('pro_minimo'),
			'maximo' => $this->input->post('pro_maximo'),
		);
		// var_dump($_FILES["file"]);
		//$_SERVER['DOCUMENT_ROOT'] .
		$nuevo_nombre = time()."_".$_FILES["file"]["name"];
		$nuevo_nombre = str_replace(" ","_",$nuevo_nombre);
		$directorio = './assets/imagenes/productos/';
		$archivo =$directorio . basename($_FILES["file"]["name"]);
		$nuevo_nombre = $directorio . $nuevo_nombre;

		$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
		$valSiEsImg = getimagesize($_FILES['file']['tmp_name']);
		// var_dump($valSiEsImg);

		if($valSiEsImg != false){
			//valida el tamaño en peso
			$size = $_FILES["file"]["size"];
			if($size > 500000){
				echo "la imagen debe de ser menor a 500kb";
			}else{
				if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"|| $tipoArchivo == "png"){
					//se valido el archivo correctamente
					if(move_uploaded_file($_FILES['file']['tmp_name'],$nuevo_nombre)){
						// el archivo se subio correctamente
						$datos['imagen']= substr($nuevo_nombre,2);
						$sms['status'] = $this->modelServicios->GuardarProducto($datos);
						if($sms['status'] == "exito"){
							$sms['status'] = '<div class="alert alert-success" role="alert">
  										Datos Guardados
									</div>';
						}else if ($sms['status'] == "error") {
							$sms['status'] == '<div class="alert alert-danger" role="alert">
										Ocurrio un error al Guardar
						  			</div>';
						}
						$activo['activo'] = ["nuevoProducto","productos"];
						$this->load->view('diseñoweb/header');
						$this->load->view('diseñoweb/body',$activo);
						$this->load->view('contenido/ctnProductos/nuevoPro',$sms);
						$this->load->view('diseñoweb/footer');
					}else{
						echo $this->upload->display_errors();
					}
				}else{
					echo "solo acepta archivos jpg y jpeg";
				}
			}
		}else{
			echo "el doc no es una imagen";
		}

			// $config = array(
			// 	'upload_path' => '../assets/imagenes/otros/',
			// 	'allowed_types' => "gif|jpg|png|jpeg",
			// 	'overwire' => true,
			// 	'max-size' => "8192000");
			// 	$this->load->library('upload',$config);

			// 	$this->upload->do_upload('imgProducto');
	
	}
// -----------------FUNCIONES PRODUCTOS---------------------------------
	public function catalogo_productos()
	{
		$producto = $this->modelServicios->catalogo_productos();
		echo json_encode($producto);
	}

// -----------------FUNCIONES INVENTARIO---------------------------------
	public function reportInventario(){
		// $s = $this->input->post('dato');
		echo json_encode($this->modelServicios->reportInventario());
	}

	public function visualizar_productos_bajo()
	{
		$result = $this->modelServicios->visualizar_productos_bajo();
		foreach($result as $proVajo){
			echo '
			<tr>
				<td>'.$proVajo->codigo_barra.'</td>
				<td>'.$proVajo->descripcion.'</td>
				<td style="background: red;
				border-radius: 10px;">'.$proVajo->cantidad.'</td>
				<td>'.$proVajo->precio_compra.'</td>
				<td>'.$proVajo->precio_venta.'</td>
			</tr>';
		}

	}

//--------------MOSTRAR LOS DATOS A MODIFICAR DEL MODULO PRODUCTOS-------------------------
	public function mostrarDatomodificarProducto(){
		$codigo = $this->input->post('buscarPro');

		$resultado = $this->modelServicios->mostrarDatomodificarProducto($codigo);

		echo json_encode($resultado);
	}
//--------------MODIFICAR LOS DATOS DEL MODULO PRODUCTOS-------------------------
	public function modificarProducto(){
		$codigoss = $this->input->post('codigoll');
		$descripcion = $this->input->post('descripcion');
		$precioVenta = $this->input->post('precioVenta');
		$precioCompra = $this->input->post('precioCompra');
		$cantidadActual = $this->input->post('cantidadActual');
		$minimo = $this->input->post('minimo');
		$maximo = $this->input->post('maximo');

		$resultado = $this->modelServicios->modificarProducto($codigoss, $descripcion, $precioVenta, $precioCompra, $cantidadActual, $minimo, $maximo);

		echo json_encode($resultado);
	}

//--------------GUARDAR LOS DATOS DEL MODULO CLIENTES (NUEVO CLIENTE)-------------------------
	public function GuardarCliente(){
		$nombre = $this->input->post('nombre');
		$direccion = $this->input->post('direccion');
		$telefono = $this->input->post('telefono');
		$credito = $this->input->post('credito');
		$imagen = $this->input->post('imagen');
		

		$retornoId = $this->modelServicios->GuardarCliente($nombre,$direccion,$telefono,$imagen);

		//echo json_encode($retornoId);
		if ($retornoId > 0) {
			$retornaquery = $this->modelServicios->Guardar_cliente($credito, $retornoId);

		}else{
			echo "Ocurrio un Error Intente nuevamente";
		}

		if ($retornaquery > 0) {
			echo json_encode($retornaquery);
		}else{
			echo "algo salio mal";
		}

	}

	//MOSTRAR TABLA CLIENTES (MODIFICAR CLIENTE)
	public function mostrarClie(){
		echo json_encode($this->modelServicios->mostrarClie());
	}

	// MOSTRAR EL RESULTADO DE LA BUSQUEDA(MODIFICAR CLIENTE)
	public function mostrarClieBusqueda(){
		$text = $this->input->post('texto');
		$resultado = $this->modelServicios->mostrarClieBusqueda($text);
		echo json_encode($resultado);

	}
	//TABLA DE LOS CLIENTES
	public function tabla_clientes()
	{
		$datos = $this->modelServicios->listaClientes();
		foreach ($datos as $atributos){
			echo '<tr><td>';
			echo $atributos->idclientes.'</td><td>';
			echo $atributos->nombre.'</td><td>';
			echo $atributos->direccion.'</td><td>';
			echo $atributos->telefono.'</td>';

			if ($atributos->credito_activo == 1) {
				$style="class='label label-success'";
				echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p></td>";
			}else{
				$style='class="label label-danger"';
				echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivado</font></span></p></td>";
			}
			

				echo '<td>
				<div class="btn-group">
				<button onclick="btn_view_cliente('.$atributos->idclientes.');" class="btn btn-primary btn-sm" id="btn_edit">
			<span class="icon-zoom-in"></span>
		</button>'; 
			echo '<button onclick="btn_editar_cliente('.$atributos->idclientes.');" class="btn btn-warning btn-sm" id="btn_edit">
			<span class="icon-quill"></span>
		</button>';		
			echo '<button onclick="btn_baja_cliente('.$atributos->idclientes.');" class="btn btn-danger btn-sm" id="btn_baja">
			<span class="icon-bin"></span>
		</button>
	</div>
</td>';	

		}
		// echo  json_encode($datos);
		//<a href="'.$atributos->idclientes.'" class="btn btn-danger btn-sm">
		//	<span class="icon-bin"></span>
		//	</a>
	}

	public function baja_de_cliente()
	{
		$idCliente = $this->input->post('idCliente');
		$result = $this->modelServicios->baja_de_cliente($idCliente);
		echo json_encode($result);
		
	}

	//MOSTRAR CLIENTE A DETALLE
	public function view_Cliente_detail()
	{
		$idCliente = $this->input->post('idCliente');
		$result = $this->modelServicios->view_Cliente_detail($idCliente);
		$liga= base_url();
		echo'
		<div class="col-4">
		<img class="img-cliente" src="'.$liga.'assets/imagenes/otros/'.$result->foto.'">
		</div>
		<div class="col-8">
			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">Nombre</span>
  			</div>
  				<input value="'.$result->nombre.'" type="text" class="form-control">
			</div>

			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">Dirección</span>
  			</div>
  				<input value="'.$result->direccion.'" type="text" class="form-control">
			</div>

			<div class="input-group mb-3">
  				<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">Telefono</span>
  			</div>
  				<input value="'.$result->telefono.'" type="text" class="form-control">
			</div>
		</div>'; 

	}

	public function ActualizarCliente(){
			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');
			$direccion = $this->input->post('direccion');
			$telefono = $this->input->post('telefono');
			$credito = $this->input->post('credito');

			$resultado_id = $this->modelServicios->ActualizarCliente($id,$nombre,$direccion,$telefono);

			if ($resultado_id > 0) {
				$resultado = $this->modelServicios->ActualizarCliente_Credito($resultado_id,$credito);
			}
			echo json_encode($resultado);
	}
	//VISUALIZAR CLIENTE A EDITAR
	public function EditarCliente()
	{
		$idCliente = $this->input->post('id_cliente');
		$result = $this->modelServicios->EditarCliente($idCliente);
		echo json_encode($result);
	}
	//EDITAR CLIENTE
	public function btn_cambios_cliente()
	{
		$datos['nombre'] = $this->input->post('nombre');
		$datos['direccion'] = $this->input->post('direccion');
		$datos['telefono'] = $this->input->post('telefono');
		$datos['idcliente'] = $this->input->post('idcliente');

		$result = $this->modelServicios->btn_cambios_cliente($datos);
		echo json_encode($result);
	}


	//SALDO CLIENTE
	public function saldo_cliente()
	{
		$nombre = $_POST['nombre'];
		$result = $this->modelServicios->saldo_cliente($nombre);
		echo json_encode($result);
	}
	//RESUMEN DEL CIENTE
	public function resumen_cliente()
	{
		$idCliente = $_POST['id'];
		$result = $this->modelServicios->resumen_cliente($idCliente);
		echo json_encode($result);
	}

	//ABONO DE CLINETE BUSQUEDA
	public function buscar_cliente_abono()
	{
		$cliente = $_POST['cliente'];
		$actionOr = $_POST['actionOr'];
		$result = $this->modelServicios->buscar_cliente_abono($cliente,$actionOr);
		echo json_encode($result);
	}
	//ABONOS DE CLIENTES
	public function abono_cliente()
	{
		$monto = $_POST['monto'];
		$idCliente = $_POST['idCliente'];
		$result = $this->modelServicios->abono_cliente($monto,$idCliente);
		echo json_encode($result);
	}

	//-------MOSTRAR PRODUCTOS BAJO EL INVENTARIO---------------
	public function ProductoBajoInventario(){
		$resultado = $this->modelServicios->ProductoBajoInventario();
		echo json_encode($resultado);
	}
//----------------MOSTRAR LOS DATOS DE AJUSTES DE INVENTARIO A ACTUALIZAR----------
	public function mostrarAjustInv(){
		$buscarProVajo = $this->input->post('buscarProVajo');
		$resultado = $this->modelServicios->mostrarAjustInv($buscarProVajo);

		echo json_encode($resultado);
	}
	//------------ACTUALIZAR DATOS AJUSTE DE INVENTARIO-----------------
	public function ActualizarAjustInv(){
		$id = $this->input->post('id');
		$costo = $this->input->post('costo');
		$cantidad = $this->input->post('cantidad');
		$precioventa = $this->input->post('precioventa');
		// $cantidadActual = $this->input->post('cantidadActual');

		$resultado_id = $this->modelServicios->ActualizarAjustInv($id,$costo,$precioventa);

		if ($resultado_id > 0) {
			$resultado = $this->modelServicios->ActualizarAjustInv_tab2($resultado_id,$cantidad);
		}
		echo json_encode($resultado);
	}
//------------MODULO VENTAS DE PRODUCTOS----------
	public function VentaProducto(){
		// $insert = $this->input->post('action');
		$producto = $this->input->post('producto');
		$result = $this->modelServicios->VentaProducto($producto);
		// $result = $this->modelServicios->VentaProducto($insert);
		if ($result == true) {
			echo json_encode($result);
		}else{
			echo json_encode("error");
		}
		
	}

	public function VentaProductoTemp(){
		$accion = $this->input->post('accion');
		$codigo = $this->input->post('codigo');
		$cantidad = $this->input->post('cantidad');
		$IDCliente = $this->input->post('IDCliente');
		$result = $this->modelServicios->VentaProductoTemp($accion,$codigo,$cantidad,$IDCliente);
		echo json_encode($result);
	}

	public function serchForDetalle(){
		$accion = $this->input->post('accion');
		$user = $this->input->post('user');

		$result = $this->modelServicios->serchForDetalle($accion,$user);
		echo json_encode($result);
	}

// MOSTRAR GRAFICAS DE LAS VENTAS

	public function GraficaPro(){
		$token = $this->input->post('data');
		$result = $this->modelServicios->GraficaPro($token);
		echo json_encode($result);
	}


	public function historial_ventas($guardar){
		$guardar = urldecode($guardar);

		$sql="call sistema_ventas.`SP_Historial_ventas`('Venta','');";
		$query = $this->db->query($sql);
		$row = $query->row();
		echo $row->estado;

	}


//-----------PRUEB ARTICULOS-------
	// public function mostrarArticulos(){
	// 	$ResulData = array('articulos' => $this->modelServicios->mostrarArticulos(),);

	// 		$this->load->view('diseñoweb/header');
	// 		$this->load->view('pages/ventas/menuArticuloComun');
	// 		$this->load->view('contenido/ctnVentas/articuloComun' , $ResulData);
	// 		$this->load->view('diseñoweb/footer');

	// }


	public function buscador_producto()
	{
		$producto = $_POST['producto'];
		$result = $this->modelServicios->buscador_producto($producto);
		foreach($result as $resultado){
			echo '
			<tr>
					<td>'.$resultado->codigo_barra.'</td>
					<td>'.$resultado->descripcion.'</td>
					<td>'.$resultado->precio_venta.'</td>
				</tr>
			';
					
		}
		
	}

	//REPORTE PDF

	public function reporte_pdf()
	{
		$result=$this->modelServicios->reporte_pdf();
		// Creación del objeto de la clase heredada
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		//tipo de letra ,letras en negritas 'B', tamaño de letra
		$pdf->SetFont('Arial','',16);

		foreach($result as $row){
			$pdf->Cell(50,10, $row->codigo_barra,1,0,'C',0);
			$pdf->Cell(100,10,utf8_decode($row->descripcion),1,0,'C',0);
			$pdf->Cell(40,10, $row->precio_venta,1,1,'C',0);
		}

		$pdf->Output();
		
	}


}//not touch
