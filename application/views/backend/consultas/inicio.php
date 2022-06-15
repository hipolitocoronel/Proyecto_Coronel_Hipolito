

<div class="container-fluid">
    <h3 class="mt-3 text-center">Listado de Consultas</h3>
    <a href="<?php echo base_url('consultas_leidas')?>" class="mb-1 btn btn-dark"> <i class="fa fa-eye"
            aria-hidden="true"></i> Ver consultas leidas</a>
    <table class="table table-bordered">
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
                <td class="font-sec"><?php echo $consulta->idConsulta?></td>
                <td class="font-sec"><?php echo $consulta->nombre?></td>
                <td class="font-sec"><?php echo $consulta->correo?></td>
                <td class="font-sec"><?php echo $consulta->asunto?></td>
                <td class="font-sec"><?php echo $consulta->consulta?></td>
                <td class="font-sec">
                    <div class="btn-group w-100" role="group" aria-label="">
                        <a href="<?php echo base_url("consulta_controller/eliminar_consulta/$consulta->idConsulta")?>"
                            class="btn btn-warning">Leìdo</a>
                    </div>
                </td>
            </tr>
            <?php }}?>
        </tbody>
    </table>
</div>