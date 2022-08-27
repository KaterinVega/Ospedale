<?php

include_once "conexion.php";

class UsuarioModelo
{

    public static function mdlRegistrarUsuario($documento, $nombre, $apellido, $cargo, $clave)
    {
        $objRespuesta = conexion::conectar()->prepare("INSERT INTO usuarios values(:documento,:nombre,:apellido,:cargo,:contrasena)");
        $objRespuesta->bindParam(":documento", $documento);
        $objRespuesta->bindParam(":nombre", $nombre);
        $objRespuesta->bindParam(":apellido", $apellido);
        $objRespuesta->bindParam(":cargo", $cargo);
        $objRespuesta->bindParam(":contrasena", $clave);
        

        $mensaje = "";
        if ($objRespuesta->execute()) {
            $mensaje = "ok";
        } else {
            $mensaje = "error al registrar datos";
        }
        $objRespuesta = null;

        return $mensaje;
    }

    public static function mdlListarUsuario(){
        $objRespuesta = conexion::conectar()->prepare("SELECT * FROM usuarios");
        $objRespuesta->execute();
        $ListarUsuario = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $ListarUsuario;
    }

    public static function mdlEliminarUsuario($documento){
        $mensaje="";
        $objRespuesta = conexion::conectar()->prepare("DELETE FROM usuarios WHERE documento = :documento");
        $objRespuesta->bindParam(":documento",$documento);

        if($objRespuesta->execute()){
            $mensaje = "ok";
        }else{
            $mensaje = "Error Al Eliminar los datos";
        }
        return $mensaje;
    }
}