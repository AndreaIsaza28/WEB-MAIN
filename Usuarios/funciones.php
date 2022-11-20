<?php

function actualizarUsuarios($USUARIO, $CLAVE, $ID_ROL, $ID)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE persona SET USUARIO = ?, CLAVE = ?, ID_ROL = ? WHERE ID = ?");
    return $sentencia->execute([$USUARIO, $CLAVE, $ID_ROL, $ID]);
}

function obtenerUsuariosPorId($ID)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT ID, USUARIO, CLAVE, ID_ROL FROM persona WHERE ID = ?");
    $sentencia->execute([$ID]);
    return $sentencia->fetchObject();
}

function obtenerUsuarios()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT ID, USUARIO, CLAVE, ID_ROL FROM persona");
    return $sentencia->fetchAll();
}

function eliminarUsuarios($ID)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM persona WHERE ID = ?");
    return $sentencia->execute([$ID]);
}

function guardarUsuarios($USUARIO, $CLAVE, $ID_ROL)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO persona(USUARIO, CLAVE, ID_ROL) VALUES(?, ?, ?)");
    return $sentencia->execute([$USUARIO, $CLAVE, $ID_ROL]);
}

function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La CLAVE especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
