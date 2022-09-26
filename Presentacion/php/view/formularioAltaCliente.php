<?php ?>
<header>
  <h1 class="m-3">Ingresar cliente</h1>
</header>

<form class="row g-3 m-5 p-4 bg-light border" action='../../Negocio/Controller/controladorCliente.php' method='POST'>
  <input type='hidden' name='insertar' value='insertar'>
  <div class="col-md-6">
    <label class="form-label">Nombre:</label>
    <input type='text' name='nombre' required class="form-control">
  </div>
  <div class="col-md-6">
    <label class="form-label">Apellido:</label>
    <input type='text' name='apellido' required class="form-control">
  </div>
  <div class="col-md-6">
    <label class="form-label">Domicilio:</label>
    <input type='text' name='domicilio' required class="form-control">
  </div>
  <div class="col-md-6">
    <label class="form-label">Ciudad:</label>
    <input type='text' name='ciudad' class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Teléfono:</label>
    <input type='text' name='telefono' pattern="^[3|0|5|6]\d{}$" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Nombre de la Empresa:</label>
    <input type='text' name='nombre_empresa' class="form-control">
  </div>
  <div class="col-md-6">
    <label class="form-label">Tipo de cliente:</label>
      <select name='tipo_cliente' class="form-select">
        <option value="1">Consumidor final</option>
        <option value="2">Pyme</option>
        <option value="3">Gran empresa</option>
      </select>
  </div>
  <div class="col-12">
  <div>
    <input type='submit' value='Guardar' class="btn btn-success w-50 m-3">
  </div>
  <div>
    <a href="../php/index.php"><button type="button" class="btn btn-link">Volver</button></a>
  </div>
  </div>
</form>