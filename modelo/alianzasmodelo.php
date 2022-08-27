<?php

include_once "conexion.php";

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

    public static function mdlEditarAli($razon,$nit,$representante,$objecto,$inicioCon,$finCon,$prorro,$camara,$correo,$telefono,$supervisor){

        $objRespuesta = conexion::conectar()->prepare("UPDATE alianzas SET razon_social= :razon, nit=:nit, representante=:representante, objecto=:objecto, inicioConA=:iniciocon,finConA=:fincon,prorroga=:prorroga,camara=:camara,correo=:correo, telefono=:telefono, supervisor=:supervisor WHERE nit=:nit");

        $objRespuesta->bindParam(":razon",$razon);
        $objRespuesta->bindParam(":nit",$nit);
        $objRespuesta->bindParam(":representante",$representante);
        $objRespuesta->bindParam(":objecto",$objecto);
        $objRespuesta->bindParam(":iniciocon",$inicioCon);
        $objRespuesta->bindParam(":fincon",$finCon);
        $objRespuesta->bindParam(":prorroga",$prorro);
        $objRespuesta->bindParam(":camara",$camara);
        $objRespuesta->bindParam(":correo",$correo);
        $objRespuesta->bindParam(":telefono",$telefono);
        $objRespuesta->bindParam(":supervisor",$supervisor);

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