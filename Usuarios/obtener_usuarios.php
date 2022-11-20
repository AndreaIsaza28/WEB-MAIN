<?php
include_once "funciones.php";
$usuarios = obtenerUsuarios();
echo json_encode($usuarios);
