<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "modulos/cabeza.php"; ?>
  <link rel="stylesheet" href="./style.css">
  <script src="./js/main.js"></script>
</head>


<?php

include_once "modelo/conexion.php";

$documento = $_GET["documento"];

$objRespuesta = conexion::conectar()->prepare("SELECT * FROM especialistas WHERE documento = :documento");
$objRespuesta->bindParam(":documento", $documento);
$objRespuesta->execute();
$usuario = $objRespuesta->fetch();

?>

<div class="hola">
  <h4 class="ali">Alianzas Estrategicas</h4>
</div>
<div class="menu">
  <nav class="navegacion">
    <a class="bot" href="views/especialistas/index.php">volver</a>
  </nav>
</div>


<div class="conjunto2">
  <div class="cont1">
    Especialidad:
    <div class="datos"><?php echo $usuario['especialidad']  ?></div>
    <br>
    Nombres:
    <div class="datos"><?php echo $usuario['nombres'] ?></div>
    <br>
    Documento:
    <div class="datos"><?php echo $usuario['documento'] ?></div>
    <br>
    Telefono:
    <div class="datos"><?php echo $usuario['telefono'] ?></div>
    <br>

    <br>

    <div>
      <h4 class="docucontra">DOCUMENTOS CONTRATUALES</h4>
      <br>
      <br>
      <table class="table tabladocu" id="tabladocu">
        <thead>
          <tr>
            <th>#</th>
            <th>Lista de Documentos:</th>
            <th></th>
          </tr>
        </thead>
        <tr>
          <td></td>
        </tr>
      </table>
      <br>
      <form method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="txt_imagen">Documentos:</label>
          <input type="file" class="form-control" id="fileUser">
        </div>


        <button type="button" id="btn-subirArchivos" data-dni="<?php echo $documento; ?>" class="btn btnsubi">Subir Archivos</button>

      </form>
    </div>
  </div>
  <div class="cont2">
    <div class="aliicon"><img class="ali" src="img/images-removebg-preview.ico" alt="" width="60px"></div>
    Fecha Inicio Contrato:
    <div class="datos"><?php echo $usuario['iniciocontrato'] ?></div>
    <br>
    Fecha Fin Contrato:
    <div class="datos"><?php echo $usuario['fincontrato'] ?></div>
    <br>
    Vigencia Poliza:
    <div class="datos"><?php echo $usuario['poliza'] ?></div>
    <br>
    Correo:
    <div class="datos"><?php echo $usuario['correo'] ?></div>
    <br>

  </div>

</div>

</div>


<script>
  const cargo = null;
  const dni = '<?php echo $documento; ?>';
</script>



</div>