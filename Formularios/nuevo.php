<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Editar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/stylehome.css">
  <link rel="icon" type="icon/png" href="../imagen/logo.png"> <!-- Icono en la parte superior -->
</head>
<body>
    <div class="container">
            <div class="navbar">
                <img src="../imagen/logo.png" class="logo" alt="Main Logo">
                    <ul>
                        <li><a href="InicioAdmin.php">VOLVER</a></li>      
                    </ul>
            </div>  
        </div>

<div class="container">
	<h2>LISTADO DE USUARIOS</h2>
	<form action="insertar.php" method="post" class="formu">
		<div class="mb-3">
			<input type="text" class="form-control" placeholder="Ingrese Usuario" name="USUARIO">
		</div><br>
		<div class="mb-3">
			<input type="password" class="form-control" placeholder="Ingrese Clave" name="CLAVE">
		</div><br>
		<div class="mb-3">
			<label class="label">1(Administrador) - 2(Cliente)</label><br>
			<input type="text" class="form-control" placeholder="Ingrese Rol" name="ID_ROL">
		</div><br>
 		
 		<div class="Boton">
 			<button type="submit" class="btn btn-primary">Agregar</button>
 		</div>
		 
	</form>
</div>

<footer class="footer2"><div class="card-footer text-muted text-center">© Andrea Isaza 2022</div></footer>