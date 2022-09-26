<?php
//incluye las clases y funciones
require('../../Datos/metodos.php');
require('../objCliente.php');

$crud = new CrudCliente();
$cliente = new Cliente();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date("Y-m-d H:i:s");

// si el elemento insertar no viene nulo desde ingresar.php llama al crud (funciones.php) e inserta un cliente
if (isset($_POST['insertar'])) {
	//configuracion de variables por default
	$activo = 1;
	$cantidadDeCompras = 0;
	$importeUltimaFactura = 0.00;

	//agrego los datos recibido por formulario al objeto cliente
	$cliente->setNombre($_POST['nombre']);
	$cliente->setApellido($_POST['apellido']);
	$cliente->setDomicilio($_POST['domicilio']);
	$cliente->setCiudad($_POST['ciudad']);
	$cliente->setTelefono($_POST['telefono']);
	$cliente->setNombreEmpresa($_POST['nombre_empresa']);
	$cliente->setActivo($activo);
	$cliente->setCantidadDeCompras($cantidadDeCompras);
	$cliente->setTipoDeCliente((int)$_POST['tipo_cliente']);
	$cliente->setImporteUltimaFactura($importeUltimaFactura);
	$cliente->setFechaCreacion($fechaActual);
	$cliente->setFechaModificacion($fechaActual);
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
	$cliente->setFechaModificacion($fechaActual);
	$crud->actualizar($cliente);
	header('Location: ../../Presentacion/php/index.php');
// si la variable accion enviada por GET es == 'e' llama al crud y elimina un cliente
}elseif(isset($_POST['facturar'])){
	$cantidadActualDeCompras = $crud->obtenerCliente($_POST['id']);
	$acumuladorCompras = $cantidadActualDeCompras->getCantidadDeCompras() + 1;

	$cliente->setId($_POST['id']);
	$cliente->setImporteUltimaFactura($_POST['importeUltimaFactura']);
	$cliente->setCantidadDeCompras($acumuladorCompras);
	$cliente->setFechaModificacion($fechaActual);
	$crud->facturar($cliente);
	header('Location: ../../Presentacion/php/index.php');
// si la variable accion enviada por GET es == 'eliminar' llama al crud y elimina un cliente
}elseif ($_GET['accion']=='eliminar') {
	$crud->eliminar($_GET['id']);
	header('Location: ../../Presentacion/php/index.php');
}