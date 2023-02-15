<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Géneros</title>

  <?php include("module-styles.php"); ?>

</head>
<body class="bg-light">

  <?php include("module-navbar.php"); ?>

  <main>

    <?php include("module-secnav.php"); ?>

    <!-- Mobile NavBar Reference -->
    <?php include("module-mobilenav.php"); ?>

    <div class="container">

      <!-- Search Bar -->
      <section class="text-center container">
        <div class="row py-4">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Géneros</h1>
            <p class="lead text-muted">Explora los diferentes géneros musicales y categorias de evento.</p>
            <?php include("module-search-bar.php"); ?>
          </div>
        </div>
      </section>
      <!-- / Search Bar -->

      <div class="row row-cols-1 row-cols-md-3 g-4" id="ContainerGeneros">


      </div>
      <!-- / Card Album -->

      <?php include("module-footer.php"); ?>

    </div>
  </main>

  <?php include("module-scripts.php"); ?>

  <script src="scripts/index.js" charset="utf-8"></script>
  <script src="scripts/Generos.js" charset="utf-8"></script>

</body>
</html>
