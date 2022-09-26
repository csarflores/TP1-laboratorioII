<?php ?>
<header>
  <h1 class="m-3">Modificar cliente</h1>
</header>

<form class="row g-3 m-5 p-4 bg-light border" action='../../Negocio/Controller/controladorCliente.php' method='POST'>
  <input type='hidden' name='id' value='<?php echo $cliente->getId() ?>'>
  <div class="col-md-6">
    <label class="form-label">Nombre Cliente:</label>
    <input class="form-control" type='text' name='nombre' value='<?php echo $cliente->getNombre() ?>'>
  </div>
  <div class="col-md-6">
    <label class="form-label">Apellido:</label>
    <input class="form-control" type='text' name='apellido' value='<?php echo $cliente->getApellido() ?>'>
  </div>
  <div class="col-md-6">
    <label class="form-label">Domicilio:</label>
    <input class="form-control" type='text' name='domicilio' value='<?php echo $cliente->getDomicilio() ?>'>
  </div>
  <div class="col-md-6">
    <label class="form-label">Ciudad:</label>
    <input class="form-control" type='text' name='ciudad' value='<?php echo $cliente->getCiudad() ?>'>
  </div>
  <div class="col-md-6">
    <label class="form-label">Teléfono:</label>
    <input class="form-control" type='text' name='telefono' value='<?php echo $cliente->getTelefono() ?>'></td>
  </div>
  <div class="col-md-6">
    <label class="form-label">Empresa:</label>
    <input class="form-control" type='text' name='nombreEmpresa' value='<?php echo $cliente->getNombreEmpresa() ?>'>
  </div>
  <div class="col-md-6">
    <label class="form-label">Estado:</label>
    <select name='activo' class="form-select">
    <?php
      switch ($cliente->getActivo()) {
        case 0:
          echo '
              <option value="0" selected>Inactivo</option>
              <option value="1">Activo</option>
              ';
          break;
        case 1:
          echo '
              <option value="1" selected>Activo</option>
              <option value="0">Inactivo</option>
              ';
          break;
      }
    ?>
    </select>
  </div>
  <div class="col-md-6">
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
  <div class="col-12">
    <input type='hidden' name='actualizar' value='actualizar'>
    <div>
      <input type='submit' value='Guardar' class="btn btn-success w-50 m-3">
    </div>
    <div>
      <a href="../php/index.php"><button type="button" class="btn btn-link">Volver</button></a>
    </div>
  </div>

</form>