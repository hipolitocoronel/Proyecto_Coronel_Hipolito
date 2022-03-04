<h4 class="text-center mt-3">CREAR UNA CUENTA</h4>
<div class="container border w-50 d-flex align-items-center flex-column">
    <div class="font-sec w-100 p-4">
        <?php echo form_open('registrar'); ?>
        <div class="form-group">
            <label for="apellido">Ingrese su nombre (*)</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre completo', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
        </div> <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        <div class="form-group">
            <label for="apellido">Ingrese su correo electrónico (*)</label>
            <?php echo form_input(['name' => 'correo', 'id' => 'correo', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'autofocus' => 'autofocus', 'value' => set_value('correo')]); ?>
        </div> <span class="text-danger"><?php echo form_error('correo'); ?> </span>
        <div class="form-group">
            <label for="apellido">Ingrese su contraseña (*)</label>
            <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => set_value('password')]); ?>
        </div> <span class="text-danger font-sec"><?php echo form_error('password'); ?> </span>
        <div class="form-group">
            <label for="apellido">Repita su contraseña(*)</label>
            <?php echo form_input(['name' => 'passconf', 'id' => 'passconf', 'type' => 'password', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => set_value('password')]); ?>
        </div> <span class="text-danger font-sec"><?php echo form_error('passconf'); ?> </span>
        <div class="my-3">
            <?php echo form_submit('registrar', 'Registrar', "class='btn  btn-dark w-100'"); ?>
        </div>
        <div class="ingresar">
            <p class="font-sec">
                Ya tienes cuenta? <a href="<?php echo base_url('login_index')?>">INGRESÁ AHORA</a>
            </p>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>