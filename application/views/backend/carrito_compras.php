<div class="container-fluid">
<h4 class="mx-1 mt-4">Carrito de Compras</h4>
<?php if ($cart = $this->cart->contents()) { ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="font-sec">Producto</th>
            <th class="font-sec">Cantidad</th>
            <th class="font-sec">Precio</th>
            <th class="font-sec">Sub Total</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cart as $item){?>
        <tr>
            <td class="font-sec"><?php echo $item['name']?></td>
            <td class="font-sec"><?php echo $item['qty']?></td>
            <td class="font-sec">$<?php echo $item['price']?></td>
            <td class="font-sec">$<?php echo $item['price']?></td>
            <td>
                <a href="<?php echo base_url('carrito_controller/borrar/' . $item['rowid'])?>" type="button" class="btn-close" aria-label="Close"></a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>

<div class="container-fluid mx-3">
    <div class="row">
        <div class="col col-md-8">
            <a class="btn btn-outline-dark" href="<?php echo base_url('productos'); ?>" role="button">Seguir
                Comprando</a>
            <button class="btn btn-secondary btn-md " href="#" role="button" data-bs-toggle="modal" data-bs-target="#modal-vaciar"> <i class="fa fa-trash" aria-hidden="true"></i> Vaciar carrito</button>    
        </div>
        <div class="col col-md-4 mx-auto d-flex flex-column align-items-center">
            <p class="font-sec">Subtotal: $<?php echo number_format($this->cart->total(), 2)?></p>
            <p class="font-big">Total: $<?php echo number_format($this->cart->total(), 2)?></p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-brown w-50" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                 Ordenar Compra
            </button>
        </div>
    </div>
</div>




<?php } else{?>
<div class="text-center">

    <h4 class="text-center mt-5"><?php echo $message ?></h4>
    <a class="btn btn-outline-dark" href="<?php echo base_url('productos'); ?>" role="button">VOLVER A LA TIENDA</a>
</div>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle" aria-hidden="true"></i> Atención</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea realizar la compra?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
<<<<<<< HEAD
                <button type="button" class="btn btn-dark">Confirmar compra</button>
=======
                <a href="<?php echo base_url('venta_controller/guardar_venta') ?>" type="button" class="btn btn-dark">Confirmar compra</a>
>>>>>>> 55d7b211f4a4bc7898253273be210221790cd70a
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-vaciar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle" aria-hidden="true"></i> Atención</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea vaciar el carrito de compras?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="<?php echo base_url('carrito_controller/borrar/all')?>" type="button" class="btn btn-dark">Confirmar</a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</body>

</html>