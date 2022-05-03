<h4 class="text-center mt-3">NUEVO PRODUCTO</h4>
<div class="container border w-50 d-flex align-items-center flex-column">
    <div class="font-sec w-100 p-4">
        <?php echo form_open_multipart('guardar_producto'); ?>
        <div class="form-group">
            <label for="apellido">Ingrese su nombre (*)</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre completo', 'autofocus' => 'autofocus', 'value' => set_value('nombre')]); ?>
            <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese una descripcion (*)</label>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Descripcion Breve', 'autofocus' => 'autofocus', 'value' => set_value('descripcion')]); ?>
            <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
        </div>
        <div class="form-group">
            <label for="categoria">Seleccione una categoria (*)</label>
            <?php 
                $lista['0'] = 'Categoria';
                foreach($categorias as $categoria){
                    $lista[$categoria->idCategoria] = $categoria->categoria_descripcion;
                }
                echo form_dropdown('categoria', $lista,'0', 'class="form-control" ');
            ?>
            <span class="text-danger"><?php echo form_error('categoria'); ?> </span>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese precio (*)</label>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Precio', 'autofocus' => 'autofocus', 'value' => set_value('precio')]); ?>
            <span class="text-danger"><?php echo form_error('precio'); ?> </span>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese stock (*)</label>
            <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'type' => 'number', 'class' => 'form-control', 'placeholder' => 'Stock', 'autofocus' => 'autofocus', 'value' => set_value('precio'), 'min' => '1' ]); ?>
            <span class="text-danger"><?php echo form_error('stock'); ?> </span>
        </div>
        <div class="form-group">
            <label for="imagen">Seleccione una imagen (*)</label>
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => set_value('imagen')]); ?>
            <span class="text-danger"><?php echo form_error('imagen'); ?> </span>
        </div>
        <div class="my-3">
            <?php echo form_submit('registrar', 'Registrar', "class='btn  btn-dark btn-brown w-100'"); ?>
        </div>
        <?php echo form_close(); ?>
    </div>

</div>