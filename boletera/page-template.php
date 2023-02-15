<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¡Hola Mundo!</title>

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
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">¡Hola Mundo!</h1>
            <p class="lead text-muted">Esta es una página de prueba.</p>
            <br>
            <img class="mb-3" width="128" height="128" src="img/hu-tao/Icon_Emoji_Hu_Tao_2.webp" alt="test-icon">
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
