<?php
$cargaUtil = json_decode(file_get_contents("php://input"));

// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    http_response_code(500);
    exit;
}

// Extraer valores
$ID = $cargaUtil->ID;
$USUARIO = $cargaUtil->USUARIO;
$CLAVE = $cargaUtil->CLAVE;
$ID_ROL = $cargaUtil->ID_ROL;

include_once "funciones.php"; 

$respuesta = actualizarUsuarios($USUARIO, $CLAVE, $ID_ROL, $ID);

// Devolver al cliente la respuesta de la función
echo json_encode($respuesta);
