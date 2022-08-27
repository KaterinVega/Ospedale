<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./assets/components/head.php"; ?>
    <link rel="stylesheet" href="./views/home/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Ospedale | Acceso</title>
</head>
<body>
<div class="fondolog">
    <div class="panta">
        <div class="izq"></div>
        <div class="dere">
            <section class="ftco-section">
                <div class="container">
                    <div>
                        <div class="col-md-7 col-lg-5">
                            <div class="wrap">
                                <div class="cuadro p-md-5">
                                    <div class="gen"><img src="assets/img../usuario.png" width="50px" alt=""></div>
                                    <h3 class="text-center">LOGIN</h3>

                                    <form>
                                        <div class="form-groups">
                                            <label class="form-control-placeholder" for="txt_documento">Documento</label>
                                            <input id="txt_documento" type="number" class="form-control" required name="documento">

                                        </div>
                                        <div class="form-groups">
                                            <label class="form-control-placeholder" for="txt_contraseña">Contraseña</label>
                                            <input id="txt_contrasena" type="password" class="form-control" required name="clave">
                                        </div>
                                        <br>
                                        <div class="form-groups">
                                            <button id="btn_login" type="button" class="form-control btn botonlo">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>