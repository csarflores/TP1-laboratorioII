<!DOCTYPE html>
<html>

<head>
  <?php include('view/head.php'); ?>
  <title>Administrador de cliente</title>
</head>

<body>
  <div class="grid text-center">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-2"></div>
        <div class="col-md-auto">
          <div>
            <?php
            if (isset($_GET['id'])) {
              //incluye la clase Cliente y CrudCliente
              require_once('../../Dato/metodos.php');
              require_once('../../Negocio/objCliente.php');
              $crud = new CrudCliente();
              $cliente = new Cliente();
              //busca el cliente utilizando el id, que es enviado por GET desde la vista mostrar.php
              $cliente = $crud->obtenerCliente($_GET["id"]);
            }

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