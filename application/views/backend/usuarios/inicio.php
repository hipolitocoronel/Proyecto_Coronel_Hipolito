<?php if(isset($_SESSION['message'])){?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa fa-check-circle" aria-hidden="true"></i> <?= $_SESSION['message']?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION["message"]); } ?>

<div class="container-fluid">
    <h3 class="mt-3 text-center">Listado de Usuarios</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Perfil</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($usuarios as $usuario){ ?>

            <tr>
                <td class="font-sec"><?php echo $usuario->idUsuario; ?></td>
                <td class="font-sec"><?php echo $usuario->nombre; ?></td>
                <td class="font-sec"><?php echo $usuario->correo; ?></td>
                <td class="font-sec"><?php echo $usuario->perfil_descripcion?></td>
                <td class="font-sec">
                    <?php if($usuario->idPerfil==1) {?>
                    <div class="btn-group w-100 gap-1" role="group" aria-label="">
                        <a href="<?php echo base_url("user_controller/editar_usuario/$usuario->idUsuario")?>"
                            class="btn btn-warning rounded text-white" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                    </div>
                    <?php } else{ 
                        if($usuario->estado==1){ ?>
                    <div class="btn-group w-100 gap-1" role="group" aria-label="">
                        <a href="<?php echo base_url("user_controller/editar_usuario/$usuario->idUsuario")?>"
                            class="btn btn-warning text-white rounded" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        <a href="<?php echo base_url("user_controller/eliminar_usuario/$usuario->idUsuario")?>"
                            class="btn btn-danger rounded" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Eliminar"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                    </div>
                    <?php } else{?>
                    <!--FIN IF-->
                    <div class="btn-group w-100 gap-1" role="group" aria-label="">
                        <a href="#" class="btn btn-warning rounded text-white" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        <a href="<?php echo base_url("user_controller/activar_usuario/$usuario->idUsuario")?>"
                            class="btn btn-success rounded" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Activar"> <i class="fa fa-check-circle" aria-hidden="true"></i></a>
                    </div>
                    <?php }?>
                    <!--FIN ELSE-->
                    <?php }?>
                    <!--FIN ELSE -->
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
