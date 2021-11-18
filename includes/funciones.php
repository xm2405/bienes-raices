<?php

    define('TEMPLATES_URL', __DIR__ . '../templates');
    define('FUNCIONES_URL', __DIR__ . 'funciones.php');
    define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/public/img_propiedades/');
    define('CARPETA_IMG_VEN', $_SERVER['DOCUMENT_ROOT'] . '/public/img_vendedores/');

    function includTemplate( $nombre, $inicio=false){
        include TEMPLATES_URL. "/${nombre}.php";
    }


    function auntenticado() {
        session_start();
        if($_SESSION['login']){
            header('Location: ');
        }
        
    }

    function debug($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        exit; 
    }
    //**Escapar/Sanitizar el HTML**/
    function s($html):string{
        $s = htmlspecialchars($html);
        return $s;
    }

    function validarTipos($tipo){
        $tipos=['vendedor','propiedad'];
        return in_array($tipo, $tipos);
    }

    function notificacion($codigo){
        $noti = '';

        switch($codigo){
            case 1: 
                $noti='¡Creado Correctamente!';
                break;
            case 2:
                $noti = '¡Actualizado con Exito!';
                break;
            case 3:
                $noti = '¡Eliminado Exitosamente!';
                break;
            default:
                $noti = false;
                break;
        }
        return $noti;
    }