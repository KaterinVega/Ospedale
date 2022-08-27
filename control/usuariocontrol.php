<?php
include_once "../modelo/usuariomodelo.php";

class UsuarioControl{

    public $documento;
    public $nombre;
    public $apellido;
    public $cargo;
    public $clave;
    

    public function ctrRegistrarusuario()
    {
        $objRespuesta = UsuarioModelo::mdlRegistrarUsuario($this->documento,$this->nombre, $this->apellido,$this->cargo,$this->clave);
        echo json_encode($objRespuesta);
    }

    public function ctrListarUsuario(){
        $objRespuesta = UsuarioModelo::mdlListarUsuario();
        echo json_encode($objRespuesta);
    }

    public function ctrEliminarUsuario()
    {
        $objRespuesta = UsuarioModelo::mdlEliminarUsuario($this->documento);
        echo json_encode($objRespuesta);
    }
}


//insertar usuario
if (isset($_POST["jsdocumento"]) && isset($_POST["jsnombres"]) && isset($_POST["jsapellidos"]) && isset($_POST["jscargo"]) && isset($_POST["jsclave"])) {
    $objUsuario = new UsuarioControl();
    $objUsuario->documento = $_POST["jsdocumento"];
    $objUsuario->nombre = $_POST["jsnombres"];
    $objUsuario->apellido = $_POST["jsapellidos"];
    $objUsuario->cargo = $_POST["jscargo"];
    $objUsuario->clave = md5($_POST["jsclave"]);
    $objUsuario->ctrRegistrarusuario();
}
//visualizar datos.
if(isset($_POST["cargarDatos"]) == "ok"){
    $objListarUsuario = new UsuarioControl();
    $objListarUsuario->ctrListarUsuario();
}

//eliminar usuarios
if (isset($_POST["idEliminarUsu"])) {
    $objEliminarUsuario = new UsuarioControl();
    $objEliminarUsuario->documento = $_POST["idEliminarUsu"];
    $objEliminarUsuario->ctrEliminarUsuario();
}

?>
