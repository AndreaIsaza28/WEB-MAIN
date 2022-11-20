<?php
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['ID_ROL']) || $_SESSION['ID_ROL'] != '1'){
    header('location: ../login2.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/stylehome2.css">
  <link rel="icon" type="icon/png" href="../imagen/logo.png"> <!-- Icono en la parte superior -->
  <script src="../js/sweetalert2.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="container">
            <div class="navbar">
                <img src="../imagen/logo.png" class="logo" alt="Main Logo">
                    <ul>
                    	<li><a href="agregar_usuarios.php">NUEVO</a></li>
                        <li><a href="../cerrar.php">CERRAR SESION</a></li>     
                    </ul>
            </div>  
        </div>
             
 <h2 class="h2">LISTADO DE USUARIOS</h2>

<div class="box-body">
<table id="tabla" class="table" cellspacing="0" width="100%">
    
    <thead class="thead">
        
        <tr>
            <th>USUARIO</th>
            <th>CLAVE</th>
            <th>ROL</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th>
        </tr>
    </thead>

    <tbody class="tbody" id="cuerpoTabla"></tbody>
</table>

</div><!-- /.box-body -->  
<script src="../js/usuarios.js"></script>
</body>
</html>