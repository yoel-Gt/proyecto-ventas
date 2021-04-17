<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class ctrlMenus extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelServicios');
	}

	public function productoNuevo(){
		$sms['status']='';
		$activo['activo'] = ["nuevoProducto","productos"];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnProductos/nuevoPro',$sms);
		$this->load->view('diseñoweb/footer');
		
	}

	public function productoModificar(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/productos/menuModificar');
		$this->load->view('contenido/ctnProductos/modificarPro');
		$this->load->view('diseñoweb/footer');
		
	}

	public function productoEliminar(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/productos/menuEliminar');
		$this->load->view('contenido/ctnProductos/eliminarPro');
		$this->load->view('diseñoweb/footer');
		
	}

	public function productoDepartamentos(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/productos/menuDepartamentos');
		$this->load->view('contenido/ctnProductos/departamentoPro');
		$this->load->view('diseñoweb/footer');
	
	}
	
		public function productoPromociones(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/productos/menuPromociones');
		$this->load->view('contenido/ctnProductos/promocionesPro');
		$this->load->view('diseñoweb/footer');
	
	}

	public function productoImportar(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/productos/menuImportar');
		$this->load->view('contenido/ctnProductos/importarPro');
		$this->load->view('diseñoweb/footer');
	
	}

		public function productoCatalogo(){
		$activo['activo'] = ["catalogoProducto","productos"];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnProductos/catalogoPro');
		$this->load->view('diseñoweb/footer');
	
	}

	// -----------------------MENU CLIENTES------------------------------------------------
	
	public function clienteAbonos(){
		$activo['activo'] = ["abonos","clientes"];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnClientes/abonos');//eliminarCliente
		$this->load->view('diseñoweb/footer');
	
	}

		public function clienteEstadoCuenta(){
		$activo['activo'] = ["estadocuenta","clientes"];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnClientes/subirImagen');//eliminarCliente
		$this->load->view('diseñoweb/footer');
	
	}
	
		public function clienteNuevo(){
		$activo['activo'] = ["clienteNuevo","clientes"];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnClientes/nuevoCliente');
		$this->load->view('diseñoweb/footer');
	
	}

		public function clienteReporteSaldo(){
		$activo['activo'] = ["reporteSaldo","clientes"];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnClientes/reporteSaldo');
		$this->load->view('diseñoweb/footer');
	
	}

	// ----------------------MENU VENTAS------------------------------------------------
		public function ventas(){
		$activo['activo'] = ['ventas','ventas'];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnVentas/Ventas');
		$this->load->view('diseñoweb/footer');
	
	}

		public function listaClientes(){
		$ResulData = array('articulos' => $this->modelServicios->listaClientes(),);
		
		$activo['activo'] = ['listaClientes','clientes'];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnClientes/listaClientes', $ResulData);
		$this->load->view('diseñoweb/footer');
		
	
	}

		public function ventasGrafica(){
		$activo['activo'] = ['VentaBuscar','ventas'];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnVentas/grafica');
		$this->load->view('diseñoweb/footer');
	
	}

	// ----------------------MENU INVENTARIO------------------------------------------------

		public function inventarioAgregar(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/inventario/menuAgregar');
		$this->load->view('contenido/ctnInventario/agregarInventario');
		$this->load->view('diseñoweb/footer');
	
	}

		public function inventarioAjustes(){
		$activo['activo'] = ['ajusteInventario','inventario'];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnInventario/ajustes');
		$this->load->view('diseñoweb/footer');
	
	}

		public function inventario_ProductosBajo(){
		$activo['activo'] = ['ProductosBajo','inventario'];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnInventario/productoBajo');
		$this->load->view('diseñoweb/footer');
	
	}

		public function inventarioReporteInventario(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/inventario/menuReporteInventario');
		$this->load->view('contenido/ctnInventario/reporteInventario');
		$this->load->view('diseñoweb/footer');
	
	}

		public function inventarioReporteMovimientos(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/inventario/menuReporteMovimiento');
		$this->load->view('contenido/ctnInventario/ReporteMovimiento');
		$this->load->view('diseñoweb/footer');
	
	}

		public function inventarioKardex(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/inventario/menuKardex');
		$this->load->view('contenido/ctnInventario/kardex');
		$this->load->view('diseñoweb/footer');
	
	}

	// ------------------MENU FACTURAS--------------------------------------------------

		public function facturasPorVentas(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/facturas/menuFacturasVentas');
		$this->load->view('contenido/ctnFacturas/facturasVentas');
		$this->load->view('diseñoweb/footer');
	
	}

		public function facturasGlobales(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/facturas/menuFacturasGlobales');
		$this->load->view('contenido/ctnFacturas/facturasGlobales');
		$this->load->view('diseñoweb/footer');
	
	}

		public function facturasClientes(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/facturas/menuClientesFacturacion');
		$this->load->view('contenido/ctnFacturas/ClientesFacturacion');
		$this->load->view('diseñoweb/footer');
	
	}

	// -----------------------MENU CORTES------------------------------------------------------

		public function cortesCajero(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/cortes/menuCortesCajero');
		$this->load->view('contenido/ctnCortes/cortesCajero');
		$this->load->view('diseñoweb/footer');
	
	}

		public function cortesDelDia(){
		$this->load->view('diseñoweb/header');
		$this->load->view('pages/cortes/menuCorteDia');
		$this->load->view('contenido/ctnCortes/corteDia');
		$this->load->view('diseñoweb/footer');
	
	}

	// -----------------------MENU REPORTES-------------------------------------------------------------

		public function reportesVentas(){
		$activo['activo'] = ['reporteVentas','reporte'];
		$this->load->view('diseñoweb/header');
		$this->load->view('diseñoweb/body',$activo);
		$this->load->view('contenido/ctnReportes/reporteVentas');
		$this->load->view('diseñoweb/footer');
	
	}


}
