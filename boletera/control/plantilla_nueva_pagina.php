<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
	$redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	header("Location: $redirect_url");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("estilos.php"); ?>
	<title>Recidencia | <? echo basename(__FILE__, '.php') ?> </title>
</head>
  <body class="nav-md">
    <div class="container body" >
			<?php include("menus.php");?>
        <div class="right_col" role="main">
         <!-- CONTENIDO PAGINA -->

        <h1 class="text-center">PÁGINA NUEVA, favor de informar a sistemas.</h1>

         <!-- CONTENIDO PAGINA -->
        </div>
      <?php include("footer.php"); ?>
      </div>
    </div>
		<?php include("scripts.php"); ?>

      <script src="scripts/index.js"></script>
      <script src="scripts/<? echo basename(__FILE__, '.php') ?>.js"></script>
  </body>
</html>
