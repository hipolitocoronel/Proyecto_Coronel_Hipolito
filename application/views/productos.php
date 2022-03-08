<div class="catalogo mx-5 mt-4">
    <h4>Productos</h4>
    <ul class="list-group">
        <?php foreach ($productos as $producto) { ?>
            <li class="list-group-item text-dark">
            <div class="row">
                <div class="col-2">
                    <img src="<?php base_url()?>uploads/<?php echo $producto->img_producto?>" alt="" class="img-fluid">
                </div>
                <ul class="col-8">
                    <li class="font-sec font-big text-dark"><?php echo $producto->nombre?></li>
                    <li class="font-sec font-big text-black-50">Categoria: <?php echo $producto->categoria?></li>
                </ul>
                <div class="col-2 bg-dangr">
                    <p class="font-big"><?php echo $producto->precio?></p>
                    <a name="" id="" class="btn btn-light border font-sec" href="#" role="button">
                        Comprar
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </li>
        <?php }?>
    </ul>
</div>