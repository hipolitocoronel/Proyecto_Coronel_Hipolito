<div class="container-fluid">
    <h3 class="mt-3 text-center">Listado de Productos</h3>
    <a href="<?php echo base_url('agregar_producto_view')?>" class="btn btn-success mb-1"><i class="fa fa-plus-circle"
            aria-hidden="true"></i> Agregar Producto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto){?>
            <tr>
                <td class="font-sec"><?= $producto->idProducto ?></td>
                <td>
                    <img 
                        src="<?= base_url("/uploads/$producto->img_producto")?>" 
                        class="img-fluid" alt="<?= $producto->nombre ?>"
                        width="160px"
                    >
                </td>
                <td class="font-sec"><?= $producto->nombre ?></td>
                <td class="font-sec"><?= $producto->descripcion ?></td>
                <td class="font-sec">$<?= $producto->precio ?></td>
                <td>
                    <div class="btn-group gap-1" role="group" aria-label="">
                        <a href="<?php echo base_url("producto_controller/editar_producto_index/$producto->idProducto")?>"
                            class="btn btn-warning text-white rounded" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        <?php if($producto->estado==1){?>
                        <a href="<?php echo base_url("producto_controller/eliminar_producto/$producto->idProducto")?>"
                            type="button" class="btn btn-danger rounded" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Desactivar">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <?php } else{ ?>
                        <a href="<?php echo base_url("producto_controller/activar_producto/$producto->idProducto")?>"
                            class="btn btn-success rounded" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Activar"> <i class="fa fa-check-circle" aria-hidden="true"></i> </a>
                        <?php }?>
                    </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>