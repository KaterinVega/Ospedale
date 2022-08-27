<?php

include_once "modulos/cabeza.php";
include_once "modelo/conexion.php";

$documento = $_GET["documento"];

$objRespuesta = conexion::conectar()->prepare("SELECT * FROM especialistas WHERE documento = :documento");
$objRespuesta->bindParam(":documento",$documento);
$objRespuesta->execute();
$usuario = $objRespuesta->fetch();

?>

<div class="hola">
  <h4 class="ali">Alianzas Estrategicas</h4>
    </div>
        <div class="menu">
        <nav class="navegacion">
        <a class="bot"href="especialistas.php">volver</a>
        </nav>
    </div>

<div class="conjunto">

    <div>
    Especialidad:
    <div class="datos"><?php echo $usuario['especialidad']  ?></div>
    <br>
    Nombres:
    <div class="datos"><?php echo $usuario['nombres'] ?></div>
    <br>
    Documento:
    <div class="datos"><?php echo $usuario['documento'] ?></div>
    <br>
    Fecha Inicio Contrato:
    <div class="datos"><?php echo $usuario['fecha_inicio'] ?></div>
    <br>
    Fecha Fin Contrato:
    <div class="datos"><?php echo $usuario['fecha_fin'] ?></div>
    <br>
    Vigencia Poliza:
    <div class="datos"><?php echo $usuario['vigencia_poliza'] ?></div>
    <br>
    Correo:
    <div class="datos"><?php echo $usuario['correo'] ?></div>
    <br>
    Telefono:
    <div class="datos"><?php echo $usuario['telefono'] ?></div>
    <br>
    </div>
    
    <div class="foto">

    </div>

</div>