<?php 
	include_once('../validacion/conexion.php');
	
	$ID = $_GET['ID'];

	$sql = "SELECT * FROM persona WHERE ID = '$ID'";
	$query = mysqli_query($conexion,$sql);

	$fila = mysqli_fetch_array($query);

?>

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
	<form action="editar.php" method="post">
		<input type="hidden" name="ID" value="<?php echo $fila['ID']; ?>">
		<div class="mb-3">
			<label class="form-label">Usuario:</label>
			<input type="text" class="form-control" placeholder="USUARIO" id="USUARIO" name="USUARIO" value="<?php echo $fila['USUARIO']; ?>">
		</div><br>
		<div class="mb-3">
			<label class="form-label">Clave:</label>
			<input type="text" class="form-control" placeholder="CLAVE" id="PASSWORD" name="PASSWORD" value="<?php echo $fila['CLAVE']; ?>">
		</div><br>
		<div class="mb-3">
			<label class="form-label">Rol:</label>
			<input type="text" class="form-control" placeholder="Rol" id="ROL" name="ROL" value="<?php echo $fila['ID_ROL']; ?>">
		</div><br>
 		
 		<div class="Boton">
 			<button type="submit" class="btn btn-primary">Editar</button>
 		</div>
		
	</form>
</div>

<footer class="footer3"><div class="card-footer text-muted text-center">© Andrea Isaza 2022</div></footer>