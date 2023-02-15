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
  <title>Inicio</title>

  <?php include("menus.php"); ?>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <div class="content-wrapper">
  <!-- CONTENIDO DE LA PAGINA -->

  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Bienvenido, Admin!</h1>
      <p>Planifica y gestiona nuevos eventos de forma eficiente atravez de este panel de control. Utiliza los diferentes controles para gestionar y añadir nuevos registros, editarlos, o desactivarlos.</p>
    </div>
  </div>

  <div class="container px-4 pb-5" id="hanging-icons">
    <h2 class="border-bottom">Configuraciones</h2>

    <div class="row g-4 pt-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
          <i class="fa-solid fa-user-music"></i>
        </div>
        <div>
          <h2>Artistas</h2>
          <p>Ingresa y registra toda la informacion referente a los artistas que formaran parte del evento.</p>
          <a href="ListaArtistas.php" class="btn btn-outline-secondary mb-4">
            Configuración
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
          <i class="fa-solid fa-music"></i>
        </div>
        <div>
          <h2>Géneros</h2>
          <p>Gestiona los diferentes géneros musicales que los artistas interpretaran para mejorar el sistema de recomendacion de eventos. </p>
          <a href="ListaGeneros.php" class="btn btn-outline-secondary mb-4">
            Configuración
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
          <i class="fa-solid fa-location-dot"></i>
        </div>
        <div>
          <h2>Escenarios</h2>
          <p>Ingresa toda la información referente al escenario del evento, como su tipo, capacidad, dirección, fotografias, etc.</p>
          <a href="ListaEscenarios.php" class="btn btn-outline-secondary mb-4">
            Configuración
          </a>
        </div>
      </div>
    </div>

    <div class="row g-4 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
          <i class="fa-solid fa-shapes"></i>
        </div>
        <div>
          <h2>Tipos de Escenario</h2>
          <p>Especifica nuevos tipos de escenarios para posteriormente seleccionarlos en la creacion de un nuevo escenario.</p>
          <a href="ListaTipoEscenarios.php" class="btn btn-outline-secondary mb-4">
            Configuración
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
          <i class="fa-solid fa-calendar-circle-plus"></i>
        </div>
        <div>
          <h2>Eventos</h2>
          <p>Planifica y crea nuevos eventos, conciertos y presentaciones atravez de los controles de esta página.</p>
          <a href="ListaEventos.php" class="btn btn-outline-secondary mb-4">
            Configuración
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
          <i class="fa-solid fa-ticket"></i>
        </div>
        <div>
          <h2>Áreas</h2>
          <p>Especifica las áreas y secciones de tu evento, asi como los precios y capacidades de cada uno.</p>
          <a href="plantilla.php" class="btn btn-outline-secondary mb-4">
            Configuración
          </a>
        </div>
      </div>
    </div>

  </div>

  </div>

  <?php include("scripts.php"); ?>
  
</body>
</html>
