<?php

include_once "modulos/cabeza.php";

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$usuario = $_SESSION["usuario"];

?>
        <div class="dospartes">
            <div class="fonoscu">
                <header>
                    <h3 class="menuss">Menu</h3>
                    
                </header>
                <div class="arriba">
                    <div class="form-group botoness">
                    <a href="especialistas.php" class="ov-btn-slide-right">TERCEROS ASISTENCIALES</a>
                    </div>

                    <div class="form-group botoness">
                    <a href="alianzas.php" class="ov-btn-slide-right">TERCEROS ADMINISTRATIVOS</a>
                    </div>
                    
                    <?php
                    
                    if ($usuario["cargo"] == "Administrador"){

                    ?>
                    <div class="form-group botoness">
                    <a href="usuarios.php" class="ov-btn-slide-right">USUARIOS</a>
                    </div>
                    <?php
                    
                    }

                    ?>
                </div>
                <div class="abajo">
                    <div class="salir">
                        <div class="bots">
                        <a class="ov-btn-slide-right-salir"href="index.php">SALIR</a>
                        </div>
                        
                    </div>
                </div>
                
            </div>

            <div class="fondosub">
                
            </div>
        </div>
