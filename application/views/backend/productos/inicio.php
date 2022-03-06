
<h3 class="mt-3 text-center">Listado de Productos</h3>
<a href="<?php echo base_url('agregar_producto')?>" class="btn btn-success mx-4"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Producto</a> 
<table class="table table-bordered mx-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Perfil</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($productos as $producto){ ?>
                <tr>
                    <td><?php echo $producto->idProducto ?></td>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->descripcion ?></td>
                    <td><?php echo $producto->precio ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                            <a href="#" class="btn btn-warning">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
        <?php }?>
    </tbody>
</table>
