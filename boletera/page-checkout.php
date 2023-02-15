<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>

  <!-- Styles Module CSS Reference -->
  <?php include("module-styles.php"); ?>

</head>
<body class="bg-light">

  <!-- Top NavBar Reference -->
  <?php include("module-navbar.php"); ?>

  <main>
    <div class="container">

      <!-- Content -->
      <section class="py-4 text-center container">
        <h1 class="fw-light">¡En construcción!</h1>
        <p class="lead text-muted">Esta página sigue en construcción, vuelve más tarde.</p>
        <br>
        <img class="mb-3" width="200" height="200" src="img/website-under-construction.png" alt="test-icon">

        <div class="row py-lg-5">

          <div class="col-md-8 py-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Carrito de Compras</h5>
                <h6 class="card-subtitle mb-2 text-muted">3 Items</h6>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Boleto I</li>
                  <li class="list-group-item">Boleto II</li>
                  <li class="list-group-item">Boleto III</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4 py-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Resumen del pedido</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Costo Total</li>
                  <li class="list-group-item">Comprar</li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- / Content -->

      <!-- Bottom Footer Reference -->
      <?php include("module-footer.php"); ?>

    </div>
  </main>

  <!-- JS Scripts References -->
  <?php include("module-scripts.php"); ?>

</body>
</html>
