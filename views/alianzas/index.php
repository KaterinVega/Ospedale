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
    <link rel="stylesheet" href="../../style.css">
    <script src="../../js/main.js"></script>
</head>

<body>
    <div class="hola">
        <h4 class="ali">Alianzas Estrategicas</h4>
    </div>
    <div class="menu">
        <nav class="navegacion">
            <a class="bot" href="../subinicio/index.php">Inicio</a>
        </nav>
    </div>
    <div class="comple">
    <div class="aliicon"><img class="ali"src="../../img/images-removebg-preview.ico" alt="" width="60px"></div>
        <div class="container">


            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a id="item_tab1" class="nav-link active" href="#tercerosA" data-toggle="tab">Terceros Administrativos</a>
                    </li>
                    

                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="tercerosA">

                        <br>
                        <!-- Trigger the modal with a button -->
                        <div class="containerbtn">
                            <div class="btnespe"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-alianzas">Registrar Terceros ADM</button></div>
                            <div class="btnexcel">
                                <form method="post" action="../../excel.php">
                                    <input class="excel" type="submit" name="submitAli" value="Exportar Excel" />
                                </form>
                            </div>
                        </div>


                        <!-- Inicio Ventana Modal -->
                        <div id="ventana-alianzas" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Registrar Terceros Adm.</h4>
                                    </div>

                                    <div class="modal-body">
                                        <form>

                                            <div class="form-group">
                                                <label for="txt_Razon">Razon Social:</label>
                                                <input type="text" class="form-control" id="txt_Razon">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_nit">Nit:</label>
                                                <input type="text" class="form-control" id="txt_nit">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_representante">Representante Legal:</label>
                                                <input type="text" class="form-control" id="txt_representante">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_objecto">Objecto del contrato:</label>
                                                <br>
                                                <textarea name="mensaje" id="txt_objecto" style="width: 194px; height: 82px;"></textarea>

                                            </div>

                                            <div class="form-group">
                                                <label for="txt_inicioConA">Fecha Inicio Contrato:</label>
                                                <input type="text" class="form-control" id="txt_inicioConA">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_finConA">Fecha Finalizacion Contrato:</label>
                                                <input type="text" class="form-control" id="txt_finConA">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_prorroga">Prorroga Automatica?:</label>
                                                <input type="text" class="form-control" id="txt_prorroga">
                                            </div>

                                            <div class="form-group">
                                                <label for="txt_camara">Vigencia Camara de Comercio:</label>
                                                <input type="text" class="form-control" id="txt_camara">
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
                                                <label for="txt_supervisor">Supervisor del contrato:</label>
                                                <input type="text" class="form-control" id="txt_supervisor">
                                            </div>
                                            <div class="form-group">
                                                <label for="txt_estadoA">Estado:</label>
                                                <select id="txt_estadoA" class="form-control">
                                                    <option class="opciones" value="Activo">Activo</option>
                                                    <option class="opciones" value="Inactivo">Inactivo</option>
                                                </select>
                                            </div>

                                            <button id="btn_guardarAL" type="button" class="btn btn-primary"> Aceptar</button>
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
                        <div class="row">
                            <div class="col-md-8">
                                <div class="container">
                                    <table id="tablaAli" class="table table-striped table-bordered dt-responsive tablaAli" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Razon Social</th>
                                                <th>Nit</th>
                                                <th>Inicio Contrato</th>
                                                <th>Fin Contrato</th>
                                                <th>Supervisor Contrato</th>
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
        <div id="ventana-EditarAli" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Terceros Administrativos.</h4>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="txt_EditRazon">Razon Social:</label>
                                <input type="text" class="form-control" id="txt_EditRazon">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editnit">Nit:</label>
                                <input type="text" class="form-control" id="txt_Editnit">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editrepresentante">Representante Legal:</label>
                                <input type="text" class="form-control" id="txt_Editrepresentante">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editobjecto">Objecto del contrato:</label>
                                <br>
                                <textarea name="mensaje" id="txt_Editobjecto" style="width: 194px; height: 82px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="txt_EditinicioConA">Fecha Inicio Contrato:</label>
                                <input type="text" class="form-control" id="txt_EditinicioConA">
                            </div>

                            <div class="form-group">
                                <label for="txt_EditfinConA">Fecha Finalizacion Contrato:</label>
                                <input type="text" class="form-control" id="txt_EditfinConA">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editprorroga">Prorroga Automatica?:</label>
                                <input type="text" class="form-control" id="txt_Editprorroga">
                            </div>

                            <div class="form-group">
                                <label for="txt_Editcamara">Vigencia Camara de Comercio::</label>
                                <input type="text" class="form-control" id="txt_Editcamara">
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
                                <label for="txt_Editsupervisor">Supervisor del contrato:</label>
                                <input type="text" class="form-control" id="txt_Editsupervisor">
                            </div>
                            <div class="form-group">
                                <label for="txt_EditestadoA">Estado:</label>
                                    <select id="txt_EditestadoA" class="form-control">
                                    <option class="opciones" value="Activo">Activo</option>
                                    <option class="opciones" value="Inactivo">Inactivo</option>
                                    </select>
                            </div>

                            <button id="btn_EditarAL" type="button" class="btn btn-primary"> Aceptar</button>
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