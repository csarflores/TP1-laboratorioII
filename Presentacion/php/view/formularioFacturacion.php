<?php
//incluye la clase Cliente y CrudCliente
require_once('../../Dato/metodoCliente.php');
require_once('../../Dato/metodoComprobante.php');
require_once('../../Dato/metodoProducto.php');
require_once('../../Negocio/objCliente.php');
require_once('../../Negocio/objComprobante.php');
require_once('../../Negocio/objProducto.php');

//Comprobante
$metodosComprobante = new MetodosCabeceraFacturacion();
$metodosProducto = new MetodosProductos();
$comprobante = new CabeceraComprobanteFacturacion();
$detalle = new DetalleComprobanteFacturacion();
$comprobante = $metodosComprobante->obtenerCabecera($_GET['id']);
$tipoComprobante = $metodosComprobante->obtenerTipoComprobante($comprobante->getTipoComprobante());

//Cliente
$crudCliente = new CrudCliente();
$cliente = new Cliente();
$cliente = $crudCliente->obtenerCliente($comprobante->getIdCliente());
?>

<header>
  <h1>Facturación</h1>
</header>

<form class="row g-3 m-5 p-4 bg-light border" action='../../Negocio/Controller/controladorFacturacion.php?id=<?php echo $comprobante->getIdVenta() ?>&accion=facturar' method='POST'>
  <?php include('facturacion/cabeceraComprobante.php');  ?>
  <?php include('facturacion/detalleComprobante.php');  ?>

  <!-- Botón enviar -->
  <input type='hidden' name='facturar' value='facturar'>
  <div class="mb-3">
    <input type='submit' value='Facturar' class="btn btn-success">
  </div>
  <!-- FIN Botón enviar -->
  <!-- Botón eliminar cabecera -->
  <div class="mb-3">
    <a href="../../Negocio/Controller/controladorFacturacion.php?id=<?php echo $comprobante->getIdVenta() ?>&idTipoComprobante=<?php echo $comprobante->getCodigoTipoComprobante() ?>&idNumeroComprobante=<?php echo $comprobante->getNumeroComprobante() ?>&accion=eliminarCabecera">Cancelar</a>
  </div>
  <!-- FIN Botón eliminar cabecera -->
</form>