<?php ?>
<header>
  <h1>Modificar cliente</h1>
</header>

<form action='../../Negocio/Controller/controladorCliente.php' method='POST'>
  <input type='hidden' name='id' value='<?php echo $cliente->getId() ?>'>
  <div class="mb-3">
    <label class="form-label">Nombre Cliente:</label>
    <input class="form-control" type='text' name='nombre' value='<?php echo $cliente->getNombre() ?>'>
  </div>
  <div class="mb-3">
    <label class="form-label">Apellido:</label>
    <input class="form-control" type='text' name='apellido' value='<?php echo $cliente->getApellido() ?>'>
  </div>
  <div class="mb-3">
    <label class="form-label">Domicilio:
    <input class="form-control" type='text' name='domicilio' value='<?php echo $cliente->getDomicilio() ?>'>
  </div>
  <div class="mb-3">
    <label class="form-label">Ciudad:</label>
    <input class="form-control" type='text' name='ciudad' value='<?php echo $cliente->getCiudad() ?>'>
  </div>
  <div class="mb-3">
    <label class="form-label">Teléfono:</label>
    <input class="form-control" type='text' name='telefono' value='<?php echo $cliente->getTelefono() ?>'></td>
  </div>
  <div class="mb-3">
    <label class="form-label">Empresa:</label>
    <input class="form-control" type='text' name='nombreEmpresa' value='<?php echo $cliente->getNombreEmpresa() ?>'>
  </div>
  <div class="mb-3">
    <label class="form-label">Activo:
    <input class="form-control" type='text' name='activo' value='<?php echo $cliente->getActivo() ?>'>
  </div>
  <input type='hidden' name='cantidadDeCompras' value='<?php echo $cliente->getCantidadDeCompras() ?>'>
  <div class="mb-3">
    <label class="form-label">Tipo de cliente:</label>
    <select name='tipoDeCliente' class="form-select">
      <?php
      switch ($cliente->getTipoDeCliente()) {
        case 1:
          echo '
              <option value="1" selected>Consumidor final</option>
              <option value="2">Pyme</option>
              <option value="3">Gran empresa</option>
              ';
          break;
        case 2:
          echo '
              <option value="2" selected>Pyme</option>
              <option value="1">Consumidor final</option>
              <option value="3">Gran empresa</option>
              ';
          break;
        case 3:
          echo '
              <option value="3" selected>Gran Empresa</option>
              <option value="1">Consumidor final</option>
              <option value="2">Pyme</option>
              ';
          break;
      }
      ?>
    </select>
  </div>
  <input type='hidden' name='importeUltimaFactura' value='<?php echo $cliente->getImporteUltimaFactura() ?>'>
  <input type='hidden' name='fechaCreacion' value='<?php echo $cliente->getFechaCreacion() ?>'>
  <input type='hidden' name='fechaModificacion' value='<?php echo $cliente->getFechaModificacion() ?>'>
  <input type='hidden' name='actualizar' value='actualizar'>
  <div class="mb-3">
    <input type='submit' value='Guardar' class="btn btn-success">
  </div>
  <div class="mb-3">
    <a href="../php/index.php"><button type="button" class="btn btn-link">Volver</button></a>
  </div>
</form>