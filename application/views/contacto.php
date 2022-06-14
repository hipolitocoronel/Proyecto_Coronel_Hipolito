<div class="row container mt-3 mx-auto gy-2">
<h4 class="">FORMULARIO DE CONTACTO</h4>
    <div class="col-xs-12 col-lg-8 mx-0 font-sec ">
        <?= form_open('sendConsulta')?>
        <div class="">
            <label for="nombre">Ingrese su nombre (*)</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value=<?=set_value('nombre')?>>
            <p class="text-danger font-sec mb-1"><?php echo form_error('nombre'); ?> </p>
        </div>
        <div class="">
            <label for="correo">Ingrese su correo electrónico (*)</label>
            <input type="email" class="form-control" name="correo" id="correo" value=<?=set_value('correo')?>>
            <p class="text-danger font-sec mb-1"><?php echo form_error('correo'); ?> </p>
        </div>
        <div class="">
            <label for="asunto">Ingrese asunto (*)</label>
            <input type="text" class="form-control" name="asunto" id="asunto" value=<?=set_value('asunto')?>>
            <p class="text-danger font-sec mb-1"><?php echo form_error('asunto'); ?> </p>
        </div>
        <div class="mb-4">
            <label for="consulta" class="form-label">Ingrese su mensaje (*)</label>
            <textarea name="consulta" id="consulta" class="form-control" rows="3" placeholder="Mensaje"><?=set_value('nombre')?></textarea>
            <p class="text-danger font-sec"><?php echo form_error('consulta'); ?> </p>
        </div>
        <div class="mt-3">
            <?= form_submit('Enviar', 'Enviar', "class='btn  btn-dark w-100'"); ?>
        </div>
        <?= form_close()?>
    </div>
    <div class="col-xs-12 col-lg-4">
    <div class="info">
            <p class="font-sec">Lunes a Domingo – 10 a 20 hs <br>
                Tel.: 3782-433132</p>
        </div>
        <iframe class="w-100 h-75 border rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.758896892417!2d-58.82966688527766!3d-27.476764523581053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b618b50fcd1%3A0x83fcdd01ccc99ad6!2sParaguay%201750%2C%20W3400CLU%20Corrientes!5e0!3m2!1ses!2sar!4v1654006811169!5m2!1ses!2sar" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
</div>