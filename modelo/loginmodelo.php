<?php

include_once "conexion.php";

class LoginModelo{
        
    public static function mdlValidarUsuario($documento,$contrasena){

        try {
            $objRespuesta = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE documento = :documento AND contrasena = :contrasena");

            $objRespuesta->bindParam(":documento",$documento);
            $objRespuesta->bindParam(":contrasena",$contrasena);
            
            $mensaje = "";

            $objRespuesta->execute();

            $usuario = $objRespuesta->fetch(PDO::FETCH_ASSOC);

            if (session_status() == PHP_SESSION_NONE){
                session_start();
            }

            $_SESSION["usuario"] = $usuario;

            if($usuario != null){
                $mensaje = "ok";
            }else{
                $mensaje = "Error para Ingresar";
            }

            $objRespuesta = null;
            return $mensaje;
        } catch (PDOException $e){
            return $e;
        }

    }

    
}

?>