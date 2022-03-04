<h4 class="text-center mt-3">ENVIANOS UN CORREO</h4>
<div class="container border w-50 d-flex align-items-center flex-column">
    <div class="font-sec w-100 p-4">
        <?php echo form_open('agregar_consulta'); ?>
        <div class="info">
            <p>Paraguay 1750 - Ciudad de Corrientes</p>
            <p class="font-sec">Lunes a Domingo – 10 a 20 hs <br>
                Tel.: 3782-433132</p>
        </div>
        <div class="">
            <label for="inputName">Ingrese su nombre (*)</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
            <span class="text-danger font-sec"><?php echo form_error('nombre'); ?> </span>
        </div>
        <div class="">
            <label for="inputName">Ingrese su correo electrónico (*)</label>
            <input type="email" class="form-control" name="correo" id="correo">
            <span class="text-danger font-sec"><?php echo form_error('correo'); ?> </span>
        </div>
        <div class="">
            <label for="inputName">Ingrese asunto (*)</label>
            <input type="text" class="form-control" name="asunto" id="asunto">
            <span class="text-danger font-sec"><?php echo form_error('asunto'); ?> </span>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ingrese su mensaje (*)</label>
            <textarea name="mensaje" class="form-control" rows="3" placeholder="Mensaje"></textarea>
            <span class="text-danger font-sec"><?php echo form_error('mensaje'); ?> </span>
        </div>
        <div class="mt-3">
            <?php echo form_submit('Enviar', 'Enviar', "class='btn  btn-dark w-100'"); ?>
        </div>
        <?php echo form_close()?>
    </div>
</div>