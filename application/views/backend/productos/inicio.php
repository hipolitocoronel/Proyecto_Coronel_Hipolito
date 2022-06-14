<?php if(session('msj') !== null) {?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle mx-2" aria-hidden="true"></i>
        <?= session('msj')?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }?>

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
            <?php foreach($productos as $producto){  $idProducto=$producto['idProducto'];  $img=$producto['img_producto']?>
            <tr>
                <td class="font-sec"><?php echo $idProducto ?></td>
                <td>
                    <img 
                        src="<?= base_url("public/assets/uploads/$img")?>" 
                        class="img-fluid" alt="<?= $producto['nombre'] ?>"
                        width="160px"
                    >
                </td>
                <td class="font-sec"><?= $producto['nombre'] ?></td>
                <td class="font-sec"><?php echo $producto['descripcion'] ?></td>
                <td class="font-sec">$<?= $producto['precio'] ?></td>
                <td>
                    <div class="btn-group gap-1" role="group" aria-label="">
                        <a href="<?php echo base_url("ProductoController/editar_producto_view/$idProducto")?>"
                            class="btn btn-warning text-white rounded" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        <?php if($producto['estado']==1){?>
                        <a href="<?php echo base_url("ProductoController/disabledProducto/$idProducto")?>"
                            type="button" class="btn btn-danger rounded" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Desactivar">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <?php } else{ ?>
                        <a href="<?php echo base_url("ProductoController/enabledProducto/$idProducto")?>"
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