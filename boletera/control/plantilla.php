<?php
  if(!isset($_COOKIE["sesion"])){
    header("location: login.php");
    die();
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>En Contrucción</title>
</head>

  <!-- Menus SideBar Reference -->
  <?php include("menus.php"); ?>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="pl-5 pr-5 pt-2 pb-2 rounded">
          <div class="row">
            <div class="col-6 float-start">
              <h3>En construcción...</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- JS Scripts Reference -->
  <?php include("scripts.php"); ?>

  <!-- Index JS Reference -->
  <script src="scripts/index.js"></script>

</body>
</html>
