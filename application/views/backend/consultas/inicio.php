<!--<a href="?controller=empleados&action=guardar" class="btn btn-success my-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Empleado</a> -->

<h3 class="mt-3 text-center">Listado de Consultas</h3>
<a href="<?php echo base_url('consultas_leidas')?>" class="mx-4 btn btn-dark">Ver consultas leidas</a>
<table class="table table-bordered mx-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($consultas as $consulta){ 
                if($consulta->estado==1){?>
        <tr>
            <td><?php echo $consulta->idConsulta?></td>
            <td><?php echo $consulta->nombre?></td>
            <td><?php echo $consulta->correo?></td>
            <td><?php echo $consulta->asunto?></td>
            <td><?php echo $consulta->consulta?></td>
            <td>
                <div class="btn-group w-100" role="group" aria-label="">
                    <a href="<?php echo base_url('ver_contus')?>" class="btn btn-warning">Marcar como leido</a>
                </div>
            </td>
        </tr>
        <?php }}?>
    </tbody>
</table>

