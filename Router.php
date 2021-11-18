<?php

namespace MVC;

class Router {

  public $rutasGet = [];
  public $rutasPost = [];

  public function get($url, $fn) {
    $this->rutasGet[$url] = $fn;
  }

  public function post($url, $fn)
  {
    $this->rutasPost[$url] = $fn;
  }

  public function comprobaRutas() {
    $urlActu = $_SERVER['PATH_INFO'] ?? '/';
    $metodo = $_SERVER['REQUEST_METHOD'];

    if ($metodo === 'GET') {
      $fn = $this->rutasGet[$urlActu] ?? null;
    }else{
      $fn = $this->rutasPost[$urlActu] ?? null;
      
    }
    if ($fn) {
      //Si la url sí existe
      call_user_func($fn, $this);
    } else {
      echo "pagina no encontrada";
    }
  }

  public function render($view, $datos=[]){

    foreach($datos as $key=>$value){  
      $$key = $value;//*Variable de variable
    }

    ob_start();
    include __DIR__."/views/$view.php";

    $contenido = ob_get_clean();
    include __DIR__."/views/layout.php";
  }
}
