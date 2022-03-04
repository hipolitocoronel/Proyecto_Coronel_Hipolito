<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('principal')?>">Arandú</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="inicio" class="nav-link active" aria-current="page"
                        href="<?php echo base_url('principal')?>">Inicio</a>
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

                <!-- Si el usuario inicio Sesion -->
                <?php if ($this->session->userdata('login')) { ?>
                <li class="nav-item mr-3">
                    <a id="productos" class="nav-link" href="<?php echo base_url('ver_carrito')?>">
                        <i class="fas fa-shopping-bag font-big"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">1</span>
                    </a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-brown dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('nombre'); ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="<?php echo base_url('salir') ?>"><i class="fa fa-sign-out"></i>
                            Salir</a>
                    </ul>
                </div>
                <?php } else{?>

                <li class="nav-item">
                    <a class="btn btn-secondary btn-brown rounded-pill px-3" href="<?php echo base_url('login_index')?>"
                        role="button"> Ingresar o Registrarse </a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>