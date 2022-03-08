<h4 class="mx-4 mt-4">Carrito de Compras</h4>
<?php if ($cart = $this->cart->contents()) { ?>
<table class="table table-hover mx-4">
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
                <a href="<?php echo base_url('carrito_controller/borrar/' . $item['rowid'])?>" role="button">
                    <i class="fas fa-times pr-3"></i>
                </a>
                
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>

<div class="container-fluid mx-3">
    <div class="row">
        <div class="col col-md-8">
            <a class="btn btn-outline-dark" href="<?php echo base_url('productos'); ?>"
                role="button">Seguir Comprando</a>
        </div>
        <div class="col col-md-4 mx-auto d-flex flex-column align-items-center">
            <p class="font-sec">Subtotal: $<?php echo number_format($this->cart->total(), 2)?></p>
            <p class="font-big">Total: $<?php echo number_format($this->cart->total(), 2)?></p>
            <a class="btn btn-dark btn-brown px-4" href="<?php echo base_url('venta_controller/guardar_venta'); ?>"
                role="button">Ordenar compra</a>
        </div>
    </div>
</div>

<?php } else{?>
<div class="text-center">
    
    <h4 class="text-center mt-5"><?php echo $message ?></h4>
    <a class="btn btn-outline-dark" href="<?php echo base_url('productos'); ?>"
        role="button">VOLVER A LA TIENDA</a>
</div>
<?php } ?>