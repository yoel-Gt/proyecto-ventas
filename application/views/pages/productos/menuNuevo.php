 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Refaciones GTZ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('nombre')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
 <!-------------------MODULO VENTAS --------------------->
             <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-cart"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasInsVarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasArticuloComun" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Articulo Comun v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasBuscar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buscar v3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasMayoreo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mayoreo v4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasEntrada" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entrada v5</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasSalida" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salida v6</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasBorrarArticulo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Borrar Articulo v7</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/ventasVerificador" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Verificador v9</p>
                </a>
              </li>
            </ul>

 <!-------------------MODULO CLIENTES --------------------->
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-users"></i>
              <p>
                Clientes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/clienteEstadoCuenta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estado de Cuenta v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/clienteNuevo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Cliente v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/clienteModificar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar Cliente v3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/clienteEliminar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eliminar Cliente v4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/clienteReporteSaldo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Saldo v6</p>
                </a>
              </li>
            </ul>
<!-------------------MODULO PRODUCTOS --------------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-file-text"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoNuevo" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoModificar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoEliminar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eliminar v3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoDepartamentos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departamentos v4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoPromociones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Promociones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoImportar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Importar v6</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/productoCatalogo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catalogo v6</p>
                </a>
              </li>
            </ul>
<!-------------------MODULO INVENTARIO --------------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-calculator"></i>
              <p>
                Inventario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/inventarioAgregar" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/inventarioAjustes" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajustes v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/inventarioProductosBajo" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos Bajo en Inventario v3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/inventarioReporteInventario" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Inventario v4</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/inventarioReporteMovimientos" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Movimientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/inventarioKardex" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kardex de inventario v6</p>
                </a>
              </li>
            </ul>
<!------------MODULO COMPRAS(PENDIENTE) --------------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#Enconstrucion" class="nav-link active">
              <i class="nav-icon icon-truck"></i>
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v4</p>
                </a>
              </li>
            </ul>
<!----------MODULO CONFIGURACION(PENDIENTE) ----------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#Enconstruccion" class="nav-link active">
              <i class="nav-icon icon-cogs"></i>
              <p>
                Configuracion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>YYY v4</p>
                </a>
              </li>
            </ul>
<!----------------------MODULO FACTURAS --------------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-book"></i>
              <p>
                Facturas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/facturasPorVentas" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facturas por Ventas v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/facturasGlobales" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facturas Globales v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/facturasClientes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes de Facturacion v3</p>
                </a>
              </li>
            </ul>
<!-------------------MODULO CORTES --------------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-coin-dollar"></i>
              <p>
                Cortes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/cortesCajero" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hacer Cortes de Cajero v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/cortesDelDia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hacer  Corte del Día v2</p>
                </a>
              </li>
            </ul>
<!----------------------MODULO REPORTES --------------------->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon icon-stats-dots"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>ctrlMenus/reportesVentas" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte de Ventas v1</p>
                </a>
              </li>
            </ul>

          </ul>  <!-- TODOS LOS MODULOS -->  
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->


 