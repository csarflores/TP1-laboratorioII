<?php 

require('../../Dato/metodoProducto.php');
require('../objProducto.php');
require('../objComprobante.php');

$crud = new MetodosProductos();

$idVenta = $_GET['idVenta'] ?? null;
$codigoProducto = $_GET['codigoProducto'] ?? null;
$cantidad = $_GET['cantidad'] ?? null;
$idDetalle = $_GET['idDetalle'] ?? null;

if ($codigoProducto) 
{  
  $producto = $crud->insertarProducto($idVenta, $codigoProducto, $cantidad, $facturado=0);
  if($producto == '404'){
    echo "error en producto";
  }
}

if($idDetalle)
{
    $producto = $crud->eliminarProductoDeComprobante($idDetalle, $idVenta);
}