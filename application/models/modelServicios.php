<?php

/**
 * 
 */
class modelServicios extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}
	//MANERA 1 DE HACERLO CON ARRAY

	// public function GuardarProducto($datos){
	// 	$productos = array(
	// 		'codigo' =>$datos['codigo'] ,
	// 		'descripcion' =>$datos['descripcion'] ,
	// 		'precio_venta' =>$datos['precio_venta'] ,
	// 		'precio_compra' =>$datos['precio_compra'] 
	// 	 );

	// 	$this->db->insert('productos', $productos);
	// 	// $sql = "INSERT into sistema_ventas.productos (usuario,area) values ('$usuario','$area');";
	// 	// if ($query = $this->db->query($sql)){
	// 	// 	echo "datos guardados";

	// 	// }else{
	// 	// 	echo "error al guardar";
	// 	// }

	// }

	//----- notificaciones
	public function notificacion_cliente()
	{
		$sql="call sistema_ventas.`SP_notificaciones_cliente` ('',''); ";
		$query=$this->db->query($sql);
		if ($query->num_rows() > 0){
			$numero = $query->num_rows();
			$datos = $query->result();
			$objeto = [$numero,$datos];
			return $objeto;
		}
	}

	//Prueba Ventas
	public function valida_product($codigoProdcuto){

		$sql = "call sistema_ventas.SP_pruebaVentas('$codigoProdcuto','SP_valida_producto');";
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->total; 
	}

	public function seach_product($codigoProdcuto){
		$codigoProdcuto = $codigoProdcuto;

		$sql = "call sistema_ventas.SP_pruebaVentas('$codigoProdcuto','SP_busqueda_producto');";
		$query = $this->db->query($sql);
		return $query->result();
		

	}
	//ELIMINAR PRODUCTO DE LA VENTA ACTUAL
	public function eliminar_producto($IDBarra)
	{
		$sql="call sistema_ventas.SP_pruebaVentas('$IDBarra','SP_eliminar_pro_actual');";
		$query=$this->db->query($sql); 
		if($this->db->affected_rows($query)> 0){
			$sql2="SELECT barcode,descript,stock,precio_venta,precio_compra,cantidad,(cantidad*precio_venta) as Total FROM sistema_ventas.ventastems;";
			$query=$this->db->query($sql2);
			return $query->result();
		}else{
			return "fail";
		}
	}
	//GUARDA LA VENTA REALIZADA
	public  function guardar_venta($item_Barra,$item_descripcion,$item_Cantidad,$item_Precio_venta,$item_precio_compra,$idCajero,$idCliente){
		
		for ($i=0; $i < count($item_Barra) ; $i++) { 

			$set_Barra = $item_Barra[$i];
			$set_descripcion= $item_descripcion[$i];
			$set_Cantidad = $item_Cantidad[$i];
			$set_Precio_venta = $item_Precio_venta[$i];
			$set_precio_compra = $item_precio_compra[$i];
			// $fecha = new DateTime;
			// $clone = clone $fecha; 
			// $clone->modify('-1 day');
			// $fechaActual = $clone->format('Y-m-d');
			$unixTime = time();
			$timeZone = new \DateTimeZone('Mexico/General');

			$time = new \DateTime();
			$time->setTimestamp($unixTime)->setTimezone($timeZone);

			$formattedTime = $time->format('Y/m/d H:i:s');

			$sql="INSERT INTO sistema_ventas.ventas_hist (barcode,descript,Cantidad,Precio_venta,precio_compra,IDCliente,IDCajero,Fecha) VALUES('$set_Barra','$set_descripcion','$set_Cantidad','$set_Precio_venta','$set_precio_compra','$idCliente','$idCajero','$formattedTime');";

			$r=$this->db->query($sql);

			// if($this->db->query($sql)){
			// 	return  1; //OK
			// }else{
			// 	return  2; //error
			// }
			
		}
		if(!$r){
			return 0;
		}else{
			$lastID = $this->db->insert_id();
			return $lastID;
		}
	}

	public function limpiar_venta_actual(){
		$sql="TRUNCATE TABLE sistema_ventas.ventastems";
		$this->db->query($sql);
	}

	//MANERA 2 DE HACERLO SIN ARRAY
	public function GuardarProducto($datos){
		// $this->db->insert('productos', $productos);
		$sql = "INSERT INTO sistema_ventas.productos (codigo_barra,descripcion,precio_compra,precio_venta,imagen) 
		values ('$datos[barra]','$datos[descripcion]','$datos[precioC]','$datos[precioV]','$datos[imagen]');";
		

		if($this->db->query($sql)){
			$lastID =  $this->db->insert_id();
			
			$sql = "INSERT INTO sistema_ventas.existenciaProductos (cantidad,minimo,maximo,idProductExistencia)
		 	values ('$datos[cantidadAc]','$datos[minimo]','$datos[maximo]', '$lastID');";

			$query = $this->db->query($sql);
			if($this->db->affected_rows($query) > 0){
				return "exito";
			}else{
				return "error";
			}
			
		}else{
			return 3;
		}
		
	}


//----------------------REPORTE DE INVENTARIO-------------------------------------

	public function reportInventario(){

	 $sql = "SELECT productos.* ,cantidad,minimo,maximo FROM sistema_ventas.productos
	JOIN sistema_ventas.existenciaproductos ON idProductExistencia = idproduct;";	

	 	$query = $this->db->query($sql);
		return $query->result();
	}

//--------------MODIFICAR PRODUCTO------------------------
	public function mostrarDatomodificarProducto($codigo){
		$codigo = $codigo;
		$sql = "SELECT productos.* ,cantidad,minimo,maximo FROM sistema_ventas.productos
		JOIN sistema_ventas.existenciaproductos ON idProductExistencia = idproduct
		WHERE codigo_barra = '$codigo';";

		$query = $this->db->query($sql);
		return $query->row(); 
		// $query->row();
	}

	public function modificarProducto($codigoss, $descripcion,$precioVenta,$precioCompra,$cantidadActual,$minimo,$maximo){
		$codigoss = $codigoss;

		$sql = "call productos_existencia ('".$codigoss."','$descripcion','$precioVenta','$precioCompra','$cantidadActual','".$minimo."','".$maximo."');";

		$query = $this->db->query($sql);

		return $query;
	}

//---------GUARDAR LOS DATOS DEL MODULO CLIENTES (NUEVO CLIENTE)-------------------------

	public function GuardarCliente($nombre,$direccion,$telefono,$imagen){

		$sql = "INSERT INTO sistema_ventas.clientes (nombre,direccion,telefono,foto) VALUES ('$nombre','$direccion','$telefono','$imagen');";

		$query = $this->db->query($sql);
		
		return $this->db->insert_id();
	}
	
	public function Guardar_cliente($credito, $retornoId){
		$sql = "INSERT INTO sistema_ventas.creditos (limite_credito,fecha,idCliente_Credito) VALUES ('$credito',now(),'$retornoId');";

		$query = $this->db->query($sql);

		return $query;
	}

	// MOSTRAR TABLA CLIENTE (MODIFICAR CLIENTE)

	public function mostrarClie(){
		$sql = "SELECT clientes.*,limite_credito FROM sistema_ventas.clientes
	JOIN sistema_ventas.creditos ON idCliente_Credito = idclientes;";	

	 	$query = $this->db->query($sql);
		return $query->result();
	}

	//
	//--------------MODELO PRODUCTOS---------------------
	public function catalogo_productos()
	{
		$sql="SELECT codigo_barra,descripcion,precio_venta,if(imagen is null,concat('assets/imagenes/productos/photo_no_found.png'),imagen)as imagen FROM sistema_ventas.productos;";

		$query= $this->db->query($sql);
		return $query->result();
	}

	public function mostrarClieBusqueda($text){
		$sql = "SELECT clientes.*,limite_credito FROM sistema_ventas.clientes
	JOIN sistema_ventas.creditos ON idCliente_Credito = idclientes where nombre 
	like '%$text%';";
	$query = $this->db->query($sql);
	return $query->result();
	}
	//----------------------,$credito
	public function ActualizarCliente($id,$nombre,$direccion,$telefono){
		$sql = "UPDATE sistema_ventas.clientes SET nombre='$nombre', direccion='$direccion',telefono='$telefono' WHERE idclientes= '$id';";

		//affected_row

		if ($this->db->query($sql) > 0) {
				return $id;
		}else{
			return false;
		}
	}

	public function ActualizarCliente_Credito($resultado_id,$credito){
		$sql = "UPDATE sistema_ventas.creditos SET limite_credito='$credito',fecha= now() WHERE idCliente_Credito= '$resultado_id';";
		
	  	if ($this->db->query($sql) > 0) {
				return true;
		}else{
			return false;
		}
	}

	public function EliminarCliente_Credito($resultado_id){

		$sql = "DELETE FROM sistema_ventas.creditos WHERE idCliente_Credito= '$resultado_id';";

		if ($this->db->query($sql) > 0) {
				return true;
		}else{
			return false;
		}
	}

	//---------MOSTRAR PRODUCTOS BAJO EL INVENTARIO---------------
	public function visualizar_productos_bajo(){
		$sql = "SELECT codigo_barra,descripcion,cantidad,precio_compra,precio_venta FROM sistema_ventas.productos
		JOIN sistema_ventas.existenciaproductos
		ON idproduct = idProductExistencia
		WHERE cantidad < minimo;";
		
		$query = $this->db->query($sql);
		return $query->result();
	}	
//-------------------------------------
	public function mostrarAjustInv($buscarProVajo){
		$sql ="SELECT idproduct,descripcion,cantidad,precio_compra,precio_venta FROM sistema_ventas.productos
		JOIN sistema_ventas.existenciaproductos ON idProductExistencia = idproduct WHERE codigo_barra = '$buscarProVajo';";

		$query = $this->db->query($sql);
		return $query->row();

	}
	//-------------ACTUALIZAR LA PRIMERA TABLA PRODUCTOS-------------------

	public function ActualizarAjustInv($id,$costo,$precioventa){
		$sql ="UPDATE sistema_ventas.productos SET precio_venta= '$precioventa',precio_compra ='$costo' WHERE idproduct='$id';";

		if ($this->db->query($sql) > 0) {
			return $id;
		}else{
			return false;
		}

	}
	//------------------ACTUALIZAR LA SEGUNDA TABLA EXISTENCIAPRODUCTOS--------

	public function ActualizarAjustInv_tab2($resultado_id,$cantidad){
		$sql ="UPDATE sistema_ventas.existenciaproductos SET cantidad = cantidad +'$cantidad' WHERE idProductExistencia='$resultado_id';";

		if ($this->db->query($sql) > 0) {
			return true;
		}else{
			return false;
		}

	}

//------------MOSTRAR LISTA CLIENTES--------
	public function listaClientes(){
		$sql = "SELECT * FROM sistema_ventas.clientes;";	

	 	$query = $this->db->query($sql);
		return $query->result();
	}
	//------------MUESTRA EL CLINETE A DITAR--------
	public function EditarCliente($idCliente)
	{
		$sql ="SELECT * FROM sistema_ventas.clientes WHERE idclientes = '$idCliente' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	//------------EDITAR CLIENTE--------
	public function btn_cambios_cliente($datos)
	{	
		$sql = "UPDATE sistema_ventas.clientes SET nombre= '$datos[nombre]', direccion='$datos[direccion]', telefono='$datos[telefono]' 
		WHERE idclientes = $datos[idcliente];";
		$query= $this->db->query($sql);
		if($this->db->affected_rows($query) > 0){
			return 1;
		}else{
			return 0;
		}
	}
	//----------DAR DE BAJA CLIENTE
	public function baja_de_cliente($idCliente)
	{
		$sql="UPDATE sistema_ventas.clientes SET credito_activo= '0' WHERE idclientes = '$idCliente'";
		$query = $this->db->query($sql);
		if($this->db->affected_rows($query) > 0){
			return 1;
		}else{
			return 0;
		}
	}

	//VISUALIZACION DE CLIENTE A DETALLE
	public function view_Cliente_detail($idCliente)
	{
		$sql="SELECT * FROM sistema_ventas.clientes WHERE idclientes = '$idCliente'";
		$query = $this->db->query($sql);
		return $row = $query->row();
		return $row;
	}

	//SALDO DE CLIENTE
	public function saldo_cliente($nombre)
	{
		$sql="SELECT idclientes,nombre,direccion,credito_activo FROM sistema_ventas.clientes WHERE nombre like '%$nombre%';";
		// 		foreach ($query->result() as $row)
		// {
		//         echo $row->title;
		//         echo $row->name;
		//         echo $row->body;
		// }
		if($query=$this->db->query($sql)){
			$row=$query->row();
			if (isset($row)) {
				return $query->result();
			}else{
				return "NA";
			}
			
		}else{
			return "Error";
		}

	}

	//RESUMEN DEL CIENTE
	public function resumen_cliente($idCliente)
	{
		$sql="SELECT nombre,telefono,limite_credito,credito_utilizado as 'saldoActual',fecha_abonos,foto FROM sistema_ventas.clientes
		join sistema_ventas.creditos
		on idclientes = idCliente_Credito
		join sistema_ventas.abonos_credito
		on idCliente_Credito = id_Cliente_abonos
		where idclientes = $idCliente;";

		if($query=$this->db->query($sql)){
			$row=$query->row();
			if (isset($row->saldoActual)) {
				// return $row;
				$sql2="SELECT nombre,adeudo,abonos,(adeudo-abonos) AS 'saldo',fecha_abonos,liquidacion FROM sistema_ventas.clientes
				join sistema_ventas.creditos
				on idclientes = idCliente_Credito
				join sistema_ventas.abonos_credito
				on idCliente_Credito = id_Cliente_abonos
				where idclientes = $idCliente group by fecha_abonos order by fecha_abonos;";

				$query2=$this->db->query($sql2);
				$rows =$query2->result();
				$objeto = [$row,$rows];
				return $objeto;
			}else{
				return "NA";
			}
		}else{
			return 'Error';
		}
	}

	// ABONO DE CLIENTE BUSQUEDA
	public function buscar_cliente_abono($cliente,$actionOr)
	{
		$sql="SELECT idclientes,nombre,telefono,limite_credito,credito_utilizado as 'saldoActual',fecha_abonos,foto FROM sistema_ventas.clientes
		join sistema_ventas.creditos
		on idclientes = idCliente_Credito
		join sistema_ventas.abonos_credito
		on idCliente_Credito = id_Cliente_abonos
		where $actionOr = '$cliente';";
		
		if($query=$this->db->query($sql)){
			$row=$query->row();
			if (isset($row->saldoActual)) {
				return $row;
			}else{
				return "NA";
			}
		}else{
			return "Error";
		}
	}

	public function abono_cliente($monto,$idCliente)
	{
		$sql="call sistema_ventas.SP_abonos_cliente($idCliente,$monto,'','');";
		if($query=$this->db->query($sql)){
			$row=$query->row();
			return $row->status;
		}else{
			return 'Error_Conexion';
		}
		
	}

//------------MODULO VENTAS DE PRODUCTOS----------	
	public function VentaProducto($insert){
		$sql = "SELECT codigo_barra,descripcion,cantidad,precio_venta FROM sistema_ventas.productos
		JOIN sistema_ventas.existenciaproductos ON idProductExistencia = idproduct WHERE codigo_barra ='$insert';";

		$query = $this->db->query($sql);
		return $query->row();
	}
//-------------MODULO VENTAS PRODUCTOS


	// mostrar los datos preinsertados 
	public function serchForDetalle(){
			if($_POST['accion'] =='serchForDetalle'){
			if (empty($_POST['user'])) 
				{
					echo "error";
				}else{
				
					$token       = ($_SESSION['idusuario']);
					
					$query = "SELECT temp.correlativo,temp.token_user,temp.codigo_barra,p.descripcion,temp.cantidad,temp.precio_venta 
    					FROM sistema_ventas.detalle_V_temp temp
    					JOIN sistema_ventas.productos p
    					ON p.codigo_barra = temp.codigo_barra
    					WHERE temp.token_user = token_user;";

					$sql = $this->db->query($query);
					$result = $sql->result();

					$query_iva  = "SELECT iva FROM sistema_ventas.configuracion;";
					$enviar_iva = $this->db->query($query_iva);
					$result_iva = $enviar_iva->result();

					$pilaProductos = array($result);
					$resultPilas = array($pilaProductos,$result_iva);
					return $resultPilas;
		    }
		}
	}

	//------MOSTRAR PRODUCTOS A VENDER (BOTON AGREGAR)----
	public function VentaProductoTemp(){//$accion,$codigo,$cantidad

		if($_POST['accion'] =='addProductoDetalle'){
			if (empty($_POST['codigo']) || empty($_POST['cantidad'])) 
				{
					echo "error";
				}else{
					$codproducto = $_POST['codigo'];
					$cantidad    = $_POST['cantidad'];
					$token       = ($_SESSION['idusuario']);
					$IDCliente = $_POST['IDCliente'];
					
					$query_iva  = "SELECT iva FROM sistema_ventas.configuracion;";
					$enviar_iva = $this->db->query($query_iva);
					$result_iva = $enviar_iva->result();

					$query_detalle_temp = "CALL sistema_ventas.add_detalle_V_temp('$codproducto','$cantidad','$token','$IDCliente');";
					$enviar_detalle     = $this->db->query($query_detalle_temp);
					$result             = $enviar_detalle->result();
					
					$pila1 = array($result_iva);
					$pila2 = array($result,$pila1);
					// print_r($pila2);
					return $pila2;

					


					
					
		    }
		}
			
	}//FUNCION

//---------- MOSTRAR GRAFICAS DE LAS VENTAS----

	public function GraficaPro($token){

		$query = "SELECT cantidad,año FROM sistema_ventas.detalle_ventas WHERE token_user = '$token';";
		$sql = $this->db->query($query);
		 return $sql->result();



	}

//--------------------------------------	


	public function buscador_producto($producto)
	{
		$sql="SELECT codigo_barra,descripcion,precio_venta FROM sistema_ventas.productos where descripcion like '%$producto%';";
		$query=$this->db->query($sql);
		$result = $query->result();
		return $result;
	}

	public function reporte_pdf()
	{
		$sql="SELECT codigo_barra,descripcion,precio_venta FROM sistema_ventas.productos;";
		$query=$this->db->query($sql);
		$result=$query->result();

		return $result;
	}

}//no touch
