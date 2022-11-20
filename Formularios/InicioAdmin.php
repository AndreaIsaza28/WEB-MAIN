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
  <link rel="stylesheet" href="../css/stylehome.css">
  <link rel="icon" type="icon/png" href="../imagen/logo.png"> <!-- Icono en la parte superior -->
</head>
<body>
    <div class="container">
            <div class="navbar">
                <img src="../imagen/logo.png" class="logo" alt="Main Logo">
                    <ul>
                        <li><a href="nuevo.php">NUEVO</a></li>
                        <li><a href="../cerrar.php">CERRAR SESION</a></li>      
                    </ul>
            </div>  
        </div>

<div class="box-header">
    <i class="ion ion-clipboard"></i>
                  
</div><!-- /.box-header -->
<div class="box-body">
             
<table id="tabla" class="table" cellspacing="0" width="100%">
    <h2>LISTADO DE USUARIOS</h2>
    <thead class="thead">
        
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Usuario</th>
            <th scope="col">Clave</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>

        </tr>
    </thead>

    

    <tbody class="tbody">

    <?php 

    include('../validacion/conexion.php');

    $sql = "SELECT * FROM persona";
    $query = mysqli_query($conexion,$sql);

    while($fila = mysqli_fetch_array($query)){
    ?>
        <tr>
            <td scope="row"><?php echo $fila['ID'] ?></td>
            <td scope="row"><?php echo ($fila['USUARIO']) ?></td>
            <td scope="row"><?php echo ($fila['CLAVE']) ?></td> 
            <td scope="row"><?php echo ($fila['ID_ROL']) ?></td> 
            <td scope="row" align='center'> 
            <a href="editarU.php?ID=<?php echo  $fila['ID']?>" class="btn btn-warning">Editar</a> 
            <a href="EliminarU.php?ID=<?php echo  $fila['ID']?>" class="btn btn-danger">Eliminar</a> 
            </td> 
        </tr>
    <?php } ?>
            
    </tbody>
</table>

</div><!-- /.box-body -->  
</body>
</html>