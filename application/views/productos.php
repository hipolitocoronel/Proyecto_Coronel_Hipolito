<div class="catalogo mx-5 mt-4">
    <h4>Productos</h4>
    <ul class="list-group">
        <?php foreach ($productos as $producto) { 
            if($producto->estado==1){?>

        <li class="list-group-item text-dark">
            <div class="row">
                <div class="col-xs-12 col-md-2">
                    <img src="<?php base_url()?>uploads/<?php echo $producto->img_producto?>" alt="" class="img-fluid">
                </div>
                <ul class="col-xs-12 col-md-8">
                    <li class="font-sec font-big text-dark"><?php echo $producto->nombre?></li>
                    <li class="font-sec font-big text-black-50">Categoria: <?php echo $producto->categoria_descripcion?>
                    </li>
                    <input id="idProduccto" type="hidden" value="<?php echo $producto->idProducto?>"
                        class="form-control form-control-sm  mb-0 opacit-0"></input>
                </ul>
                <div class="col-xs-12 col-md-2">
                    <p class="font-big">$ <?php echo $producto->precio?></p>
                    <?php
                                if ($this->session->userdata('login')) { 
                                    echo form_open('comprar');
                                    echo form_hidden('id', $producto->idProducto);
                                    echo form_hidden('nombre', $producto->nombre);
                                    echo form_hidden('precio',$producto->precio);?>


                    <button type="button" id="modal-show-product" class="btn btn-light border font-sec show-modal" data-bs-toggle="modal"
                        data-bs-target="#modalProducto" 
                        data-bs-id="<?= $producto->idProducto?> " 
                        data-bs-precio="<?= $producto->precio?> " 
                        data-bs-categoria="<?= $producto->categoria_descripcion?> "
                        data-bs-descripcion="<?= $producto->descripcion?> "
                        data-bs-stock="<?= $producto->idProducto?> "
                        data-bs-img="<?= $producto->img_producto?> "
                        data-bs-nombre="<?= $producto->nombre?> "> Ver más
                        <i class="fas fa-file-alt"></i>
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


<!-- Modal -->
<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-center p-0">
                        <figure class="figure">
                            <img src="<?php base_url()?>uploads/" class="figure-img img-fluid img-text" alt="...">


                        </figure>
                        <div class="d-flex flex-row gap-2 justify-content-center">
                            <p class="font-sec" id="stock">Stock: <span class="fw-bold stock-text"></span>
                            </p>
                            <p class="font-sec " >Precio: <span class="fw-bold precio-text">$ </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <ul class="h-100 d-flex flex-column justify-content-between">
                            <li class="font-sec text-black">
                                <p class="mb-0 font-big">Descripcion:</p>
                                <p class="desc-text font-sec"></p>
                                <p class="font-big  mt-2">Categoria: <span class="font-sec font-big categoria-text"></span>
                                </p>
                            </li>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label font-sec">Cantidad: </label>
                                <div class="col-sm-8">
                                    <input type="number" value="1" min="1" class="form-control font-sec"
                                        id="cantidad">
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Agregar al carrito</button>
            </div>
        </div>
    </div>
</div>




<script>
var SITEURL = '<?php echo base_url(); ?>';
console.log(SITEURL);
$(document).ready(function() {
    /* When click edit user */
    $('body').on('click', '.show-modal', function() {
        var product_id = $(this).data("idProducto");
        console.log(product_id);
        $.ajax({
            type: "Post",
            url: SITEURL + "producto_controller/get_product_by_id",
            data: {
                id: product_id
            },
            dataType: "json",
            success: function(res) {
                if (res.success == true) {
                    $('#productCrudModal').html("Edit Product");
                    $('#btn-save').val("edit-product");
                    $('#ajax-product-modal').modal('show');
                    $('#product_id').val(res.data.id);
                    $('#stock').val(res.data.stock);
                    $('#product_code').val(res.data.product_code);
                    $('#description').val(res.data.description);
                }
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });

if ($("#productForm").length > 0) {
    $("#productForm").validate({
        submitHandler: function(form) {
            var actionType = $('#btn-save').val();
            $('#btn-save').html('Sending..');
            $.ajax({
                data: $('#productForm').serialize(),
                url: SITEURL + "product/store",
                type: "POST",
                dataType: 'json',
                success: function(res) {
                    var product = '<tr id="product_id_' + res.data.id + '"><td>' + res.data.id +
                        '</td><td>' + res.data.title + '</td><td>' + res.data.product_code +
                        '</td><td>' + res.data.description + '</td>';
                    product += '<td><a href="javascript:void(0)" id="" data-id="' + res.data
                        .id +
                        '" class="btn btn-info edit-product">Edit</a><a href="javascript:void(0)" id="" data-id="' +
                        res.data.id +
                        '" class="btn btn-danger delete-user delete-product">Delete</a></td></tr>';
                    if (actionType == "create-product") {
                        $('#product_list').prepend(product);
                    } else {
                        $("#product_id_" + res.data.id).replaceWith(product);
                    }
                    $('#productForm').trigger("reset");
                    $('#ajax-product-modal').modal('hide');
                    $('#btn-save').html('Save Changes');
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#btn-save').html('Save Changes');
                }
            });
        }
    })
}
</script>