<?php ?>
<header>
  <h1>Facturación</h1>
</header>

<form action='../../Negocio/Controller/controladorCliente.php' method='POST'>
  <input type='hidden' name='id' value='<?php echo $cliente->getId() ?>'>
  <div class="mb-3">
    <label class="form-label">Importe Factura:</label>
    <input class="form-control" type='number' step="0.01" name='importeUltimaFactura'>
  </div>
  <input type='hidden' name='facturar' value='facturar'>
  <div class="mb-3">
    <input type='submit' value='Facturar' class="btn btn-success">
  </div>
  <div class="mb-3">
    <a href="../php/index.php"><button type="button" class="btn btn-link">Volver</button></a>
  </div>
</form>