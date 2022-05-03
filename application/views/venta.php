<div class="row vh-100 justify-content-center bg-light">
    <div class="col-xs-12 bg-success text-white h-50 d-flex justify-content-center">
        <div class="content-text">
            <p class="text-center mb-0 fs-2 mt-5">!Tu compra ha sido exitosa!</p>
            <p class="font-sec text-center mt-0 fs-6 ">Número de operación: 000003434</p>
        </div>

        <i class="fa fa-check-circle fs-1 mt-5 p-2" aria-hidden="true"></i>
    </div>
    <div class="col-xs-8 col-md-6 position-relative h-50 ">
        <div class="container content-detalle position-absolute  start-0 bg-white shadow p-3 bg-body rounded">
            <p class="border-bottom pb-2 mb-1 fs-5">Detalle de compra</p>
            <ul class="list-group">
            <?php
            foreach($detalle_ventas as $venta){ ?>
                <li class="text-dark mb-1 d-flex ">
                    <img src="<?php echo base_url()?>uploads/<?php echo $venta->img_producto?>"
                        class="img-fluid" alt="..." width="60px">
                    <div class="px-2 content-text">
                        <p class="mb-0 font-sec"><?php echo $venta->nombre?></p>
                        <p class="mb-0 font-sec text-muted fs-6 ">$ <?php echo $venta->detalle_precio * $venta->detalle_cantidad?> | <?php echo $venta->detalle_cantidad?> unidad</p>
                    </div>
                </li>
            <?php }?>
            </ul>
            <div class="precio-venta d-flex align-items-center justify-content-between">
                <p class="pb-2 mb-0 fs-5">Importe total:</p>
                <p class="font-sec fs-5">$67686</p>
            </div>
            
            <a class="btn btn-secondary btn-sm btn-brown w-25" href="<?php echo base_url('productos')?>" role="button">Seguir comprando </a>
            <a class="btn btn-outline-dark btn-sm " href="<?php echo base_url('principal')?>" role="button">Ir a la pagina principal</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>