<h4 class="text-center mt-3">NUEVO PRODUCTO</h4>
<div class="container border w-50 d-flex align-items-center flex-column">
    <div class="font-sec w-100 p-4">
        <?php echo form_open('registrar_producto'); ?>
        <div class="form-group">
            <label for="apellido">Ingrese su nombre (*)</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre completo', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
            <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese una descripcion (*)</label>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Descripcion Breve', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
            <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
        </div>
        <div class="form-group">
        <label for="descripcion">Seleccione una categoria (*)</label>
            <select class="custom-select" id="inputGroupSelect02">
                <option selected>Haga click</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese precio (*)</label>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Precio', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
            <span class="text-danger"><?php echo form_error('precio'); ?> </span>
        </div>
        <div class="form-group">
            <label for="foto">Seleccione una imagen (*)</label>
            <?php echo form_input(['name' => 'foto', 'id' => 'foto', 'type' => 'file', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
            <span class="text-danger"><?php echo form_error('foto'); ?> </span>
        </div>
        <div class="my-3">
            <?php echo form_submit('registrar', 'Registrar', "class='btn  btn-dark btn-brown w-100'"); ?>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>