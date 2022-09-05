<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "modulos/cabeza.php"; ?>
    <link rel="stylesheet" href="./style.css">
    <script src="./js/main.js"></script>
</head>

<?php

include_once "modelo/conexion.php";

$nit = $_GET["nit"];

$objRespuesta = conexion::conectar()->prepare("SELECT * FROM alianzas WHERE nit = :nit");
$objRespuesta->bindParam(":nit",$nit);
$objRespuesta->execute();
$usuario = $objRespuesta->fetch();

?>

<div class="hola">
    </div>
        <div class="menu">
        <nav class="navegacion">
        <a class="bot"href="./views/alianzas/index.php">volver</a>
        </nav>
</div>
<div class="conjunto2">
    <div class="cont1">
    RAZON SOCIAL:
    <div class="datos" ><?php echo $usuario['razon_social'] ?></div>
    <br>
    NIT:
    <div class="datos"><?php echo $usuario['nit'] ?></div>
    <br>
    REPRESENTANTE:
    <div class="datos" ><?php echo $usuario['representante'] ?></div>
    <br>
    OBJECTO DEL CONTRATO:
    <div class="dato"><?php echo $usuario['objecto'] ?></div>
    <br>
    </div>
    
    <div class="cont2">
    <div class="aliicon"><img class="ali"src="img/images-removebg-preview.ico" alt="" width="60px"></div>
    FECHA INICIO CONTRATO:
    <div class="datos"><?php echo $usuario['inicioConA'] ?></div>
    <br>
    FECHA FIN DEL CONTRATO:
    <div class="datos"><?php echo $usuario['finConA'] ?></div>
    <br>
    Prorroga Automatica:
    <div class="datos"><?php echo $usuario['prorroga'] ?></div>
    <br>
    VIGENCIA CAMARA DE COMERCIO:
    <div class="datos"><?php echo $usuario['camara'] ?></div>
    <br>
    CORREO:
    <div class="datos"><?php echo $usuario['correo'] ?></div>
    <br>
    TELEFONO:
    <div class="datos"><?php echo $usuario['telefono'] ?></div>
    <br>

    </div>

</div>