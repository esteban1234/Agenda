<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="views/app/css/responsivo.css">
    <link rel="stylesheet" href="views/app/css/estilos.css">
    <script src="views/app/js/generales.js"></script>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">e
  </head>



  <body>
    <form action="" method="POST" >
      <article class="login-form">
         <h1>Iniciar Sesión</h1>
         <article class="form-group ">
           <input type="text" class="form-control" name="user" placeholder="Usuario" id="UserName">
           <i class="fa fa-user"></i>
         </article>
         <article class="form-group log-status">
           <input type="password" class="form-control" name="pass" placeholder="Contraseña" id="Passwod">
           <i class="fa fa-lock"></i>
         </article>
          <div  id='_AJAX_LOGIN_'></div>
          <!-- <a class="link" href="#">Lost your password?</a> -->
         <button type="button" class="log-btn" onclick="goLogin()">Iniciar Sesión</button>
     </article>

    </form>

    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src="views/app/js/jquery.js"></script>
    <script src="views/app/js/goSesion.js"></script>



  </body>
</html>
