<!--<a href="?controller=empleados&action=guardar" class="btn btn-success my-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Empleado</a> -->

<h3 class="mt-3 text-center">Listado de Usuarios</h3>
<table class="table table-bordered mx-4">
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
            <td><?php echo $usuario->idUsuario; ?></td>
            <td><?php echo $usuario->nombre; ?></td>
            <td><?php echo $usuario->correo; ?></td>
            <td><?php echo $usuario->perfil_descripcion?></td>
            <td>
                <?php if($usuario->idPerfil==1) {?>
                <div class="btn-group w-100" role="group" aria-label="">
                    <a href="#" class="btn btn-warning">EDITAR</a>
                </div>
                <?php } else{ 
                        if($usuario->estado==1){ ?>
                            <div class="btn-group w-100" role="group" aria-label="">
                                <a href="#" class="btn btn-warning">EDITAR</a>
                                <a href="<?php echo base_url("user_controller/eliminar_usuario/$usuario->idUsuario")?>" class="btn btn-danger">DESACTIVAR</a>
                            </div>
                        <?php } else{?><!--FIN IF-->
                                    <div class="btn-group w-100" role="group" aria-label="">
                                        <a href="#" class="btn btn-warning">EDITAR</a>
                                        <a href="<?php echo base_url("user_controller/activar_usuario/$usuario->idUsuario")?>" class="btn btn-success">ACTIVAR....!</a>
                                    </div>
                                <?php }?> <!--FIN ELSE-->
                <?php }?> <!--FIN ELSE -->                       
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>