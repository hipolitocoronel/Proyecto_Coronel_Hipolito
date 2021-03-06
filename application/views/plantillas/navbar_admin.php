<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url('administrador')?>">Arandú</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav d-flex w-100 justify-content-end">
        <li class="nav-item">
          <a id="inicio" class="nav-link active" aria-current="page" href="<?php echo base_url('administrador')?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a id="contacto" class="nav-link" href="<?php echo base_url('ver_usuarios')?>">Usuarios</a>
        </li>
        <li class="nav-item">
          <a id="nosotros" class="nav-link" href="<?php echo base_url('ver_productos')?>">Productos</a>
        </li>
        <li class="nav-item">
          <a id="nosotros" class="nav-link" href="<?php echo base_url('ver_ventas')?>">Ventas</a>
        </li>
        <li class="nav-item">
          <a id="productos" class="nav-link" href="<?php echo base_url('ver_consultas')?>">Consultas</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-secondary btn-brown rounded-pill px-3" href="<?php echo base_url('salir')?>" role="button">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>