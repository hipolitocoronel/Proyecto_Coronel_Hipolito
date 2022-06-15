<div class="categorias-container px-5 mt-4">  
    <h3>Productos</h3>
    <div class="row">
        <?php foreach($productos as $producto){?>
        <div class="col-xs-12 col-sm-6 col-md-4 mb-3">
            <div class="card card-product">
                    <img src="<?= base_url()?>/uploads/<?= $producto->img_producto?>" class="card-img-top" alt="">
                <div class="card-body">
                    <?php 
                        echo form_hidden('stock', $producto->stock);
                        echo form_hidden('desc', $producto->descripcion);
                        echo form_hidden('id', $producto->idProducto);
                        echo form_hidden('categoria', $producto->categoria_descripcion);
                    ?>
                    <p class="card-text font-sec mb-0"><?=$producto->nombre?></p>
                    <p class="text-black-50 mt-0">$<?= $producto->precio?></p>

                    <?php if($this->session->userdata('login')){?>
                    <a data-bs-toggle="modal" class="btn btn-light border w-100 showModal" data-bs-target="#modalProducto">Ver detalle</a>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php }?>
</div>
</div>

<!--MODAL PRODCTO -->

<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center p-0">
                            <figure class="figure">
                                <img src="" class="figure-img img-fluid img-modal" alt="...">


                            </figure>
                            <div class="d-flex flex-row gap-2 justify-content-center">
                                <p class="font-sec" >Stock: <span class="fw-bold stock-text" id="stock"></span>
                                </p>
                                <p class="font-sec ">Precio: <span class="fw-bold precio-text"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <ul class="h-100 d-flex flex-column justify-content-between">
                                <li class="font-sec text-black">
                                    <p class="mb-0 font-big ">Descripcion:</p>
                                    <p class="desc-text font-sec"></p>
                                    <p class="font-big  mt-2">Categoria: 
                                    <span class="font-sec font-big categoria-text"></span>
                                    </p>
                                </li>
                                <div class="row mb-3" id="cantidadContent">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label font-sec">Cantidad: </label>
                                    <div class="col-sm-8">
                                        <?= form_open('comprar');?>
                                        <input type="number" name="cantidad" value="1" min="1" class="form-control font-sec"
                                            id="cantidad">
                                        <div id="msjCantidad" class="text-danger font-sec mb-1">
                                            
                                        </div>
                                    </div>

                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Cancelar</button>
                    <?php
                        echo form_hidden('idProducto');
                        echo form_hidden('precio');
                        echo form_hidden('nombre');
                    ?>
                    <button type="submit" id="submitModal" class="btn btn-dark"> 
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        Agregar al carrito
                    </button>
                    <?php form_close()?>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.showModal').click(function(){
            $('.img-modal').attr('src', $(this).parent().siblings().attr('src'));
            $('.modal-title').text($(this).siblings('p:first').text());
            $('.precio-text').text($(this).siblings('p:last').text());
            $('.precio-text').text( $('.precio-text').text().substring(1));
            $('.stock-text').text($(this).siblings('input:first').val());
            $('.categoria-text').text($(this).siblings('input:last').val());
            $('.desc-text').text($(this).siblings('input:nth(1)').val());
            $('input[name="idProducto"]').val($(this).siblings('input:nth(2)').val());

            if(parseInt($('.stock-text').text(),10) < 1){
                $('.stock-text').addClass('text-danger');
                $('#submitModal').attr('disabled', 'disabled');
                $('#msjCantidad').text('No disponible');
            }
        });

        $('#submitModal').click(function(){
            var cant= $('input[name="cantidad"]').val();
            var stock= $('.stock-text').text();
            var precio= $('.precio-text').text();
            var id= $('input[name="idProducto"]').val();
            $('input[name="precio"]').val(precio);
            $('input[name="nombre"]').val($('.modal-title').text());

            if(cant>stock){
                $('#msjCantidad').text('Stock Insuficiente!');
            }else{
                $('#submitModal').submit();
            } 
            
        });  

        $('.closeModal').click(function(){
            $('#msjCantidad').text('');
            $('input[name="cantidad"]').val('1');
            $('.stock-text').removeClass('text-danger');
            $('#submitModal').removeAttr('disabled');
        });
        $('.btn-close').click(function(){
            $('#msjCantidad').text('');
            $('input[name="cantidad"]').val('1');
            $('.stock-text').removeClass('text-danger');
            $('#submitModal').removeAttr('disabled');
        });  
        
    });
</script>

<br>