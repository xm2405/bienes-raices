<fieldset>
    <legend>Información General</legend>
    <label for="titulo">Titulo</label>
    <input type="text" name="propiedad[titulo]" placeholder="Titulo de la Propiedad" id="titulo" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio <i class="fas fa-dollar-sign"></i></label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la Propiedad" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen <i class="fas fa-image"></i></label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept=".jpg, .png">

    <?php if ($propiedad->imagen) { ?>
        <img src="/imagenes_propiedades/<?php echo $propiedad->imagen; ?>" class="img-small">
    <?php } ?>

    <label for="descripcion">Descripcion <i class="fas fa-comment-dots"></i></label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Informacion Propiedad</legend>
    <label for="habitaciones">Habitaciones <i class="fas fa-bed"></i></label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>" placeholder="Ej:3" min="1">

    <label for="wc">Baños <i class="fas fa-toilet"></i> <i class="fas fa-bath"></i></label>
    <input type="number" id="wc" name="propiedad[wc]" value="<?php echo s($propiedad->wc); ?>" placeholder="Ej:2" min="1">

    <label for="estacionamiento">Estacionamiento <i class="fas fa-car"></i></label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>" placeholder="Ej:2" min="1">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>
    <label for="Vendedor">Vendedores <i class="fas fa-user-friends"></i></label>
    <select name="propiedad[vendedor_id]" id="vendedor">
        <option selected disabled >--Selecione--</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedor_id === $vendedor->id ?'selected' : ''; ?> 
                value="<?php echo s($vendedor->id); ?>" > <?php echo s($vendedor->nombre)." ".s($vendedor->apellido); ?>
            </option>
        <?php } ?>
    </select>
</fieldset>