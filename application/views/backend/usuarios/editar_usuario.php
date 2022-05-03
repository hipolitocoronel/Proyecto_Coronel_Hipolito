<h4 class="text-center mt-3">MODIFICAR USUARIO ID: <?php echo $id ?></h4>
<div class="container border w-50 d-flex align-items-center flex-column">
    <div class="font-sec w-100 p-4">
        <?php echo form_open_multipart("user_controller/actualizar_usuario/$id"); ?>
        <div class="form-group">
            <label for="apellido">Ingrese su nombre (*)</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre completo', 'autofocus' => 'autofocus', 'value' =>$nombre]); ?>
        </div> <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        <div class="form-group">
            <label for="apellido">Ingrese su correo electrónico (*)</label>
            <?php echo form_input(['name' => 'correo', 'id' => 'correo', 'type' => 'email', 'class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'autofocus' => 'autofocus', 'value' => $correo]); ?>
        </div> <span class="text-danger"><?php echo form_error('correo'); ?> </span>
        <div class="form-group">
            <label for="apellido">Ingrese una nueva contraseña (*)</label>
            <?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $password]); ?>
        </div> <span class="text-danger font-sec"><?php echo form_error('password'); ?> </span>
        <?php if($idPerfil==2){?>
            <div class="form-group">
                
                <label for="perfil">Seleccione tipo de perfil</label>
                <?php
                $lista['0'] = 'Seleccionar perfil';
                foreach ($perfil as $row) {
                    $lista[$row->idPerfil] = $row->perfil_descripcion;
                }
                echo form_dropdown('perfil', $lista, $idPerfil, 'class="form_control "');
                ?>
            </div> <span class="text-danger"><?php echo form_error('perfil'); ?> </span>
        <?php }?>
        <div class="my-3">
            <?php echo form_submit('editar_usuario', 'Guardar Cambios', "class='btn  btn-dark btn-brown w-100'"); ?>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>