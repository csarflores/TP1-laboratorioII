<?php ?>
<header>
  <h1>Ingresar cliente</h1>
</header>

<form action='../../Negocio/Condivoller/condivoladorCliente.php' method='POST'>
  <input type='hidden' name='insertar' value='insertar'>
  <div class="mb-3">
    <label class="form-label">Nombre:</label>
    <input type='text' name='nombre' required class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Apellido:</label>
    <input type='text' name='apellido' required class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Domicilio:</label>
    <input type='text' name='domicilio' required class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Ciudad:</label>
    <input type='text' name='ciudad' class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Teléfono:</label>
    <input type='text' name='telefono' pattern="^[3|0|5|6]\d{}$" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Nombre de la Empresa:</label>
    <input type='text' name='nombre_empresa' class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Tipo de cliente:</label>
      <select name='tipo_cliente' class="form-select">
        <option value="1">Consumidor final</option>
        <option value="2">Pyme</option>
        <option value="3">Gran empresa</option>
      </select>
  </div>
  <div class="mb-3">
    <input type='submit' value='Guardar' class="btn btn-success">
  </div>
  <div class="mb-3">
    <a href="../php/index.php"><button type="button" class="btn btn-link">Volver</button></a>
  </div>
</form>