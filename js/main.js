$(document).ready(function () {
  cargarEspe();
  cargarUsuario();
  cargarAli();
  cargarArchi();

  // funcion login
  $("#btn_login").click(function () {
    var documento = $("#txt_documento").val();
    var contrasena = $("#txt_contrasena").val();

    var objData = new FormData();
    objData.append("jsdocumento", documento);
    objData.append("jscontrasena", contrasena);

    $.ajax({
      url: "control/logincontrol.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      if (respuesta == "ok") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "BIENVENIDO",
          showConfirmButton: false,
          timer: 2500,
        });

        setTimeout(() => {
          window.location.replace("./views/subinicio/index.php");
        }, 2500);
      } else {
        Swal.fire({
          position: "top-end",
          icon: "warning",
          title: "Contraseña Incorrecta",
          showConfirmButton: false,
          timer: 2500,
        });
      }
    });
  });

  // funcion encargada de insertar usuarios
  $("#btn_guardarUs").click(function () {
    var documento = $("#txt_documento").val();
    var nombre = $("#txt_nombres").val();
    var apellido = $("#txt_Apellidos").val();
    var cargo = $("#txt_cargo").val();
    var clave = $("#txt_clave").val();

    var objData = new FormData();
    objData.append("jsdocumento", documento);
    objData.append("jsnombres", nombre);
    objData.append("jsapellidos", apellido);
    objData.append("jscargo", cargo);
    objData.append("jsclave", clave);
    $.ajax({
      url: "http://localhost/ospedale/control/usuariocontrol.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      if (respuesta == "ok") {
        $("#txt_documento").val("");
        $("#txt_nombres").val("");
        $("#txt_Apellidos").val("");
        $("#txt_cargo").val("");
        $("#txt_clave").val("");
        $("#ventana-usuarios").modal("toggle");
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "El Usuario fue registrado correctamente",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  });

  //funcion encargada de visualizar usuario
  function cargarUsuario() {
    var objData = new FormData();
    objData.append("cargarDatos", "ok");
    $.ajax({
      url: "http://localhost/ospedale/control/usuariocontrol.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      var dataSet = [];
      var contadorUsu = 0;

      respuesta.forEach(cargarTablaUsu);

      function cargarTablaUsu(item, index) {
        contadorUsu += 1;

        var interface = "";

        interface += '<div class="btn-group">';

        /*interface += '<button id="btn_editarEspe" type="button" title="Editar" documento="' + item.documento + '" nombre="' + item.nombre + '" documento="' + item.documento + '"  poliza="' + item.vigencia_poliza + '" correo="' + item.correo + '" telefono="' + item.telefono + '" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-EditarUsuarios"><span class="glyphicon glyphicon-wrench"></span></button>';*/

        interface +=
          '<button id="btn_eliminarUsu" type="button" title="Eliminar" documento="' +
          item.documento +
          '" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></span></button>';

        interface += "</div>";

        dataSet.push([
          contadorUsu,
          item.documento,
          item.nombre,
          item.apellido,
          item.cargo,
          interface,
        ]);
      }

      var tabla = $(".tablaUsu").DataTable({
        data: dataSet,
        responsive: true,
      });
    });
  }

  //Eliminar Usuario
  $(".tablaUsu").on("click", "#btn_eliminarUsu", function () {
    Swal.fire({
      title: "Esta usted seguro de eliminar el registro?",
      text: "Recuerde que no podra recuperar datos una vez confirmanda esta accion",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si,Estoy seguro!",
      cancelButtonText: "cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        var documento = $(this).attr("documento");
        var objData = new FormData();
        objData.append("idEliminarUsu", documento);

        $.ajax({
          url: "http://localhost/ospedale/control/usuariocontrol.php",
          type: "post",
          dataType: "json",
          data: objData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (respuesta) {
          window.location = "../../views/usuarios/index.php";
        });
      }
    });
  });

  // funcion encargada de insertar especialista
  $("#btn_guardarE").click(function () {
    var especialidad = $("#txt_especialidad").val();
    var nombres = $("#txt_nombres").val();
    var documento = $("#txt_documento").val();
    var inicioCon = $("#txt_inicioCon").val();
    var finCon = $("#txt_finCon").val();
    var poliza = $("#txt_poliza").val();
    var correo = $("#txt_correo").val();
    var telefono = $("#txt_telefono").val();
    var estado = $("#txt_estado").val();

    var objData = new FormData();
    objData.append("jsespecialidad", especialidad);
    objData.append("jsnombres", nombres);
    objData.append("jsdocumento", documento);
    objData.append("jsinicioCon", inicioCon);
    objData.append("jsfinCon", finCon);
    objData.append("jspoliza", poliza);
    objData.append("jscorreo", correo);
    objData.append("jstelefono", telefono);
    objData.append("jsestado", estado);
    $.ajax({
      url: "http://localhost/ospedale/control/especialistaControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      if (respuesta == "ok") {
        $("#txt_especialidad").val("");
        $("#txt_nombres").val("");
        $("#txt_documento").val("");
        $("#txt_inicioCon").val("");
        $("#txt_finCon").val("");
        $("#txt_poliza").val("");
        $("#txt_correo").val("");
        $("#txt_telefono").val("");
        $("#txt_estado").val("");
        $("#ventana-especialistas").modal("toggle");
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "El Especialista fue registrado correctamente",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  });

  // funcion encargada de vizualizar especialistas
  function cargarEspe() {
    var objData = new FormData();
    objData.append("cargarDatos", "ok");
    $.ajax({
      url: "http://localhost/ospedale/control/especialistaControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      var dataSet = [];
      var contadorEspe = 0;

      respuesta.forEach(cargarTablaEspe);

      function cargarTablaEspe(item, index) {
        contadorEspe += 1;

        var interface = "";

        interface += '<div class="btn-group">';

        if (cargo != null) {
          if (cargo == "Administrador") {
            interface +=
              '<button id="btn_editarEspe" type="button" title="Editar" especialidad="' +
              item.especialidad +
              '" nombres="' +
              item.nombres +
              '" documento="' +
              item.documento +
              '" fecha_inicio="' +
              item.inicioCon +
              '" fecha_fin="' +
              item.finCon +
              '" vigencia_poliza="' +
              item.poliza +
              '" correo="' +
              item.correo +
              '" telefono="' +
              item.telefono +
              '" estado="' +
              item.estado +
              '" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-EditarUsuarios"><span class="glyphicon glyphicon-wrench"></span></button>';

            interface +=
              '<button id="btn_inactivoEspe" type="button" title="Eliminar" documento="' +
              item.documento +
              '" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></span></button>';
          }
        }

        interface +=
          '<button id="btn_documentos" type="button" title="documentos" documento="' +
          item.documento +
          '" type="button" class="btn btn-success">   <span class="glyphicon glyphicon-folder-open"></span>  documentos</button> ';

        interface += "</div>";

        dataSet.push([
          contadorEspe,
          item.especialidad,
          item.nombres,
          item.documento,
          item.correo,
          item.telefono,
          item.estado,
          interface,
        ]);
      }
      console.log(dataSet);

      var tabla = $(".tablaEspe").DataTable({
        data: dataSet,
        responsive: true,
      });
    });
  }

  //boton de editar especialistas
  $("#tablaEspe").on("click", "#btn_editarEspe", function () {
    var especialidad = $(this).attr("especialidad");
    var nombres = $(this).attr("nombres");
    var documento = $(this).attr("documento");
    var inicioCon = $(this).attr("fecha_inicio");
    var finCon = $(this).attr("fecha_fin");
    var poliza = $(this).attr("vigencia_poliza");
    var correo = $(this).attr("correo");
    var telefono = $(this).attr("telefono");
    var estado   = $(this).attr("estado");

    $("#txt_Editespecialidad").val(especialidad);
    $("#txt_Editnombres").val(nombres);
    $("#txt_Editdocumento").val(documento);
    $("#txt_Editfechaini").val(inicioCon);
    $("#txt_Editfechafin").val(finCon);
    $("#txt_Editpoliza").val(poliza);
    $("#txt_Editcorreo").val(correo);
    $("#txt_Edittelefono").val(telefono);
    $("#txt_Editestado").val(estado);
    $("#btn_editarE").attr("documento", documento);
  });

  //funcion editar Espe
  $("#btn_editarE").click(function () {
    var especialidad = $("#txt_Editespecialidad").val();
    var nombres = $("#txt_Editnombres").val();
    var documento = $("#txt_Editdocumento").val();
    var inicioCon = $("#txt_Editfechaini").val();
    var finCon = $("#txt_Editfechafin").val();
    var poliza = $("#txt_Editpoliza").val();
    var correo = $("#txt_Editcorreo").val();
    var telefono = $("#txt_Edittelefono").val();
    var estado = $("#txt_Editestado").val();
    var documento = $(this).attr("documento");

    var objData = new FormData();
    objData.append("jsEditEspecialidad", especialidad);
    objData.append("jsEditNombres", nombres);
    objData.append("jsEditDocumento", documento);
    objData.append("jsEditinicio", inicioCon);
    objData.append("jsEditfin", finCon);
    objData.append("jsEditpoliza", poliza);
    objData.append("jsEditcorreo", correo);
    objData.append("jsEditTelefono", telefono);
    objData.append("jsEditestado", estado);

    $.ajax({
      url: "http://localhost/ospedale/control/especialistaControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      if (respuesta == "ok") {
        window.location = "../../views/especialistas/index.php";
        /*Swal.fire({
        position: "top-end",
        icon: "success",
        title: "El Usuario fue registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
      });*/
      }
    });
  });

  //boton eliminar espe
  $(".tablaEspe").on("click", "#btn_inactivoEspe", function () {
    Swal.fire({
      title: "Esta usted seguro que quiere Eliminar el especialista?",
      text: "Recuerde que el resgistro estara en Inactivos",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si,Estoy seguro!",
      cancelButtonText: "cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        var documento = $(this).attr("documento");
        var objData = new FormData();
        objData.append("idEliminarEsp", documento);

        $.ajax({
          url: "http://localhost/ospedale/control/especialistaControl.php",
          type: "post",
          dataType: "json",
          data: objData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (respuesta) {
          window.location = "../../views/especialistas/index.php";
        })
      }
    });
  });
  //

  //funcion generar documentos E
  $("#tablaEspe").on("click", "#btn_documentos", function () {
    var documento = $(this).attr("documento");

    window.open("../../documentos.php?documento=" + documento, "_blank");
  });

  $("#btn-subirArchivos").click(function () {
    var file = $("#fileUser").prop("files")[0];
    var dni = $(this).attr("data-dni");

    var objData = new FormData();

    objData.append("subirArchivo", "ok");
    objData.append("fileUser", file);
    objData.append("dni", dni);

    $.ajax({
      url: "http://localhost/ospedale/control/especialistaControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false
    }).done(function (r) {
      if (r == "ok") {
        window.location.reload();
      }
    });
  });

  //funcion archivos documentos
  function cargarArchi() {

    if (dni != null) {
      var objData = new FormData();
      objData.append("cargarDocumentos", "ok");
      objData.append("dni", dni);
      $.ajax({
        url: "http://localhost/ospedale/control/especialistaControl.php",
        type: "post",
        dataType: "json",
        data: objData,
        cache: false,
        contentType: false,
        processData: false,
      }).done(function (respuesta) {
        var dataSet = [];
        var contadorEspe = 0;

        respuesta.forEach(cargartabladocu);

        function cargartabladocu(item, index) {
          contadorEspe += 1;

          var interface = "";

        interface += '<div class="btn-group">';

        /*interface += '<button id="btn_editarEspe" type="button" title="Editar" documento="' + item.documento + '" nombre="' + item.nombre + '" documento="' + item.documento + '"  poliza="' + item.vigencia_poliza + '" correo="' + item.correo + '" telefono="' + item.telefono + '" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-EditarUsuarios"><span class="glyphicon glyphicon-wrench"></span></button>';*/

         interface +=
          '<button id="btn_eliminardocu" type="button" title="Eliminar" documento="' +
          item.documento +
          '" type="button"><span class="glyphicon glyphicon-trash"></span></span></button>';

         interface += "</div>";
          

          dataSet.push([
            contadorEspe,
            item,
            interface
          ]);
        }

        var tabla = $(".tabladocu").DataTable({
          data: dataSet,
          responsive: true,
        });
      });
    }

  }

  //funcion eliminar documentos
  $(".tabladocu").on("click", "#btn_eliminardocu", function () {
    Swal.fire({
      title: "Esta usted seguro que quiere Eliminar el documento?",
      text: "Recuerde que no se podra recuperar",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si,Estoy seguro!",
      cancelButtonText: "cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        var dni = $(this).attr("data-dni");
        var objData = new FormData();
        objData.append("idEliminardocu", dni);

        $.ajax({
          url: "http://localhost/ospedale/control/especialistaControl.php",
          type: "post",
          dataType: "json",
          data: objData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (respuesta) {
          window.location = "../../views/especialistas/index.php";
        })
      }
    });
  });
  /////////////////////////////////////////////////////////////////////////////////////////

  // funcion encargada de insertar Alianzas
  $("#btn_guardarAL").click(function () {
    var razon = $("#txt_Razon").val();
    var nit = $("#txt_nit").val();
    var representante = $("#txt_representante").val();
    var objecto = $("#txt_objecto").val();
    var inicioCon = $("#txt_inicioConA").val();
    var finCon = $("#txt_finConA").val();
    var prorro = $("#txt_prorroga").val();
    var camara = $("#txt_camara").val();
    var correo = $("#txt_correo").val();
    var telefono = $("#txt_telefono").val();
    var supervisor = $("#txt_supervisor").val();

    var objData = new FormData();
    objData.append("jsrazon", razon);
    objData.append("jsnit", nit);
    objData.append("jsrepresentante", representante);
    objData.append("jsobjecto", objecto);
    objData.append("jsinicioCon", inicioCon);
    objData.append("jsfinCon", finCon);
    objData.append("jsprorroga", prorro);
    objData.append("jscamara", camara);
    objData.append("jscorreo", correo);
    objData.append("jstelefono", telefono);
    objData.append("jssupervisor", supervisor);
    $.ajax({
      url: "http://localhost/ospedale/control/alianzasControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      if (respuesta == "ok") {
        $("#txt_Razon").val("");
        $("#txt_nit").val("");
        $("#txt_representante").val("");
        $("#txt_objecto").val("");
        $("#txt_inicioConA").val("");
        $("#txt_finConA").val("");
        $("#txt_prorroga").val("");
        $("#txt_camara").val("");
        $("#txt_correo").val("");
        $("#txt_telefono").val("");
        $("#txt_supervisor").val("");
        $("#ventana-alianzas").modal("toggle");
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "El Tercero Administrado fue registrado correctamente",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    });
  });

  // funcion encargada de vizualizar Alianzas
  function cargarAli() {
    var objData = new FormData();
    objData.append("cargarDatos", "ok");
    $.ajax({
      url: "http://localhost/ospedale/control/alianzasControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      var dataSet = [];
      var contadorAli = 0;

      respuesta.forEach(cargarTablaAli);

      function cargarTablaAli(item, index) {
        contadorAli += 1;

        var interface = "";

        interface += '<div class="btn-group">';

        if (cargo != null) {
          if (cargo == "Administrador") {

            
            interface +=
              '<button id="btn_editarAdm" type="button" title="Editar" razon_social="' +
              item.razon_social +
              '" nit="' +
              item.nit +
              '" representante="' +
              item.representante +
              '" objecto="' +
              item.objecto +
              '" inicioConA="' +
              item.inicioCon +
              '" finConA="' +
              item.finCon +
              '" prorroga="' +
              item.prorroga +
              '" camara="' +
              item.camara +
              '" correo="' +
              item.correo +
              '" telefono="' +
              item.telefono +
              '" supervisor="' +
              item.supervisor +
              '" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana-EditarAli"><span class="glyphicon glyphicon-wrench"></span></button>';

            interface +=
              '<button id="btn_inactivosAdm" type="button" title="Eliminar" nit="' +
              item.nit +
              '" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></span></button>';
          }
        }

        interface +=
          '<button id="btn_documentosAdm" type="button" title="nit" nit="' +
          item.nit +
          '" type="button" class="btn btn-success">   <span class="glyphicon glyphicon-folder-open"></span>  documentos</button> ';

        interface += "</div>";

        dataSet.push([
          
          contadorAli,
          item.razon_social,
          item.nit,
          item.inicioConA,
          item.finConA,
          item.supervisor,
          item.estadoA,
          interface,
        ]);
      }

      var tabla = $(".tablaAli").DataTable({
        data: dataSet,
        responsive: true,
      });
    });
  }

  //boton de editar Alianzas
  $("#tablaAli").on("click", "#btn_editarAdm", function () {
    var razon = $(this).attr("razon_social");
    var nit = $(this).attr("nit");
    var representante = $(this).attr("representante");
    var objecto = $(this).attr("objecto");
    var inicioConA = $(this).attr("inicioConA");
    var finConA = $(this).attr("finConA");
    var prorroga = $(this).attr("prorroga");
    var camara = $(this).attr("camara");
    var correo = $(this).attr("correo");
    var telefono = $(this).attr("telefono");
    var supervisor = $(this).attr("supervisor");

    $("#txt_EditRazon").val(razon);
    $("#txt_Editnit").val(nit);
    $("#txt_Editrepresentante").val(representante);
    $("#txt_Editobjecto").val(objecto);
    $("#txt_EditinicioConA").val(inicioConA);
    $("#txt_EditfinConA").val(finConA);
    $("#txt_Editprorroga").val(prorroga);
    $("#txt_Editcamara").val(camara);
    $("#txt_Editcorreo").val(correo);
    $("#txt_Edittelefono").val(telefono);
    $("#txt_Editsupervisor").val(supervisor);
    $("#btn_EditarAL").attr("nit", nit);
  });

  $("#btn_EditarAL").click(function () {
    var razon = $("#txt_EditRazon").val();
    var nit = $("#txt_Editnit").val();
    var representante = $("#txt_Editrepresentante").val();
    var objecto = $("#txt_Editobjecto").val();
    var inicioConA = $("#txt_EditinicioConA").val();
    var finConA = $("#txt_EditfinConA").val();
    var prorroga = $("#txt_Editprorroga").val();
    var camara = $("#txt_Editcamara").val();
    var correo = $("#txt_Editcorreo").val();
    var telefono = $("#txt_Edittelefono").val();
    var supervisor = $("#txt_Editsupervisor").val();
    var nit = $(this).attr("nit");

    var objData = new FormData();
    objData.append("jsEditrazon", razon);
    objData.append("jsEditNit", nit);
    objData.append("jsEditrepresentante", representante);
    objData.append("jsEditobjecto", objecto);
    objData.append("jsEditinicioConA", inicioConA);
    objData.append("jsEditfinCon", finConA);
    objData.append("jsEditprorroga", prorroga);
    objData.append("jsEditcamara", camara);
    objData.append("jsEditcorreo", correo);
    objData.append("jsEditTelefono", telefono);
    objData.append("jsEditsupervisor", supervisor);

    $.ajax({
      url: "http://localhost/ospedale/control/alianzasControl.php",
      type: "post",
      dataType: "json",
      data: objData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (respuesta) {
      if (respuesta == "ok") {
        window.location = "../../views/alianzas/index.php";
        /*Swal.fire({
        position: "top-end",
        icon: "success",
        title: "El Usuario fue registrado correctamente",
        showConfirmButton: false,
        timer: 1500,
      });*/
      }
    });
  });

  //boton eliminar alianzas
  $(".tablaAli").on("click", "#btn_inactivosAdm", function () {
    Swal.fire({
      title: "Esta usted seguro de Eliminar el tercero Administrativo?",
      text: "Recuerde que No podra recuperar el resgistro",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "si,Estoy seguro!",
      cancelButtonText: "cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        var nit = $(this).attr("nit");
        var objData = new FormData();
        objData.append("idEliminarAli", nit);

        $.ajax({
          url: "http://localhost/ospedale/control/alianzasControl.php",
          type: "post",
          dataType: "json",
          data: objData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (respuesta) {
          window.location = "../../views/alianzas/index.php";
        })
      }



    });
  });

  //funcion generar documentos Ali
  $("#tablaAli").on("click", "#btn_documentosAdm", function () {
    var nit = $(this).attr("nit");

    window.open("../../documentAli.php?nit=" + nit, "_blank");
  });
});
