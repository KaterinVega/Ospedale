<?php

include_once "conexion.php";
include_once "../libs/Folder.php";

class EspecialistaModelo
{

    public static function mdlRegistrarEspecialista($especialidad, $nombres, $documento, $inicioCon, $finCon, $poliza, $correo, $telefono, $estado)
    {
        $objRespuesta = conexion::conectar()->prepare("INSERT INTO especialistas values(:especialidad,:nombres,:documento,:fecha_inicio,:fecha_fin,:vigencia_poliza,:correo,:telefono,:estado)");
        $objRespuesta->bindParam(":especialidad", $especialidad);
        $objRespuesta->bindParam(":nombres", $nombres);
        $objRespuesta->bindParam(":documento", $documento);
        $objRespuesta->bindParam(":fecha_inicio", $inicioCon);
        $objRespuesta->bindParam(":fecha_fin", $finCon);
        $objRespuesta->bindParam(":vigencia_poliza", $poliza);
        $objRespuesta->bindParam(":correo", $correo);
        $objRespuesta->bindParam(":telefono", $telefono);
        $objRespuesta->bindParam(":estado", $estado);
        

        $mensaje = "";
        if ($objRespuesta->execute()) {
            $mensaje = "ok";

            $folder = new Folder();
            $folder->create($documento);
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

    public static function mdlEditarEspecialista($especialidad,$nombres,$documento,$inicio,$fin,$poliza,$correo,$telefono,$estado){

        $objRespuesta = conexion::conectar()->prepare("UPDATE especialistas SET especialidad= :especialidad, nombres=:nombres, documento=:documento, inicio=:inicio,fin=:fin,poliza=:poliza,correo=:correo, telefono=:telefono, estado=:estado WHERE documento=:documento");

        $objRespuesta->bindParam(":especialidad",$especialidad);
        $objRespuesta->bindParam(":nombres",$nombres);
        $objRespuesta->bindParam(":documento",$documento);
        $objRespuesta->bindParam(":inicio",$inicio);
        $objRespuesta->bindParam(":fin",$fin);
        $objRespuesta->bindParam(":poliza",$poliza);
        $objRespuesta->bindParam(":correo",$correo);
        $objRespuesta->bindParam(":telefono",$telefono);
        $objRespuesta->bindParam(":estado",$estado);

        $mensaje = "";
        if ($objRespuesta->execute()){
            $mensaje = "ok";
        }else{
            $mensaje = "error al registrar datos";
        }
        $objRespuesta = null;
        
        return $mensaje;
    }

    public static function mdlEliminarEspecialista($documento){
        $mensaje="";
        $objRespuesta = conexion::conectar()->prepare("DELETE FROM especialistas WHERE documento = :documento");
        $objRespuesta->bindParam(":documento",$documento);

        if($objRespuesta->execute()){
            $mensaje = "ok";
        }else{
            $mensaje = "Error Al Eliminar los datos";
        }
        return $mensaje;
    }

    public static function mdlListFiles($dni){
        $handler = new Folder();
        $files = $handler->files($dni);
        $response = [];

        foreach ($files as $file) {
            array_push($response, $file);
        }

        return $response;
    }

    public static function mdlUploadFile($dni, $filename, $file){
        $handler = new Folder();
        $route = $handler->create($dni);
        
        if (move_uploaded_file($file, $route . "/" . $filename)){
            return "ok";
        }

        return "error";
    }

    public static function mdlDeleteFile($route) {
        $handler = new Folder();
        
        if ($handler->delete($route)){
            return "ok";
        }

        return "error";
    }
}
