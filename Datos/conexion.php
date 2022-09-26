<?php

  class baseDatos{
    private static $conexion=NULL;
    private function __construct (){}

    /**
   * ATTR_ERRMODE reporta errores
   * ERRMODE_EXCEPTION lanza excepciones
   * PDOException notifica que error está pasando  
   */
    public static function conectar(){
      try{
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        self::$conexion= new PDO('mysql:host=localhost;dbname=laboratorio','root','',$pdo_options);
        return self::$conexion;
      }catch(PDOException $e){
        die($e->getMessage());
      }
    }   
  }