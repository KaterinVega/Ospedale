<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../../modulos/cabeza.php"; ?>
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
        <div class="container">

            <br>
            <!-- Trigger the modal with a button -->
            <div class="container">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-usuarios">Registrar Usuarios</button>
            </div>


            <!-- Inicio Ventana Modal -->
            <div id="ventana-usuarios" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Registrar Usuarios.</h4>
                        </div>

                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="txt_documento">Documento:</label>
                                    <input type="text" class="form-control" id="txt_documento">
                                </div>

                                <div class="form-group">
                                    <label for="txt_nombres">Nombres:</label>
                                    <input type="text" class="form-control" id="txt_nombres">
                                </div>

                                <div class="form-group">
                                    <label for="txt_Apellidos">Apellidos:</label>
                                    <input type="text" class="form-control" id="txt_Apellidos">
                                </div>

                                <div class="form-group">
                                    <label for="txt_cargo">Rol:</label>
                                    <select id="txt_cargo" class="form-control">
                                        <option class="opciones" value="Administrador">Administrador</option>
                                        <option class="opciones" value="visua">Visualizador</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="txt_clave">contraseña:</label>
                                    <input type="text" class="form-control" id="txt_clave">
                                </div>

                                <button id="btn_guardarUs" type="button" class="btn btn-primary"> Aceptar</button>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin ventana Modal -->

            <br>
            <br>

            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <table id="tablaUsu" class="table table-striped table-bordered dt-responsive tablaUsu" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Documento</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Rol</th>
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
</body>

</html>