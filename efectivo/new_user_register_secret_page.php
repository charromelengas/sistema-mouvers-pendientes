<?phpsession_start();
    if(!isset($_SESSION['admin'])){
        
          header('Location:loginreynosa.php');
    }
    ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
      include 'database/conn.php';
      if($_POST){
        $nombre = $_POST['nombre'];
        $password = $_POST['contrasena'];
        $password2 = $_POST['confcontr'];
        $email = $_POST['email'];
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        if(password_verify($password2, $password) ){
           
            $sql_agregar = 'INSERT INTO usuario (nombre_usu, contra_usu, correo_usu) VALUES (?,?,?)';
            $sentencia_agregar = $conn->prepare($sql_agregar);
            $sentencia_agregar->execute(array($nombre,$password,$email));
            //cerramos conexion de bdd y sentencia
            $sentencia_agregar = null;
            $conn = null;
            echo '<script language="javascript">alert("Usuario registrado exitosamente");</script>';
            
        }else{
          echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
        }      
    }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Lstyle.css" media="screen" />
    <title>Registro</title>
  </head>
  <body class="fondo">
    <header><!---Aqui empieza el header-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <span class="navbar-text txt"><h5>NO DEBERIAS ESTAR AQUI</h5></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              
          </nav>
    </header><!--Aqui termina el header-->
    <div class="d-flex justify-content-center txt mt-3"><h2>EN SERIO, SALTE DE AQUI</h2></div>
    <div class="container boxr">
        <form action="user_register.php" method="POST">
            <div class="form-inline">
              <label for="nombre" class="mr-auto txt">Nombre</label>
              <input type="text" name="nombre" class="form-control snombre col-4 txt" id="nombre">
            </div>
            <div class="form-group mt-1">
                <label for="correo " class="txt">Correo</label>
                <input type="email" name="email" class="form-control" id="correo">
            </div>
            <div class="form-group">
              <label for="contra" class="txt">Contraseña</label>
              <input type="password" name="contrasena" class="form-control" id="contra">
              <label for="confcontra" class="txt">Confirmar contraseña</label>
              <input type="password" name="confcontr"class="form-control" id="confcontra">
            </div>
            <div class="d-flex justify-content-end mr-auto">
                <button type="submit" class="btn btn-outline-success">Enviar</button>
            </div>
          </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>