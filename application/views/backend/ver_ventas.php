<!--<a href="?controller=empleados&action=guardar" class="btn btn-success my-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Empleado</a> -->
<div class="container-fluid">
<h3 class="mt-3 text-center">Listado de Ventas</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nro de Venta</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($ventas as $venta){ ?>

        <tr>
            <td class="font-sec"><?php echo $venta->idVenta; ?></td>
            <td class="font-sec"><?php echo $venta->nombre; ?></td>
            <td class="font-sec">$<?php echo $venta->total; ?></td>
            <td class="font-sec"><?php echo $venta->venta_fecha; ?></td>
            <td class="font-sec">

                <a href="<?php echo base_url("admin_controller/ver_detalle_venta/$venta->idVenta")?>"
                    class="btn btn-outline-dark">Ver detalle</a>

            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
</div>