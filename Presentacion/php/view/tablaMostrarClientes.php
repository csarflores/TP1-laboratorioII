<?php
//incluye la clase Cliente y CrudCliente
require_once('../../Dato/metodos.php');
require_once('../../Negocio/objCliente.php');
$crud = new CrudCliente();
$cliente = new Cliente();
//obtiene todos los clientes con el método mostrar de la clase crud
$listaDeClientes = $crud->mostrar();
?>

<div class="container mt-4 mb-4">
  <table class="table table-sm text-sm-start">
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
          <td><?php echo "$ ".$cliente->getImporteUltimaFactura() ?></td>
          <td><?php echo $cliente->getFechaCreacion() ?></td>
          <td><?php echo $cliente->getFechaModificacion() ?></td>
          <td><a class="accion" href="administrador.php?id=<?php echo $cliente->getId() ?>&accion=facturar"><i class="bi bi-receipt" style="margin: 3px"></i></a></td>
          <td><a class="accion" href="administrador.php?id=<?php echo $cliente->getId() ?>&accion=actualizar"><i class="bi bi-pencil-square" style="margin: 3px;"></i></a></td>
          <td><a class="accion" href="../../Negocio/Controller/controladorCliente.php?id=<?php echo $cliente->getId() ?>&accion=eliminar"><i class="bi bi-trash" style="margin: 3px;"></i></a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>