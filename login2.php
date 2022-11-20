 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" type="icon/png" href="imagen/logo.png"> <!-- Icono en la parte superior -->
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>


    <div class="container">
      <div class="formulario">
        <div class="col-xs-12 col-md-4 col-md-offset-4">

          <!-- Estructura del formulario -->
          <form method="post" id="form">

            <h2><img src="imagen/icon2.png"></h2>


            <!-- Caja de texto para usuario -->
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="formanag_input formanag_user" name="usuario" id="user" placeholder=" Ingresa tu usuario">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password" name="password" autocomplete="off" class="formanag_input formanag_password" id="clave" placeholder=" Ingresa tu clave">
            </div>

            <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="#" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->

            <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
                <button type="button" class="btn btn-primary btn-block" name="button" id="login">Iniciar Sesion</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- / Final Formulario login -->

    <!-- Jquery -->
    <script src="js/jquery.js"></script>
    <!-- SweetAlert js -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="js/operacion.js"></script> 
  </body>
</html>
