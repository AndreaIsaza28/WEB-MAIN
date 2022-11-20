<?php 
	include_once('../validacion/conexion.php');

	$USUARIO = $_POST['USUARIO'];
	$CLAVE = $_POST['CLAVE'];
	$ID_ROL = $_POST['ID_ROL'];


	$sql = "insert into persona(USUARIO,CLAVE,ID_ROL) values ('$USUARIO','$CLAVE','$ID_ROL')";

	$query = mysqli_query($conexion,$sql);

	if ($query===true) {
		header("location: ../Formularios/InicioAdmin.php");
	}
?>