<div class="table-responsive">
  <table>
    <thead>
      <tr>
        <th scope="col" class="text-center">Código</th>
        <th scope="col" class="text-center">Cantidad</th>
      </tr>
    </thead>
    <tbody>
      <td><input type="number" id="codigoProducto"></td>
      <td><input type="number" id="cantidadProducto" value="1"></td>
      <td><a class="btn btn-primary" onclick="buscarProducto(document.getElementById('codigoProducto').value, document.getElementById('cantidadProducto').value)"><i class="bi bi-plus-lg"></i> Agregar</a></td>
    </tbody>
  </table>

  <br>

  <p class="text-start fw-lighter text-muted">Detalle de Productos</p>
  <table class="table table-hover" id="tabla-de-detalle">
      <thead id="detalle-de-productos">
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Código</th>
          <th scope="col" class="text-start">Artículo</th>
          <th scope="col" class="text-center">Cantidad</th>
          <th scope="col" class="text-center">Unitario</th>
          <th scope="col" class="text-center">% IVA</th>
          <th scope="col" class="text-center">Subtotal</th>
          <th scope="col" class="text-center"></th>
        </tr>
      </thead>
      <tbody id="detalle-de-productos">
        <?php $metodosProducto->listarIdVenta($comprobante->getIdVenta()); ?>
      </tbody>
  </table>
</div>

<script>
  "use strict"
  function buscarProducto(codigoProducto, cantidadProducto) {
    if (codigoProducto == "" || cantidadProducto == "") {
      alert("Debe ingresar el código del producto y una cantidad")
      return
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText == 'error en producto') {
            alert('El producto no existe. Controle el código ingresado.')
          } else {
            $("#tabla-de-detalle").load(location.href + " #detalle-de-productos")
            console.log(this.responseText)
            //let subtotal = document.getElementById("subtotal").innerHTML
            //document.getElementById("subtotal-cabecera").innerHTML = parseFloat(subtotal)
            //setTimeout(document.getElementById("subtotal-cabecera").innerHTML = parseFloat(subtotal),100);
            $('#detalle-de-productos').find('td:last-child').text();
          }
        }
      }
      xmlhttp.open("GET", "../../Negocio/Controller/controladorProducto.php?codigoProducto=" + codigoProducto + "&cantidad=" + cantidadProducto + "&idVenta=" + <?php echo $comprobante->getIdVenta(); ?>, true)
      xmlhttp.send()
    }
  }

  "use strict"
  function eliminarProducto(idDetalle) {
    var xmlhttp = new XMLHttpRequest()
    var xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $("#tabla-de-detalle").load(location.href + " #detalle-de-productos");
        //let subtotal = document.getElementById("subtotal").innerText;
        //document.getElementById("subtotal-cabecera").innerHTML = parseFloat(subtotal);
        //document.getElementById('iva-cabecera').innerHTML = document.getElementById('iva')
        //document.getElementById('total-cabecera').innerHTML = document.getElementById('total')
      }
    }
    xmlhttp.open("GET", "../../Negocio/Controller/controladorProducto.php?idDetalle=" + idDetalle, true)
    xmlhttp.send()
  }
</script>