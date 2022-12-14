<?php


include_once "../modelo/especialistamodelo.php";

class EspecialistaControl{

    public $especialidad;
    public $nombres;
    public $documento;
    public $inicio;
    public $fin;
    public $poliza;
    public $correo;
    public $telefono;
    public $estado;
    

    public function ctrRegistrarEspecialista()
    {
        $objRespuesta = EspecialistaModelo::mdlRegistrarEspecialista($this->especialidad,$this->nombres, $this->documento, $this->inicioCon,$this->finCon,$this->poliza,$this->correo, $this->telefono, $this->estado);
        echo json_encode($objRespuesta);
    }

    public function ctrListarEspecialistas(){
        $objRespuesta = EspecialistaModelo::mdlListarEspecialista();
        echo json_encode($objRespuesta);
    }

    public function ctrEditarEspecialista()
    {
        $objRespuesta = EspecialistaModelo::mdlEditarEspecialista($this->especialidad, $this->nombres,$this->documento,$this->inicio,$this->fin,$this->poliza,$this->correo,$this->telefono,$this->estado);

        echo json_encode($objRespuesta);
    }

    public function ctrEliminarEspecialista()
    {
        $objRespuesta = EspecialistaModelo::mdlEliminarEspecialista($this->documento);
        echo json_encode($objRespuesta);
    }

    public function ctrListFiles($dni){
        $objRespuesta = EspecialistaModelo::mdlListFiles($dni);
        echo json_encode($objRespuesta);
    }

    public function ctrUploadFile($dni, $name, $file){
        $objRespuesta = EspecialistaModelo::mdlUploadFile($dni, $name, $file);
        echo json_encode($objRespuesta);
    }

    public function ctrDeleteFile($route) {
        $objRespuesta = EspecialistaModelo::mdlDeleteFile($route);
        echo json_encode($objRespuesta);
    }
}


//insertar especialistas
if (isset($_POST["jsespecialidad"]) && isset($_POST["jsnombres"]) && isset($_POST["jsdocumento"]) && isset($_POST["jsinicioCon"]) && isset($_POST["jsfinCon"]) && isset($_POST["jspoliza"]) &&  isset($_POST["jscorreo"]) && isset($_POST["jstelefono"]) && isset($_POST["jsestado"])) {
    $objUsuario = new EspecialistaControl();
    $objUsuario->especialidad = $_POST["jsespecialidad"];
    $objUsuario->nombres = $_POST["jsnombres"];
    $objUsuario->documento = $_POST["jsdocumento"];
    $objUsuario->inicioCon = $_POST["jsinicioCon"];
    $objUsuario->finCon = $_POST["jsfinCon"];
    $objUsuario->poliza = $_POST["jspoliza"];
    $objUsuario->correo = $_POST["jscorreo"];
    $objUsuario->telefono = $_POST["jstelefono"];
    $objUsuario->estado = $_POST["jsestado"];
    $objUsuario->ctrRegistrarEspecialista();
}
// visualizar especialistas
if(isset($_POST["cargarDatos"]) == "ok"){
    $objListarEspecialista = new EspecialistaControl();
    $objListarEspecialista->ctrListarEspecialistas();
}
//editar especialistas
if (isset($_POST["jsEditEspecialidad"]) && isset($_POST["jsEditNombres"]) && isset($_POST["jsEditDocumento"]) && isset($_POST["jsEditinicio"]) && isset($_POST["jsEditfin"]) && isset($_POST["jsEditpoliza"]) && isset($_POST["jsEditcorreo"]) && isset($_POST["jsEditTelefono"]) && isset($_POST["jsEditestado"])) {

    $objEditarUsuario = new EspecialistaControl();
    $objEditarUsuario->especialidad = $_POST["jsEditEspecialidad"];
    $objEditarUsuario->nombres = $_POST["jsEditNombres"];
    $objEditarUsuario->documento = $_POST["jsEditDocumento"];
    $objEditarUsuario->inicio= $_POST["jsEditinicio"];
    $objEditarUsuario->fin = $_POST["jsEditfin"];
    $objEditarUsuario->poliza = $_POST["jsEditpoliza"];
    $objEditarUsuario->correo = $_POST["jsEditcorreo"];
    $objEditarUsuario->telefono = $_POST["jsEditTelefono"];
    $objEditarUsuario->estado = $_POST["jsEditestado"];
    $objEditarUsuario->ctrEditarEspecialista();
}

//eliminar Especialistas
if (isset($_POST["idEliminarEsp"])) {
    $objEliminarUsuario = new EspecialistaControl ();
    $objEliminarUsuario->documento = $_POST["idEliminarEsp"];
    $objEliminarUsuario->ctrEliminarEspecialista();
}

// Subir documentos
if (isset($_POST["subirArchivo"]) == "ok"){
    $dni = $_POST["dni"];
    $filename = $_FILES["fileUser"]["name"];
    $obj = new EspecialistaControl();
    $obj->ctrUploadFile($dni, $filename, $_FILES["fileUser"]["tmp_name"]);
}

// Cargar documentos
if (isset($_POST["cargarDocumentos"]) == "ok"){
    $dni = $_POST["dni"];
    $obj = new EspecialistaControl();
    $obj->ctrListFiles($dni);
}

if (isset($_POST["eliminarDocumento"]) == "ok"){
    $route = $_POST["route"];
    $obj = new EspecialistaControl();
    $obj->ctrDeleteFile($route);
}

?>