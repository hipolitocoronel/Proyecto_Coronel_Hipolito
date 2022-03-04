<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url('principal')?>">Arandú</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a id="inicio" class="nav-link active" aria-current="page" href="<?php echo base_url('principal')?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a id="contacto" class="nav-link" href="<?php echo base_url('contacto')?>">Contacto</a>
        </li>
        <li class="nav-item">
          <a id="nosotros" class="nav-link" href="<?php echo base_url('nosotros')?>">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a id="productos" class="nav-link" href="<?php echo base_url('productos')?>">Productos</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-secondary btn-login-register rounded-pill px-3" href="<?php echo base_url('login_index')?>" role="button">  Ingresar o Registrarse  </a>
        </li>
      </ul>
    </div>
  </div>
</nav>