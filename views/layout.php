<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/build/css/app.css">
    <script src="https://kit.fontawesome.com/c56bf70944.js" crossorigin="anonymous"></script>
    <title>Bienes Raices</title>
</head>

<body>

    <header class="site-header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="/public/build/img/logo.svg" alt="Logotipo de Bienes Raíces">
                </a>

                <div class="mobile-menu">
                    <img src="/public/build/img/barras.svg" alt="Icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode" src="/public/build/img/dark-mode.svg">
                    <nav id="navegacion" class="navegacion">
                        <?php if (!$auth) : ?>
                            <a href="/login.php"><i class="fas fa-user-tie"></i> Iniciar Sesion</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                            <a href="../../admin/index.php"><i class="fas fa-suitcase"></i> Administración</a>
                        <?php endif; ?>
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/cerrar-sesion.php"><i class="fas fa-user-times"></i> Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>

        <?php echo $inicio ? "<h1>Venta de Casas, Departamentos y Terrenos Exclusivos</h1>" : ''; ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros.php">Nosotros</a>
                <a href="/anuncios.php">Anuncios</a>
                <a href="/blog.php">Blog</a>
                <a href="/contacto.php">Contacto</a>
            </nav>
            <div>
                <p class="copyright">Todos los Derechos Reservados <?php echo date('Y'); ?> &copy;</p>
            </div>
        </div>
    </footer>

    <script src="/public/build/js/bundle.min.js"></script>

</body>

</html>