<!--<a href="?controller=empleados&action=guardar" class="btn btn-success my-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Empleado</a> -->

<h3 class="mt-3 text-center">Detalle de venta: ID <?php echo $data['id']?></h3>
<table class="table table-bordered mx-4">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Decripcion</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($detalle_ventas as $venta){ ?>

        <tr>
            <td><?php echo $venta->nombre; ?></td>
            <td><?php echo $venta->descripcion; ?></td>
            <td><?php echo $venta->detalle_cantidad; ?></td>
            <td><?php echo $venta->detalle_precio; ?></td>
            <td><?php echo $venta->detalle_precio * $venta->detalle_cantidad; ?></td>   
        </tr>
        <?php }?>
    </tbody>
</table>