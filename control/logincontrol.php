<?php
require_once "../modelo/loginmodelo.php";

    class LoginControl{
        public $documento;
        public $contrasena;

        public function ctrValidarUsuarios(){

            $objRespuesta = LoginModelo::mdlValidarUsuario($this->documento,$this->contrasena);
            echo json_encode($objRespuesta);
        }


    }

    if(isset($_POST["jsdocumento"]) && isset($_POST["jscontrasena"])){

        $objUsuario = new LoginControl();
        $objUsuario->documento = $_POST["jsdocumento"];
        $objUsuario->contrasena = md5($_POST["jscontrasena"]);

        $objUsuario->ctrValidarUsuarios();
    }

?>