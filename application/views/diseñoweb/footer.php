</div>

 <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Sistemas-Ventas</a>.</strong>
    Todos Los Derechos Reservados.

    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script> --> <!--VALIDAR ESTOS ERRORES AL AVILITARLO -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)  
</script> --> <!--VALIDAR ESTOS ERRORES AL AVILITARLO -->
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- mi plugin para diseño de tabla Con JQuery-->
<script src="../assets/template/datatables_netbs/js/jquery.dataTables.js"></script>
<!-- termina mi plugin para tablas -->

<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../assets/dist/js/pages/dashboard.js"></script> --> <!--VALIDAR ESTOS ERRORES AL AVILITARLO -->
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>




<!-- ---SCRIPS DE YOEL---- -->
<script src="../assets/notificacion/notify.js"></script>
<script src="../assets/notificacion/sweetalert.min.js"></script>
<!-- -------------- -->
<?php
if ($this->uri->segment(2) == 'inventarioReporteInventario') {?>
 <script src="<?php echo base_url();?>js/tbReporteInventario.js"></script>

<?php }?>
<!-- -------------- -->
<?php
if ($this->uri->segment(2) == 'productoModificar') {?>
 <script src="<?php echo base_url();?>js/tbReporteInventario.js"></script>
<?php }?>
<!-- -------------- -->

<?php
if ($this->uri->segment(2) == 'clienteModificar') {?>
 <script src="<?php echo base_url();?>js/jsClientes.js"></script>
<?php }?>
<!-- ---------------- -->
<?php
if ($this->uri->segment(2) == 'inventarioProductosBajo') {?>
 <script src="<?php echo base_url();?>js/tbReporteInventario.js"></script>
<?php }?>
<!-- ------------------------- -->
<?php
if ($this->uri->segment(2) == 'inventarioAjustes') {?>
 <script src="<?php echo base_url();?>js/tbReporteInventario.js"></script>
<?php }?>
<!-- ------------------------- -->
<?php
if ($this->uri->segment(2) == 'ventas') {?>
 <script src="<?php echo base_url();?>js/ventas/ventas.js"></script>
<?php }?>
<!-- ------------------------- -->
<!-- <?php
if ($this->uri->segment(2) == 'ventasBuscar') {?>
 <script src="<?php echo base_url();?>js/jstabInventarioBajo.js"></script> 
<?php }?> -->
<?php
if ($this->uri->segment(2) == 'clienteNuevo') {?>
	<script src="<?php echo base_url();?>js/jsClientes.js"></script>
 <?php }?>

 <!-- //MODULO CLIENTES -->
 <?php
 if ($this->uri->segment(2) == 'clienteAbonos') {?>
	<script src="<?php echo base_url();?>js/cliente/jsAbonos.js"></script>
 <?php }?>

 <?php
 if ($this->uri->segment(2) == 'listaClientes') {?>
	<script src="<?php echo base_url();?>js/jsClientes.js"></script>
 <?php }?>

 <?php
 if ($this->uri->segment(2) == 'clienteReporteSaldo') {?>
	<script src="<?php echo base_url();?>js/cliente/jsReporteDesaldo.js"></script>
 <?php }?>

 <!-- //MODULO PRODUCTOS -->
 <?php
 if ($this->uri->segment(2) == 'productoNuevo') {?>
	<script src="<?php echo base_url();?>js/productos/jsProductos.js"></script>
 <?php }?>

 <?php
 if ($this->uri->segment(2) == 'productoCatalogo') {?>
	<script src="<?php echo base_url();?>js/productos/jsProductos.js"></script>
 <?php }?>

 <!-- //MODULO INVENTARIO -->
 <?php
 if ($this->uri->segment(2) == 'inventario_ProductosBajo') {?>
	<script src="<?php echo base_url();?>js/inventario/jsInventario.js"></script>
 <?php }?>

 


<script>

// function startTime(){

// today=new Date();

// h=today.getHours();

// m=today.getMinutes();

// s=today.getSeconds();

// m=checkTime(m);

// s=checkTime(s);

// document.getElementById("reloj").innerHTML=h+":"+m+":"+s;

// t=setTimeout("startTime()",500);}

// function checkTime(i)

// {if (i<10) {i="0" + i;}return i;}

// window.onload=function(){startTime();}

</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#example1').DataTable({
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en la busqueda",
        "searchPlaceholder":"Buscar Registros",
        "info": "Mostrar Registros de _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "No existe Registro",
        "infoFiltered": "(filtrado de un total de _MAX_ registro)",
        "search": "Buscar:",
        "paginate":{
          "first": "primero",
          "last": "Ultimo",
          "next": "siguiente",
          "previous": "Anterior"
        },
      }
    });
  });
</script>

</body>
</html>
