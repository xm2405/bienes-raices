<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Img;

class PropController {
  public static function index(Router $router) {
    $propiedades = Propiedad::todes();
    $vendedores = Vendedor::todes();
    $mensaje = $_GET['mensaje'] ?? null;

    $router->render('propiedades/admin',[
      'propiedades'=>$propiedades,
      'mensaje'=>$mensaje,
      'vendedores'=>$vendedores
    ]);
  }       

  public static function create(Router $router){
    $propiedad = new Propiedad;
    $vendedores = Vendedor::todes();
    //Arreglo para los errores
    $errores = Propiedad::getErrores();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $propiedad = new Propiedad($_POST['propiedad']);
      

      //Generar nombre unico para la imagen
      $nameImage = md5(uniqid(rand(), true)) . ".jpg";
      
      //realiza un resiza con intervention
      if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Img::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImg($nameImage);
      }
      
      $errores = $propiedad->validar();

      //REvisar que el arreglo de errores este vacio
      if (empty($errores)) {


        if (!is_dir(CARPETA_IMAGENES)) {
          mkdir(CARPETA_IMAGENES);
        }

        //guarda la imagen
        $image->save(CARPETA_IMAGENES . $nameImage);

        $propiedad->guardar();
      }
    }

    $router->render('propiedades/create', [
      'propiedad' => $propiedad,
      'vendedores' => $vendedores,
      'errores'=>$errores
    ]);
  }

  public static function update() {
    echo "Desde el controlador y la funcion update";
  }
}
