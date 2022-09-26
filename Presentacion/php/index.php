<!DOCTYPE html>
<html>

<head>
  <?php include('view/head.php'); ?>
  <title>Clientes</title>
</head>

<body>
  <header>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <h1 class="navbar-brand">Clientes</h1>
        <div class="d-flex">
          <a href="administrador.php?accion=alta" class="btn btn-outline-success" role="button">Agregar cliente</a>
        </div>
      </div>
    </nav>
  </header>
  <div class="container text-center">
    <div class="row justify-content-md-center">
      <div class="col col-lg-2"></div>
      <div class="col-md-auto">
        <?php include('view/tablaMostrarClientes.php'); ?>
      </div>
      <div class="col col-lg-2"></div>
    </div>
  </div>
  <?php include 'view/footer.php'; ?>
</body>

</html>