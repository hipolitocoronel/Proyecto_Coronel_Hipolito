<h3 class="mt-3 text-center">Consultas Leidas</h3>
<a href="<?php echo base_url('ver_consultas')?>" class="btn btn-success my-1 mx-4"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ver cosultas activas</a>
<table class="table table-bordered mx-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Asunto</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($consultas as $consulta){ 
                if($consulta->estado==0){ ?>
        <tr>
            <td><?php echo $consulta->idConsulta?></td>
            <td><?php echo $consulta->nombre?></td>
            <td><?php echo $consulta->correo?></td>
            <td><?php echo $consulta->asunto?></td>
            <td><?php echo $consulta->consulta?></td>
        </tr>
        <?php }}?>
    </tbody>
</table>

