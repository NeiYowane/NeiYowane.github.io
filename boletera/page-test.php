<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¡Hola Mundo!</title>

  <?php include("module-styles.php"); ?>

  <!-- Fancy Apps CSS -->
  <link rel="stylesheet" href="vendors/fancyapps-4.0.30/fancybox.css">

  <!-- PanZoom CSS -->
  <link rel="stylesheet" href="vendors/fancyapps-4.0.30/panzoom.css">

  <!-- Custom Fancy Box Style -->
  <link rel="stylesheet" href="styles/fancybox.css">

</head>
<body class="bg-light">

  <?php include("module-navbar.php"); ?>

  <?php include("module-secnav.php"); ?>

  <?php include("module-mobilenav.php"); ?>

  <main>
    <div class="container">

      <!-- Content -->
      <section class="pb-4">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <div class="text-center">
              <h1 class="fw-light mt-4">¡Hola Mundo!</h1>
              <p class="lead text-muted">Esta es una página de prueba.</p>
              <br>
              <img class="mb-4" width="128" height="128" src="img/hu-tao/Icon_Emoji_Hu_Tao_2.webp" alt="test-icon">
              <br>

              <div class="row">
                <div class="col-6">
                  <div class="card card-body">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                      Collapse 2
                    </button>
                  </div>
                </div>

                <div style="min-height: 120px;">
                  <div class="collapse collapse-horizontal" id="collapse2">
                    <div class="col-6">
                    <div class="card card-body">
                      This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
                    </div>
                  </div>
                  </div>
                </div>

              </div>

              <p>

              </p>
              <div style="min-height: 120px;">
                <div class="collapse collapse-horizontal" id="collapseWidthExample">
                  <div class="card card-body" style="width: 300px;">
                    This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
                  </div>
                </div>
              </div>

              <!-- Fancy Box Button -->
              <button class="btn btn-primary fancybox" value="Open Fancybox">Open Fancybox</button>

              <div class="container">
                <h1 class="mt-12 mb-8 px-6 text-center text-lg md:text-2xl font-semibold">
                  Facebook inspired design, customized background
                </h1>

                <div class="flex flex-wrap gap-5 justify-center max-w-5xl mx-auto px-6">
                  <a data-fancybox="gallery" href="https://lipsum.app/id/46/1600x1200">
                    <img class="rounded" src="https://lipsum.app/id/46/200x150" />
                  </a>
                  <a data-fancybox="gallery" href="https://lipsum.app/id/47/1600x1200">
                    <img class="rounded" src="https://lipsum.app/id/47/200x150" />
                  </a>
                  <a data-fancybox="gallery" href="https://lipsum.app/id/51/1600x1200">
                    <img class="rounded" src="https://lipsum.app/id/51/200x150" />
                  </a>
                </div>
              </div>

            </div>
            <br><br><br><br>
          </div>
        </div>
      </section>
      <!-- / Content -->

      <?php include("module-footer.php"); ?>

    </div>
  </main>

  <?php include("module-scripts.php"); ?>

  <!-- Fancy Apps JavaScript -->
  <script src="vendors/fancyapps-4.0.30/fancybox.umd.js" type="text/javascript"></script>

  <!-- Fancy Box Script -->
  <script>
    $('.fancybox').click(function () {
      Fancybox.show(
      [
        {
          src: "img/hu-tao/hu-tao-icon-01.webp",
          type: "image",
        },
        {
          src: "img/hu-tao/Icon_Emoji_Hu_Tao_2.webp",
          type: "image",
        },
      ],
      {
        infinite: false,
      }
      );
    });
  </script>

</body>
</html>
