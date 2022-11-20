<?php
  $user = $_POST['user_php'];
  $clave = $_POST['clave_php'];
  if(empty($user) || empty($clave)){
    echo 'error_1';
  }else{
    require_once('../validacion/usuario.php');
    $Usuario = new Usuario();
    $Usuario -> login($user, $clave); 
  }
?>
