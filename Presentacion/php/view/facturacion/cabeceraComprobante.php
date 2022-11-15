<div class='row g-3' id="cabecera-comprobante">
  <div class="col-md-4">
    <label class="form-label">Cliente</label>
    <span class="input-group-text"><?php echo $cliente->getNombre() ." ". $cliente->getApellido(); ?></span>
  </div>
  <div class="col-md-4">
    <label class="form-label">Domicilio</label>
    <span class="input-group-text"><?php echo $cliente->getDomicilio() ." ". $cliente->getCiudad(); ?></span>
  </div>
  <div class="col-md-4">
    <label class="form-label">Empresa</label>
    <span class="input-group-text"><?php echo $cliente->getNombreEmpresa(); ?></span>
  </div>
  <div class="col-md-3">
    <label class="form-label">Fecha Comprobante</label>
    <span class="input-group-text"><?php echo $comprobante->getFechaComprobante(); ?></span>
  </div>
  <div class="col-md-3">
    <label class="form-label">Tipo comprobante</label>
    <span class="input-group-text"><?php echo $tipoComprobante->getDescripcion(); ?></span>
  </div>
  <div class="col-md-3">
    <label class="form-label">Talonario</label>
    <span class="input-group-text"><?php echo $comprobante->getTalonarioComprobante(); ?></span>
  </div>
  <div class="col-md-3">
    <label class="form-label">Nro Comprobante</label>
    <span class="input-group-text"><?php echo $comprobante->getNumeroComprobante(); ?></span>
  </div>
  <div class="col-md-4">
    <label class="form-label">Subtotal</label>
    <span class="input-group-text" id="subtotal-cabecera"><?php echo $comprobante->getSubtotal(); ?></span>
  </div>
  <div class="col-md-4">
    <label class="form-label">IVA</label>
    <span class="input-group-text" id="iva-cabecera"><?php echo $comprobante->getIVA(); ?></span>
  </div>
  <div class="col-md-4">
    <label class="form-label">Total</label>
    <span class="input-group-text" id="total-cabecera"><?php echo $comprobante->getTotal(); ?></span>
  </div>
</div>
  <hr>