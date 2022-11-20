<?php
if (!isset($_GET["ID"])) {
    http_response_code(500);
    exit();
}
include_once "funciones.php";
$usuario = obtenerUsuariosPorId($_GET["ID"]);
echo json_encode($usuario); 