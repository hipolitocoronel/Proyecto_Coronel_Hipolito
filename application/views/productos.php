<div class="catalogo mx-5 mt-4">
    <h4>Productos</h4>
    <ul class="list-group">
        <?php foreach ($productos as $producto) { 
            if($producto->estado==1){?>

                <li class="list-group-item text-dark">
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php base_url()?>uploads/<?php echo $producto->img_producto?>" alt="" class="img-fluid">
                        </div>
                        <ul class="col-8">
                            <li class="font-sec font-big text-dark"><?php echo $producto->nombre?></li>
                            <li class="font-sec font-big text-black-50">Categoria: <?php echo $producto->categoria_descripcion?>
                            </li>
                        </ul>
                        <div class="col-2 bg-dangr">
                            <p class="font-big"><?php echo $producto->precio?></p>
                            <?php
                                if ($this->session->userdata('login')) { 
                                    echo form_open('comprar');
                                    echo form_hidden('id', $producto->idProducto);
                                    echo form_hidden('nombre', $producto->nombre);
                                    echo form_hidden('precio', $producto->precio);?>
                                    
                                    <button type="submit" id="submit" class="btn btn-light border font-sec"> Comprar
                                    <span class="fa fa-shopping-cart"></span>
                                    </button>
                            <?php
                            echo form_close();
                            } ?>
                        </div>
                    </div>
                </li>
        <?php }}?>
    </ul>
</div>
