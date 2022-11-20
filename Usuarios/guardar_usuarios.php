<?php
$cargaUtil = json_decode(file_get_contents("php://input"));

// Si no hay datos, salir inmediatamente indicando un error 500
if (!$cargaUtil) {
    
    http_response_code(500);
    exit;
}

// Extraer valores
$USUARIO = $cargaUtil->USUARIO;
$ID_ROL = $cargaUtil->ID_ROL;
$CLAVE = $cargaUtil->CLAVE;
include_once "funciones.php";
$respuesta = guardarUsuarios($USUARIO, $CLAVE, $ID_ROL);

// Devolver al cliente la respuesta de la función
echo json_encode($respuesta);
