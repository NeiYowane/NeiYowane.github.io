<style>
  .btn-light {
    background-color: #ffffff;
    border-color: #ffffff;
  }
</style>

<nav class="navbar py-2 bg-light-navbar shadow-lg mobile-nav" id="mobile-nav">
  <div class="container text-center d-flex justify-content-center">
    <div class="row d-flex justify-content-center">
      <div class="col-3 d-flex justify-content-center">
        <a href="index.php#events-nav" class="btn btn-light">
          <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa-solid fa-icons"></i></p>
          Eventos
        </a>
      </div>
      <div class="col-3 d-flex justify-content-center">
        <a href="page-calendar.php" class="btn btn-light">
          <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa-solid fa-calendar-day"></i></p>
          Calendario
        </a>
      </div>
      <div class="col-3 d-flex justify-content-center">
        <div class="dropup-center dropup">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fa-solid fa-palette"></i></p>
            Artistas
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="page-artists.php"><i class="fa-solid fa-person"></i>&nbsp;&nbsp;Solistas</a></li>
            <li><a class="dropdown-item" href="page-groups.php"><i class="fa-solid fa-people-group"></i>&nbsp;&nbsp;Grupos</a></li>
          </ul>
        </div>
      </div>
      <div class="col-3 d-flex justify-content-center">
        <a href="page-genres.php" class="btn btn-light">
          <p class="bi d-block mx-auto mb-1" width="24" height="24"><i class="fas fa-tags"></i></p>
          Géneros
        </a>
      </div>
    </div>
  </div>
</nav>
