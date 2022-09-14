<?php

include_once "conexion.php";
include_once "../libs/Folder.php";

class AlianzaModelo{
    public static function mdlRegistrarAli($razon, $nit, $representante, $objecto, $inicioConA, $finConA,$prorro, $camara, $correo, $telefono, $supervisor)
    {
        $objRespuesta = conexion::conectar()->prepare("INSERT INTO alianzas values(:razon,:nit,:representante,:objecto ,:inicioconA,:finconA, :prorroga, :camara,:correo,:telefono, :supervisor)");
        $objRespuesta->bindParam(":razon", $razon);
        $objRespuesta->bindParam(":nit", $nit);
        $objRespuesta->bindParam(":representante", $representante);
        $objRespuesta->bindParam(":objecto", $objecto);
        $objRespuesta->bindParam(":inicioconA", $inicioConA);
        $objRespuesta->bindParam(":finconA", $finConA);
        $objRespuesta->bindParam(":prorroga", $prorro);
        $objRespuesta->bindParam(":camara", $camara);
        $objRespuesta->bindParam(":correo", $correo);
        $objRespuesta->bindParam(":telefono", $telefono);
        $objRespuesta->bindParam(":supervisor", $supervisor);

        $mensaje = "";
        if ($objRespuesta->execute()) {
            $mensaje = "ok";
        } else {
            $mensaje = "error al registrar datos";
        }
        $objRespuesta = null;

        return $mensaje;
    }

    public static function mdlListarAli(){
        $objRespuesta = conexion::conectar()->prepare("SELECT * FROM alianzas");
        $objRespuesta->execute();
        $ListarAlianzas = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $ListarAlianzas;
    }

    public static function mdlEditarAli($razon,$nit,$representante,$objecto,$inicioConA,$finConA,$prorro,$camara,$correo,$telefono,$supervisor,$estadoA){

        $objRespuesta = conexion::conectar()->prepare("UPDATE alianzas SET razon_social= :razon, nit=:nit, representante=:representante, objecto=:objecto, inicioConA=:iniciocon,finConA=:fincon,prorroga=:prorroga,camara=:camara,correo=:correo, telefono=:telefono, supervisor=:supervisor estadoA=:estadoA WHERE nit=:nit");

        $objRespuesta->bindParam(":razon",$razon);
        $objRespuesta->bindParam(":nit",$nit);
        $objRespuesta->bindParam(":representante",$representante);
        $objRespuesta->bindParam(":objecto",$objecto);
        $objRespuesta->bindParam(":iniciocon",$inicioConA);
        $objRespuesta->bindParam(":fincon",$finConA);
        $objRespuesta->bindParam(":prorroga",$prorro);
        $objRespuesta->bindParam(":camara",$camara);
        $objRespuesta->bindParam(":correo",$correo);
        $objRespuesta->bindParam(":telefono",$telefono);
        $objRespuesta->bindParam(":supervisor",$supervisor);
        $objRespuesta->bindParam(":estadoA",$estadoA);

        $mensaje = "";
        if ($objRespuesta->execute()){
            $mensaje = "ok";
        }else{
            $mensaje = "error al registrar datos";
        }
        $objRespuesta = null;
        
        return $mensaje;
    }
    public static function mdlEliminarAli($nit){
        $mensaje="";
        $objRespuesta = conexion::conectar()->prepare("DELETE FROM alianzas WHERE nit = :nit");
        $objRespuesta->bindParam(":nit",$nit);

        if($objRespuesta->execute()){
            $mensaje = "ok";
        }else{
            $mensaje = "Error Al Eliminar los datos";
        }
        return $mensaje;
    }
    public static function mdlListFilesA($dni){
        $handler = new Folder();
        $files = $handler->files($dni);
        $response = [];

        foreach ($files as $file) {
            array_push($response, $file);
        }

        return $response;
    }
    public static function mdlUploadFileA($dni, $filename, $file){
        $handler = new Folder();
        $route = $handler->create($dni);
        
        if (move_uploaded_file($file, $route . "/" . $filename)){
            return "ok";
        } else {
            return "error";
        }
    }
}