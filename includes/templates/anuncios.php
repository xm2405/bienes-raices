<?php
    use Model\Propiedad;

    

    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
        $propiedades = Propiedad::todes();
    }else{
        $propiedades = Propiedad::getT(3);
    }
?>

<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) { ?>
        <div class="anuncio">
            <img src="/imagenes_propiedades/<?php echo $propiedad->imagen;   ?>" alt="Anuncio" loading="lazy">
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <!--**<><?php echo $propiedad->descripcion;?> -->

                <p class="precio">$<?php echo $propiedad->precio; ?></p>
                <ul class="iconos-carac">
                    <li>
                        <img class="ico" src="build/img/icono_wc.svg" alt="icono WC">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="ico" src="build/img/icono_dormitorio.svg" alt="icono Estacionamientos">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="ico" src="build/img/icono_dormitorio.svg" alt="icono Habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-yellow-block">Ver Propiedad</a>
            </div><!--***CONTENIDO ANUNCIO***-->
        </div><!--***ANUNCIO 1***-->
    <?php } ?>
</div><!--****CONTENEDOR DE ANUNCIOS**-->