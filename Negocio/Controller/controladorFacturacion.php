<?php 
//incluye las clases y funciones

require('../../Dato/metodoComprobante.php');
require('../objComprobante.php');

$crud = new MetodosCabeceraFacturacion();
$tipoComprobante = new TipoComprobante();
$cabeceraFacturacion = new CabeceraComprobanteFacturacion();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$auxFechaActual = date("Y-m-d");


if (isset($_POST['guardarCabecera'])) {

    $datosComprobante = $crud->obtenerTipoComprobante($_POST['tipo_comprobante']);

    $cabeceraFacturacion->setIdCliente($_POST['id_cliente']);
    $cabeceraFacturacion->setFechaComprobante($auxFechaActual);
    $cabeceraFacturacion->setTipoComprobante($_POST['tipo_comprobante']);
    $cabeceraFacturacion->setTalonarioComprobante($datosComprobante->getTalonario());
    $cabeceraFacturacion->setNumeroComprobante($datosComprobante->getNumero()+1);
    $cabeceraFacturacion->setSubtotal((float)0.00);
    $cabeceraFacturacion->setIva((float)0.00);
    $cabeceraFacturacion->setTotal((float)0.00);
    
    $crud->insertar($cabeceraFacturacion);
    $crud->actualizarTiposComprobantes($cabeceraFacturacion);
    header('Location: ../../Presentacion/php/administrador.php?id='.$cabeceraFacturacion->getIdVenta().'&accion=facturar');
}elseif ($_GET['accion']=='eliminarCabecera') {
	$crud->actualizarTiposComprobantesDecremento((int)$_GET['idTipoComprobante'], (int)$_GET['idNumeroComprobante']);
    $crud->eliminarCabecera($_GET['id']);
	header('Location: ../../Presentacion/php/index.php');
}elseif ($_GET['accion']=='facturar') {
    $crud->facturar((int)$_GET['id']);
    header('Location: ../../Presentacion/php/index.php');
}