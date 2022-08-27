<?php
    
    class conexion{
        public static function conectar(){

            $nombreServidor = "localhost";
            $basedatos = "ospedale";
            $usuario = "root";
            $password = "";

            try {
                $objconexion = new PDO('mysql:host='.$nombreServidor.';dbname='.$basedatos.';',$usuario,$password);
                $objconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $objconexion;

            }catch (Exception $th){
                return $th;
            }
        }
    }

?>