<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$usuario = $_SESSION["usuario"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../../modulos/cabeza.php"; ?>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Ospedale | Acceso</title>
</head>

<body>
    <div class="dospartes">
        <div class="fonoscu">
            <header>
                <h3 class="menuss">Menu</h3>

            </header>
            <div class="arriba">
                <div class="form-group botoness">
                    <a href="../especialistas/index.php" class="ov-btn-slide-right">TERCEROS ASISTENCIALES</a>
                </div>

                <div class="form-group botoness">
                    <a href="../alianzas/index.php" class="ov-btn-slide-right">TERCEROS ADMINISTRATIVOS</a>
                </div>
                <?php
                if ($usuario["cargo"] == "Administrador") {
                ?>

                    <div class="form-group botoness">
                        <a href="../usuarios/index.php" class="ov-btn-slide-right">USUARIOS</a>
                    </div>
                <?php

                }

                ?>

            </div>
            <div class="abajo">
                <div class="salir">
                    <div class="bots">
                        <a class="ov-btn-slide-right-salir" href="../../index.php">SALIR</a>
                    </div>

                </div>
            </div>

        </div>

        <div class="fondosub">

        </div>

        <script>
            const cargo = '<?php echo $usuario["cargo"]; ?>';
        </script>
    </div>
</body>