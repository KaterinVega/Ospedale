<?php

$fileName = "./data/" . $_GET["nit"] . "/" . $_GET["fileName"];
$ext = explode(".", $_GET["fileName"])[1];

if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
    header('Content-Type: image/*');
} else {
    header('Content-Type: application/pdf');
}

header('Content-Disposition: inline; filename='.$_GET["fileName"]);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

readfile($fileName);

?>