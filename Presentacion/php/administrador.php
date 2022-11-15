<!DOCTYPE html>
<html>

<head>
  <?php include('view/head.php'); ?>
  <title>Administrador de cliente</title>
</head>

<body>
  <div class="grid text-center">
    <div class="container">
      <div class="row justify-content-md-center mt-5">
        <div class="col col-lg-2"></div>
        <div class="col-md-auto">
          <div>
            <?php

            $accion = isset($_GET['accion']) ? $_GET['accion'] : '';

            switch ($accion) {
              case "alta":
                include('view/formularioAltaCliente.php');
                break;
              case "actualizar":
                include('view/formularioModificarClientes.php');
                break;
              case "facturar":
                include('view/formularioFacturacion.php');
                break;
              case "tipoComprobante":
                include('view/facturacion/tipoComprobante.php');
                break;
              default:
                echo 'Operacion seleccionada incorrecta.';
            }
            ?>
          </div>
        </div>
        <div class="col col-lg-2"></div>
      </div>
    </div>
    <?php include 'view/footer.php'; ?>
  </div>
</body>

</html>