<?php

namespace Model;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'imagen', 'email'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $imagen;
    public $email;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "El Nombre es Obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[] = "Los Apellidos son Obligatorios";
        }
        if (!$this->telefono) {
            self::$errores[] = "El Telefono es Obligatorio";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Por favor Ingresa solo Números";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es Obligatoria";
        }
        if (!$this->email) {
            self::$errores[] = "El email es Obligatorio";
        }
        return self::$errores; 
    }


    public function setImage($imagen)
    {
        //*eliminacion de una imagen previa
        if (!is_null($this->id)) {
            $this->borraimg();
        }
        //*Asignacion del atributo
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borraimg()
    {
        $exist = file_exists(CARPETA_IMG_VEN . $this->imagen);
        if ($exist) {
            unlink(CARPETA_IMG_VEN.$this->imagen);
        }
    }


    /*public function setImage($imagen){  
        //*Elimina la imagen previa de vendedor
        if(!is_null($this->id)){
            $exiteimg = file_exists(CARPETA_IMG_VEN . $this->imagen);
            if ($exiteimg) {
                unlink(CARPETA_IMG_VEN . $this->imagen);
            }
        }

        if($imagen){
            $this->imagen=$imagen;
        }

    }*/
    
}