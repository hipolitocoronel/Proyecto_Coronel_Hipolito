<h4 class="text-center my-3">MODIFICAR PRODUCTO</h4>
<div class=" mb-5 container border w-50 d-flex align-items-center flex-column">
    <div class="font-sec w-100 p-4">
        <?php echo form_open_multipart("producto_controller/actualizar_producto/$idProducto"); ?>
        <div class="form-group">
            <label for="apellido">Ingrese su nombre (*)</label>
            <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre completo', 'autofocus' => 'autofocus', 'value' => $producto]); ?>
            <span class="text-danger"><?php echo form_error('nombre'); ?> </span>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese una descripcion (*)</label>
            <?php echo form_input(['name' => 'descripcion', 'id' => 'descripcion', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Descripcion Breve', 'autofocus' => 'autofocus', 'value' => $descripcion]); ?>
            <span class="text-danger"><?php echo form_error('descripcion'); ?> </span>
        </div>
        <div class="form-group">
            <label for="categoria">Seleccione una categoria (*)</label>
            <?php 
                $lista['0'] = 'Categoria';
                foreach($categorias as $categoria){
                    $lista[$categoria->idCategoria] = $categoria->categoria_descripcion;
                }
                echo form_dropdown('categoria',$lista,'0', 'class="form-control" ');
            ?>
        </div>
        <div class="form-group">
            <label for="descripcion">Ingrese precio (*)</label>
            <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Precio', 'autofocus' => 'autofocus', 'value' => $precio]); ?>
            <span class="text-danger"><?php echo form_error('precio'); ?> </span>
        </div>
        <div class="form-group">
            <label for="imagen">Seleccione una imagen (*)</label>
            <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type' => 'file', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $imagen]); ?>
            <img src="<?php echo base_url('/uploads/') . $imagen ?>" class="p-2 m-5 border border-dark"
                alt="Imagen producto" height="200" width="200">
            <span class="text-danger"><?php echo form_error('imagen'); ?> </span>
        </div>
        <div class="my-3">
            <?php echo form_submit('actualizar_producto', 'Guardar Cambios', "class='btn  btn-dark btn-brown w-100'");?>
        </div>

        <?php echo form_close(); ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>