<?php
    namespace Model;

    class Propiedad extends ActiveRecord {
        protected static $tabla= 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion',
        'habitaciones', 'wc', 'estacionamiento', 'fecha_creacion', 'vendedor_id'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $fecha_creacion;
    public $vendedor_id;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->fecha_creacion = date('Y/m/d');
        $this->vendedor_id = $args['vendedor_id'] ?? '';
    }

    public function validar(){
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "El Precio es Obligatorio";
        }
        if (!$this->imagen) {
            self::$errores[] = 'La imagen de la propiedad es obligatoria';
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe ser mayor a 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es Obligatorio";
        }
        if (!$this->wc) {
            self::$errores[] = "El numero de baños es obligatorio";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "El numero de estacionamientos es obligatorio";
        }
        if (!$this->vendedor_id) {
            self::$errores[] = "Elige un vendedor";
        }

        return self::$errores;
    }

}