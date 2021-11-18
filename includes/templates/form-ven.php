<fieldset>
    <legend>Información General</legend>
    <label for="nombre">Nombre</label>
    <input type="text" name="vendedor[nombre]" placeholder="Nombre(s)" id="nombre" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellidos</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellidos" value="<?php echo s($vendedor->apellido); ?>">

    <label for="imagen">Imagen <i class="fas fa-image"></i></label>
    <input type="file" id="imagen" name="vendedor[imagen]" accept="image/jpg, img/png">

    <?php if ($vendedor->imagen) { ?>
        <img src="/img_vendedores/<?php echo $vendedor->imagen; ?>" class="img-small">
    <?php } ?>
</fieldset>
<fieldset>
    <legend>Información Adicional</legend>
    <label for="email">Correo electrónico </label>
    <input type="email" id="email" name="vendedor[email]" placeholder="Tu correo electrónico" value="<?php echo s($vendedor->email); ?>">
    <label for="telefono">Número de Telefono </label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Tu Número de Telefono" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>