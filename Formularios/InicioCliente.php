<?php
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['ID_ROL']) || $_SESSION['ID_ROL'] != '2'){
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
                        <li><a href="../cerrar.php">CERRAR SESION</a></li>
                    </ul>
            </div>  
        </div>
<div class="formulariot">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
                  
</div><!-- /.box-header -->
<div class="box-body">
             
<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"><h2>LISTADO DE USUARIOS</h2>
    <thead class="thead">
        
        <tr class="tr2">
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Clave</th>
        </tr>
    </thead>
    <tbody class="tbody">
    <?php 

    include('../validacion/conexion.php');

    $sql = "SELECT * FROM persona";
    $query = mysqli_query($conexion,$sql);

    while($fila = mysqli_fetch_array($query)){
    ?>
            <tr class="tr">
                <td><?php echo $fila['ID'] ?></td>
                <td><?php echo utf8_encode($fila['USUARIO']) ?></td>
                <td><?php echo utf8_encode($fila['CLAVE']) ?></td> 
            </tr>
    <?php } ?>
    </tbody>
</div>
</table>

</div><!-- /.box-body -->  


</body>

<footer class="footer"><div class="card-footer text-muted text-center">© Andrea Isaza 2022</div></footer>
</html>