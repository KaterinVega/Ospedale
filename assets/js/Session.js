import { Account } from "./API/class/Account.js";

$(document).ready(() => {});

$("#btn_login").click(function () {
  var documento = $("#txt_documento").val();
  var contrasena = $("#txt_contrasena").val();

  let account = new Account(
    "katerin@gmail.com",
    contrasena,
    "Administrador",
    documento
  );

  account.exists().then((r) => {
    if (r == "ok"){
        alert("Bienvenido");
    }
  });
});
