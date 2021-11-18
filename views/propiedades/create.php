<main class="contenedor seccion">
    <h1>Añadir Nueva Propiedad</h1>
    <a href="/public/admin" class="boton-back"><i class="fas fa-arrow-circle-left"></i> Volver</a>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form action="/public/propiedades/create" class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/form-prop.php'; ?>
        <input type="submit" value="Crear Propiedad " class="boton-verde"> 
    </form>
</main>