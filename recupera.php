<?php
  require 'conexion.php';
  include 'funcs.php';
  
  session_start();
  
  $errors = array();
  
  if(!empty($_POST))
  {
    $email = $mysqli->real_escape_string($_POST['email']);
    
    if(!isEmail($email))
    {
      $errors[] = "Debe ingresar un correo electronico valido";
    }
    
    if(emailExiste($email))
    {     
      $user_id = getValor('idUsuario','Correo', $email);
      $nombre = getValor('Nombres', 'Correo', $email);
      
      $token = generaTokenPass($user_id);
      
      $url = 'https://'.$_SERVER["SERVER_NAME"].'/cambia_pass.php?user_id='.$user_id.'&token='.$token;
      
      $asunto = 'Recuperar contraseña - Sistema de Inventarios';
      $cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar Contraseña</a>";
      
      if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
        echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu contrase&ntilde;a.<br />";
        echo "<a href='index.php' >Iniciar Sesion</a>";
        exit;
      }
      } else {
      $errors[] = "La direccion de correo electronico no existe";
    }
  }
?>
<html>
  <head>
    <title>Recuperar Contraseña</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" >
    <script src="js/bootstrap.min.js" ></script>
  </head>
  
  <body background="assets/img/fontLogin.jpg">
    
    <div class="container">    
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
          <div class="panel-heading">
            <div class="panel-title">Recuperar Contraseña</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
          </div>     
          
          <div style="padding-top:30px" class="panel-body" >
            
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            
            <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
              
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"></span>
                <input id="email" type="email" class="form-control" name="email" placeholder="Correo" required>                                        
              </div>
              
              <div style="margin-top:10px" class="form-group">
                <div class="col-sm-12 controls">
                  <button id="btn-login" type="submit" class="btn btn-success">Enviar</a>
                </div>
              </div>  
            </form>
            <?php echo resultBlock($errors); ?>
          </div>                     
        </div>  
      </div>
    </div>
  </body>
</html>