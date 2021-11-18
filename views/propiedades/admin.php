<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces </h1>
    <?php
    if ($mensaje) {
        $noti = notificacion(intval($mensaje));
        if ($noti) { ?>
            <p class="alerta exito"> <?php echo s($noti); ?> </p>
    <?php }
    } ?>

    <h2>Propiedades</h2>
    <a href="/public/propiedades/create" class="boton-verde">Nueva Propiedad <i class="fas fa-home"></i></a>
    <table class="tablas">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Imagen de la Propiedad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--**Mostrar los resultados**-->
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo; ?> </td>
                    <td> <img src="/public/img_propiedades/ ?php echo $propiedad->imagen; ?>" class="img-tabla"> </td>
                    <td>$<?php echo $propiedad->precio; ?> </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades/update.php?id=<?php echo $propiedad->id; ?>" class="boton-exito"><i class="far fa-edit"></i> Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>
    <a href="/admin/vendedores/create-v.php" class="boton-verde">Nuevo Vendedor <i class="fas fa-user"></i></a>
    <table class="tablas">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Completo</th>
                <th>Foto del Vendedor</th>
                <th>Telefono</th>
                <th>Email del Vendedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--**Mostrar los resultados**-->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td> <img src="/img_vendedores/<?php echo $vendedor->imagen; ?>" class="img-tabla"> </td>
                    <td> <?php echo $vendedor->telefono; ?> </td>
                    <td> <?php echo $vendedor->email; ?> </td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        <a href="/admin/vendedores/update-v.php ?id=<?php echo $vendedor->id; ?>" class="boton-exito"><i class="fas fa-user-edit"></i> Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>