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
    <link rel="shortcut icon" href="../../img/images-removebg-preview.ico">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../../style.css">
    <script src="../../js/main.js"></script>
</head>

<body>
    <div class="hola">
        <h4 class="ali">Alianzas Estrategicas</h4>
    </div>
    <div class="menu">
        <nav class="navegacion">
            <a class="bot" href="../subinicio/index.php">Volver</a>
        </nav>


    </div>
    <div class="comple">
    <div class="aliicon"><img class="ali"src="../../img/images-removebg-preview.ico" alt="" width="60px"></div>
        <div class="container">
        
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a id="item_tab1" class="nav-link active" href="#terceros" data-toggle="tab">Terceros Asistenciales</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="terceros">

                        <br>
                        <!-- Trigger the modal with a button -->
                        <div class="containerbtn">
                            <div class="btnespe"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-especialistas">Registrar Especialista</button></div>
                            <div class="btnexcel">
                                <form method="post" action="../../excel.php">
                                    <input class="excel" type="submit" name="submit" value="Exportar Excel" />
                                </form>
                            </div>

                        </div>

                        <!-- Inicio Ventana Modal -->
                        <div id="ventana-especialistas" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Registrar Especialistas.</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="txt_especialidad">Especialidad:</label>
                                                <input type="text" class="form-control" id="txt_especialidad">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_nombres">Nombres y Apellidos:</label>
                                                <input type="text" class="form-control" id="txt_nombres">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_documento">Documento:</label>
                                                <input type="text" class="form-control" id="txt_documento">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_inicioCon">Fecha Inicio Contrato:</label>
                                                <input type="text" class="form-control" id="txt_inicioCon">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_finCon">Fecha Finalizacion Contrato:</label>
                                                <input type="text" class="form-control" id="txt_finCon">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_poliza">Vigencia Poliza:</label>
                                                <input type="text" class="form-control" id="txt_poliza">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_correo">Correo:</label>
                                                <input type="email" class="form-control" id="txt_correo">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_telefono">Telefono:</label>
                                                <input type="number" class="form-control" id="txt_telefono">
                                            </div>
                                            <div class="form-group">
                                                <label for="txt_estado">Estado:</label>
                                                <select id="txt_estado" class="form-control">
                                                    <option class="opciones" value="Activo">Activo</option>
                                                    <option class="opciones" value="inactivo">Inactivo</option>
                                                </select>
                                            </div>

                                            <button id="btn_guardarE" type="button" class="btn btn-primary"> Aceptar</button>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin ventana Modal -->


                        <!-- Inicio tablade datos -->
                        <br><br>
                        <div class="rows">
                            <div class="col-md-8">
                                <div class="container">
                                    <table id="tablaEspe" class="table table-striped table-bordered dt-responsive tablaEspe" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Especialidad</th>
                                                <th>Nombres</th>
                                                <th>documento</th>
                                                <th>Email</th>
                                                <th>telefono</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>


            </div>

        </div>

        <!-- Inicio Ventana Modal -->
        <div id="ventana-EditarUsuarios" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Especialista.</h4>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="txt_Editespecialidad">Especialidad:</label>
                                <input type="text" class="form-control" id="txt_Editespecialidad">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editnombres">Nombres y Apellidos:</label>
                                <input type="text" class="form-control" id="txt_Editnombres">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editdocumento">Documento:</label>
                                <input type="text" class="form-control" id="txt_Editdocumento">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editinicio">Fecha Inicio Contrato:</label>
                                <input type="text" class="form-control" id="txt_Editinicio">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editfin">Fecha Finalizacion Contrato:</label>
                                <input type="text" class="form-control" id="txt_Editfin">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editpoliza">Vigencia Poliza:</label>
                                <input type="text" class="form-control" id="txt_Editpoliza">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editcorreo">Correo:</label>
                                <input type="email" class="form-control" id="txt_Editcorreo">
                            </div>

                            <div class="form-group">
                                <label for="txt_Edittelefono">Telefono:</label>
                                <input type="number" class="form-control" id="txt_Edittelefono">
                            </div>
                            <div class="form-group">
                                <label for="txt_Editestado">Estado:</label>
                                    <select id="txt_Editestado" class="form-control">
                                    <option class="opciones" value="Activo">Activo</option>
                                    <option class="opciones" value="Inactivo">Inactivo</option>
                                    </select>
                            </div>


                            <button id="btn_editarE" type="button" class="btn btn-primary"> Aceptar</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        const cargo = '<?php echo $usuario["cargo"]; ?>';
        const dni = null;
    </script>
</body>

</html>