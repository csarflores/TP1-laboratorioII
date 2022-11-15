<?php
//incluye las clases y funciones
require('../../Dato/metodoCliente.php');
require('../objCliente.php');

$crud = new CrudCliente();
$cliente = new Cliente();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$auxFechaActual = date("Y-m-d H:i:s");

// si el elemento insertar no viene nulo desde ingresar.php llama al crud (funciones.php) e inserta un cliente
if (isset($_POST['insertar'])) {
	//configuracion de variables por default
	$auxActivo = 1;
	$auxCantidadDeCompras = 0;
	$auxImporteUltimaFactura = 0.00;

	//agrego los datos recibido por formulario al objeto cliente
	$cliente->setNombre($_POST['nombre']);
	$cliente->setApellido($_POST['apellido']);
	$cliente->setDomicilio($_POST['domicilio']);
	$cliente->setCiudad($_POST['ciudad']);
	$cliente->setTelefono($_POST['telefono']);
	$cliente->setNombreEmpresa($_POST['nombre_empresa']);
	$cliente->setActivo($auxActivo);
	$cliente->setCantidadDeCompras($auxCantidadDeCompras);
	$cliente->setTipoDeCliente((int)$_POST['tipo_cliente']);
	$cliente->setImporteUltimaFactura($auxImporteUltimaFactura);
	$cliente->setFechaCreacion($auxFechaActual);
	$cliente->setFechaModificacion($auxFechaActual);
	//llama a la función insertar definida en el crud
	$crud->insertar($cliente);
	header('Location: ../../Presentacion/php/index.php');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el cliente
}elseif(isset($_POST['actualizar'])){
	$cliente->setId($_POST['id']);
	$cliente->setNombre($_POST['nombre']);
	$cliente->setApellido($_POST['apellido']);
	$cliente->setDomicilio($_POST['domicilio']);
	$cliente->setCiudad($_POST['ciudad']);
	$cliente->setTelefono($_POST['telefono']);
	$cliente->setNombreEmpresa($_POST['nombreEmpresa']);
	$cliente->setActivo((int)$_POST['activo']);
	$cliente->setTipoDeCliente((int)$_POST['tipoDeCliente']);
	$cliente->setFechaModificacion($auxFechaActual);
	$crud->actualizar($cliente);
	header('Location: ../../Presentacion/php/index.php');
// si la variable accion enviada por GET es == 'e' llama al crud y elimina un cliente
}elseif(isset($_POST['facturar'])){
	$auxCantidadActualDeCompras = $crud->obtenerCliente($_POST['id']);
	$auxContadorCompras = $auxCantidadActualDeCompras->getCantidadDeCompras() + 1;

	$cliente->setId($_POST['id']);
	$cliente->setImporteUltimaFactura($_POST['importeUltimaFactura']);
	$cliente->setCantidadDeCompras($auxContadorCompras);
	$cliente->setFechaModificacion($auxFechaActual);
	$crud->facturar($cliente);
	header('Location: ../../Presentacion/php/index.php');
// si la variable accion enviada por GET es == 'eliminar' llama al crud y elimina un cliente
}elseif ($_GET['accion']=='eliminar') {
	$crud->eliminar($_GET['id']);
	header('Location: ../../Presentacion/php/index.php');
}