<?php
//incluye la clase Cliente y CrudCliente
require_once('../../Datos/metodos.php');
require_once('../../Negocio/objCliente.php');
$crud = new CrudCliente();
$cliente = new Cliente();
//obtiene todos los clientes con el método mostrar de la clase crud
$listaDeClientes = $crud->mostrar();
?>

<div class="row mt-3">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Domicilio</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Empresa</th>
        <th scope="col">Activo</th>
        <th scope="col">Cantidad de compras</th>
        <th scope="col">Tipo de cliente</th>
        <th scope="col">Importe última factura</th>
        <th scope="col">Fecha creación</th>
        <th scope="col">Fecha modificación</th>
        <th scope="col" colspan="2" class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <?php foreach ($listaDeClientes as $cliente) { ?>
        <tr>
          <td><?php echo $cliente->getNombre() ?></td>
          <td><?php echo $cliente->getApellido() ?></td>
          <td><?php echo $cliente->getDomicilio() ?></td>
          <td><?php echo $cliente->getCiudad() ?></td>
          <td><?php echo $cliente->getTelefono() ?></td>
          <td><?php echo $cliente->getNombreEmpresa() ?></td>
          <td><?php echo $cliente->getActivo() ?></td>
          <td><?php echo $cliente->getCantidadDeCompras() ?></td>
          <td><?php echo $cliente->getTipoDeCliente() ?></td>
          <td><?php echo $cliente->getImporteUltimaFactura() ?></td>
          <td><?php echo $cliente->getFechaCreacion() ?></td>
          <td><?php echo $cliente->getFechaModificacion() ?></td>
          <td><a href="administrador.php?id=<?php echo $cliente->getId() ?>&accion=facturar"><span class="icon-doc" style="margin: 3px;"></span></a></td>
          <td><a href="administrador.php?id=<?php echo $cliente->getId() ?>&accion=actualizar"><span class="icon-note" style="margin: 3px;"></span></a></td>
          <td><a href="../../Negocio/Controller/controladorCliente.php?id=<?php echo $cliente->getId() ?>&accion=eliminar"><span class="icon-trash" style="margin: 3px;"></span></a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>