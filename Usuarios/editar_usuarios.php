<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editar</title>
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
                        <li><a href="IndexAdmin.php">VOLVER</a></li>      
                    </ul> 
            </div>  
        </div>

<div class="columns">
    <div class="column is-one-third">
        <h2 class="is-size-2">Editar Usuario</h2>
        <div class="field">
            <label class="label" for="USUARIO">Usuario</label>
            <div class="control">
                <input required id="USUARIO" class="input" type="text" placeholder="Usuario" name="USUARIO">
            </div>
        </div>
        <div class="field">
            <label class="label" for="CLAVE">Clave</label>
            <div class="control">
                <input name="CLAVE" class="input" id="CLAVE" placeholder="Clave" required></input>
            </div>
        </div>
        <div class="field">
            <label class="label" for="ID_ROL">1(Administrador) - 2(Cliente)</label>
            <div class="control">
                <input required id="ID_ROL" name="ID_ROL" class="input" type="text" placeholder="Rol">
            </div>
        </div>
        <div class="field">
            <div class="control1">
                <button id="btnGuardar" class="button is-success">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<script src="../js/editar_usuarios.js"></script>

<footer class="footer3"><div class="card-footer text-muted text-center">© Andrea Isaza 2022</div></footer>