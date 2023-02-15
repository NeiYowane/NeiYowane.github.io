<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light-navbar shadow-sm" aria-label="Main navigation">
  <div class="container-fluid mx-md-5 mx-sm-0">

    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand fw-bold" href="index.php">
      <img class="m-auto" width="24" height="24" src="img/ticket-icon/ticket-icon.png" alt="page-icon">
      RESO Boletos
    </a>

    <div class="navbar-collapse offcanvas-collapse bg-light-navbar" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link mx-2" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="page-sales-points.php">Puntos de Venta</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="page-about-us.php">Acerca de</a>
        </li>
      </ul>
      <form class="d-flex mx-2">
        <a href="page-login.php" class="btn btn-primary rounded-pill fw-bold mx-2" type="button">Acceder</a>
      </form>
    </div>
    <div class="dropdown">
      <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="page-account.php"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Mi Cuenta</a></li>
        <li><a class="dropdown-item" href="page-checkout.php"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;Carrito</a></li>
        <li><a class="dropdown-item" href="page-favorites.php"><i class="fa-solid fa-heart"></i>&nbsp;&nbsp;Favoritos</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;&nbsp;Cerrar Sesión</a></li>
      </ul>
      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img/default-profile-picture.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
      </a>
    </div>
  </div>
</nav>
