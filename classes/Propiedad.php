<?php 
namespace App;

class Propiedad extends ActiveRecord {
        protected static $tabla = 'propiedades';
        protected static $columnasDB = ['titulo','precio','imagen','descripcion','habitaciones', 'wc', 
        'estacionamiento', 'creado','vendedorId'];
         
        public $id;
        public $titulo;
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamiento;
        public $creado;
        public $vendedorId;
        
        public function __construct($args = []){

        
        
            $this->id = $args['id'] ?? null;
            $this->titulo = $args['titulo'] ?? '';
            $this->precio = $args['precio'] ?? '';;
            $this->imagen = $args['imagen'] ?? '';;
            $this->descripcion = $args['descripcion'] ?? '';;
            $this->habitaciones = $args['habitaciones'] ?? '';;
            $this->wc = $args['wc'] ?? '';;
            $this->estacionamiento = $args['estacionamiento'] ?? '';;
            $this->creado = date('Y/m/d');
            $this->vendedorId = $args['vendedorId'] ?? 1;;
           
        }

        public function validar(){
        
            if(!$this->titulo) {
                self::$errores[] = "You must add a title";
            }
    
            if(!$this->precio) {
                self::$errores[] = 'Price is Obligatory';
            }
    
            if( strlen( $this->descripcion ) < 50 ) {
                self::$errores[] = 'The description is mandatory and must be at least 50 characters long.';
            }
    
            if(!$this->habitaciones) {
                self::$errores[] = 'Number of rooms is required';
            }
            
            if(!$this->wc) {
                self::$errores[] = 'Number of bathrooms is mandatory';
            }
    
            if(!$this->estacionamiento) {
                self::$errores[] = 'The number of parking spaces is mandatory';
            }
            
            if(!$this->vendedorId) {
                self::$errores[] = 'Choose a Seller';
            }
    
            if(!$this->imagen ) {
                self::$errores[] = 'You must send an Image';
            } 
            
    
            return self::$errores;
        }
    }
 

   
    
