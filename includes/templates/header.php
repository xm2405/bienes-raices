<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../build/css/app.css">
    <script src="https://kit.fontawesome.com/c56bf70944.js" crossorigin="anonymous"></script>
    <title>Bienes Raices</title>
</head>

<body>

    <header class="site-header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="../../img/logo.svg" alt="Logotipo de Bienes Raíces">
                </a>

                <div class="mobile-menu">
                    <img src="../../build/img/barras.svg" alt="Icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode" src="../../build/img/dark-mode.svg">
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