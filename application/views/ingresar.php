<?php if(isset($_SESSION['message'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check-circle" aria-hidden="true"></i> <?= $_SESSION['message']?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION["message"]); } ?>

<div class="row align-items-center justify-content-center">
    <div class="col-xs-10 col-md-6">
        <h4 class="text-center mt-3">INICIAR SESIÓN</h4>
        <div class="container border d-flex">
            <div class="font-sec w-100 p-4">
                <?php echo form_open('ingresar'); ?>
                <span class="text-danger"><?php echo validation_errors(); ?></span>
                <div class="">
                    <label for="correo">Ingrese su correo electrónico (*)</label>
                    <input type="email" class="form-control" name="correo" id="correo">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Ingrese su contraseña (*)</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="my-3">
                    <?php echo form_submit('Ingresar', 'Ingresar', "class='btn  btn-dark w-100'"); ?>
                </div>
                <div class="registrar">
                    <p class="font-sec">
                        No tienes cuenta? <a href="<?php echo base_url('register_index')?>" class="text-decoration-none color-brown">REGISTRATE AHORA</a>
                    </p>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
