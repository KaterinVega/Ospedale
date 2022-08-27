<?php

include_once "conexion.php";

class EspecialistaModelo
{

    public static function mdlRegistrarEspecialista($especialidad, $nombres, $documento, $inicioCon, $finCon, $poliza, $correo, $telefono)
    {
        $objRespuesta = conexion::conectar()->prepare("INSERT INTO especialistas values(:especialidad,:nombres,:documento,:fecha_inicio,:fecha_fin,:vigencia_poliza,:correo,:telefono)");
        $objRespuesta->bindParam(":especialidad", $especialidad);
        $objRespuesta->bindParam(":nombres", $nombres);
        $objRespuesta->bindParam(":documento", $documento);
        $objRespuesta->bindParam(":fecha_inicio", $inicioCon);
        $objRespuesta->bindParam(":fecha_fin", $finCon);
        $objRespuesta->bindParam(":vigencia_poliza", $poliza);
        $objRespuesta->bindParam(":correo", $correo);
        $objRespuesta->bindParam(":telefono", $telefono);
        

        $mensaje = "";
        if ($objRespuesta->execute()) {
            $mensaje = "ok";
        } else {
            $mensaje = "error al registrar datos";
        }
        $objRespuesta = null;

        return $mensaje;
    }

    public static function mdlListarEspecialista(){
        $objRespuesta = conexion::conectar()->prepare("SELECT * FROM especialistas");
        $objRespuesta->execute();
        $ListarEspecialista = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $ListarEspecialista;
    }

    public static function mdlEditarEspecialista($especialidad,$nombres,$documento,$inicioCon,$finCon,$poliza,$correo,$telefono){

        $objRespuesta = conexion::conectar()->prepare("UPDATE especialistas SET especialidad= :especialidad, nombres=:nombres, documento=:documento, fecha_inicio=:iniciocon,fecha_fin=:fincon,vigencia_poliza=:poliza,correo=:correo, telefono=:telefono WHERE documento=:documento");

        $objRespuesta->bindParam(":especialidad",$especialidad);
        $objRespuesta->bindParam(":nombres",$nombres);
        $objRespuesta->bindParam(":documento",$documento);
        $objRespuesta->bindParam(":iniciocon",$inicioCon);
        $objRespuesta->bindParam(":fincon",$finCon);
        $objRespuesta->bindParam(":poliza",$poliza);
        $objRespuesta->bindParam(":correo",$correo);
        $objRespuesta->bindParam(":telefono",$telefono);

        $mensaje = "";
        if ($objRespuesta->execute()){
            $mensaje = "ok";
        }else{
            $mensaje = "error al registrar datos";
        }
        $objRespuesta = null;
        
        return $mensaje;
    }
}