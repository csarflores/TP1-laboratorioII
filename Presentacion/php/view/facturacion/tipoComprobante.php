<?php

if (isset($_GET['id'])) {
    //incluye la clase Cliente y CrudCliente
    require_once('../../Dato/metodoCliente.php');
    require_once('../../Negocio/objCliente.php');
    $crud = new CrudCliente();
    $cliente = new Cliente();
    //busca el cliente utilizando el id, que es enviado por GET desde la vista mostrar.php
    $cliente = $crud->obtenerCliente($_GET["id"]);              
}

require('../../Dato/metodoComprobante.php');
require('../../Negocio/objComprobante.php');

$comprobante = new MetodosCabeceraFacturacion();
$cabeceraFacturacion = new CabeceraComprobanteFacturacion();
//$detalleFacturacion = new DetalleComprobanteFacturacion();
//obtiene todos los tipos de comprobantes con el método mostrar de la clase comprobante
$tiposDeComprobantes = $comprobante->mostrarTiposComprobantes();
?>

<header>
    <h1 class="m-3">Seleccione</h1>
    <h4>Tipo de Comprobante</h4>
</header>

<form class="row g-3 m-5 p-4 bg-light border" action='../../Negocio/Controller/controladorFacturacion.php' method='POST'>
    <input type='hidden' name='id_cliente' value='<?php echo $cliente->getId() ?>'>
    <input type='hidden' name='accion' value='facturar'>
    <input type='hidden' name='guardarCabecera' value='guardarCabecera'>
    <div class="col-md-12">
        <label class="form-label"></label>
        <select name='tipo_comprobante' class="form-select">
            <?php foreach ($tiposDeComprobantes as $comprobantes) { ?>
                <option value="<?php echo $comprobantes->getCodigoTipoComprobante(); ?>"><?php echo $comprobantes->getDescripcionTipoComprobante(); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-12">
        <div>
            <input type='submit' value='Continuar' class="btn btn-success w-50 m-3">
        </div>
        <div>
            <a href="../php/index.php"><button type="button" class="btn btn-link">Volver</button></a>
        </div>
    </div>
</form>