<?php 
namespace App;
  
 class Vendedor  extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['nombre', 'apellido', 'telefono'];

    public  $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []){

        
        
        $this->id = $args['id'] ?? null;
        $this->nombre=$args['nombre'] ?? "";
        $this->apellido=$args['apellido'] ?? "";
        $this->telefono=$args['telefono'] ?? "";
       
    }

    public function validar(){
        if(!$this->nombre) {
            self::$errores[] = "Must add a Name";
        }
        if(!$this->apellido) {
            self::$errores[] = "Must add a Last Name";
        }
        if(!$this->telefono) {
            self::$errores[] = "Must add a phone";
        }

        if (!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Format not valid";
             
        }

        return self::$errores; 
    }

 }
