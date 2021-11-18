<?php

namespace Model;

class ActiveRecord{

    //BD
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla='';

    //*Errores
    protected static $errores = [];

    
    //*Definicion de la conexion a la DB
    public static function setDB($database){
        self::$db = $database;
    }
    
    

    public function guardar(){
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear(){

        //*Sanitizar los datos
        $atributos = $this->sanitizar();


        $query = "INSERT INTO ". static::$tabla." (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?mensaje=1');
        }
    }

    public function actualizar(){
        //*Sanitizar los datos
        $atributos = $this->sanitizar();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}= '{$value}'";
        }
        $query = " UPDATE ". static::$tabla  ." SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id= '" . self::$db->escape_string($this->id) . " '";
        $query .= "LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?mensaje=2');
        }
    }

    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla  . " WHERE id =" . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarimg();
            header('location: /admin?mensaje=3');
        }
    }

    public  function atributos(){
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizar(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //*Validacion

    public static function getErrores(){

        return static::$errores;
    }
    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    //****-------------subida de archivos Propiedad 
    public function setImg($imagen){
        //*eliminacion de una imagen previa
        if (!is_null($this->id)) {
            $this->borrarimg();
        }
        //*Asignacion del atributo
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borrarimg(){
        $exist = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($exist) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
   

    public static function todes(){
        $query = "SELECT * FROM ".static::$tabla;
        $resultado = self::consulta($query);

        return $resultado;
    }

    //**Obtiene  solo algunos anuncios*/
    public static function getT($cantidad){
        $query = "SELECT * FROM " . static::$tabla. " LIMIT " . $cantidad;
        
        $resultado = self::consulta($query);

        return $resultado;
    }

    //buscar propiedad por el id
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla  . " WHERE id=${id}";
        $resultado = self::consulta($query);

        return array_shift($resultado);
    }

    public static function consulta($query){
        //*consultar la bd
        $resultado = self::$db->query($query);

        //*Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearobj($registro);
        }

        //*Liberar memoria
        $resultado->free();

        //*Retornar los resultados
        return $array;
    }

    protected static function crearobj($registro){
        $obj = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    //*sincronizacion de los cambios por el usuario
    public function sincronizar($args = []){
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }  
}
