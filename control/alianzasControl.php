<?php


include_once "../modelo/alianzasmodelo.php";

class AlianzasControl{

    public $razon;
    public $nit;
    public $representante;
    public $objecto;
    public $inicioConA;
    public $finConA;
    public $prorro;
    public $camara;
    public $correo;
    public $telefono;
    public $supervisor;
    

    public function ctrRegistrarAli()
    {
        $objRespuesta = AlianzaModelo:: mdlRegistrarAli($this->razon,$this->nit, $this->representante, $this->objecto, $this->inicioConA,$this->finConA,$this->prorro,$this->camara,$this->correo, $this->telefono , $this->supervisor);
        echo json_encode($objRespuesta);
    }

    public function ctrListarAli(){
        $objRespuesta = AlianzaModelo::mdlListarAli();
        echo json_encode($objRespuesta);
    }

    public function ctrEditarAli()
    {
        $objRespuesta = AlianzaModelo::mdlEditarAli($this->razon, $this->nit,$this->representante,$this->objecto,$this->inicioConA,$this->finConA,$this->prorro,$this->camara,$this->correo,$this->telefono,$this->supervisor);

        echo json_encode($objRespuesta);
    }
}

//insertar Alianzas
if (isset($_POST["jsrazon"]) && isset($_POST["jsnit"]) && isset($_POST["jsrepresentante"]) && isset($_POST["jsobjecto"]) && isset($_POST["jsinicioCon"]) && isset($_POST["jsfinCon"])  && isset($_POST["jsprorroga"]) && isset($_POST["jscamara"]) &&  isset($_POST["jscorreo"]) && isset($_POST["jstelefono"]) && isset($_POST["jssupervisor"])) {
    $objUsuario = new AlianzasControl();
    $objUsuario->razon = $_POST["jsrazon"];
    $objUsuario->nit = $_POST["jsnit"];
    $objUsuario->representante = $_POST["jsrepresentante"];
    $objUsuario->objecto = $_POST["jsobjecto"];
    $objUsuario->inicioConA = $_POST["jsinicioCon"];
    $objUsuario->finConA = $_POST["jsfinCon"];
    $objUsuario->prorro = $_POST["jsprorroga"];
    $objUsuario->camara = $_POST["jscamara"];
    $objUsuario->correo = $_POST["jscorreo"];
    $objUsuario->telefono = $_POST["jstelefono"];
    $objUsuario->supervisor = $_POST["jssupervisor"];
    $objUsuario->ctrRegistrarAli();
}

// visualizar Alianzas
if(isset($_POST["cargarDatos"]) == "ok"){
    $objListarAlianzas = new AlianzasControl();
    $objListarAlianzas->ctrListarAli();
}

if (isset($_POST["jsEditrazon"]) && isset($_POST["jsEditNit"]) && isset($_POST["jsEditrepresentante"]) && isset($_POST["jsEditobjecto"]) && isset($_POST["jsEditinicioConA"]) && isset($_POST["jsEditfinCon"]) && isset($_POST["jsEditprorroga"]) && isset($_POST["jsEditcamara"]) && isset($_POST["jsEditcorreo"]) && isset($_POST["jsEditTelefono"]) && isset($_POST["jsEditsupervisor"])) {

    $objEditarUsuario = new AlianzasControl();
    $objEditarUsuario->razon = $_POST["jsEditrazon"];
    $objEditarUsuario->nit = $_POST["jsEditNit"];
    $objEditarUsuario->representante = $_POST["jsEditrepresentante"];
    $objEditarUsuario->objecto = $_POST["jsEditobjecto"];
    $objEditarUsuario->inicioConA = $_POST["jsEditinicioConA"];
    $objEditarUsuario->finConA = $_POST["jsEditfinCon"];
    $objEditarUsuario->prorro = $_POST["jsEditprorroga"];
    $objEditarUsuario->camara = $_POST["jsEditcamara"];
    $objEditarUsuario->correo = $_POST["jsEditcorreo"];
    $objEditarUsuario->telefono = $_POST["jsEditTelefono"];
    $objEditarUsuario->supervisor = $_POST["jsEditsupervisor"];
    $objEditarUsuario->ctrEditarAli();

}
