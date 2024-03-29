<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../efectivo/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Möuvers - Busqueda de pendientes para repartidores</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Möuvers</h1>
      </div>
      <div class="login-box">
        <form class="login-form"  method="GET">
          <h3 class="login-head"><i class="fa fa-user"></i>Encuentra tus pendientes</h3>
          <div class="form-group">
            <label class="control-label">Nombre del repartidor</label>
            <input class="form-control" name="no_rep" type="text" placeholder="Nombre de usuario en la aplicación" required autofocus>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check-circle"></i>Buscar</button>
            <!--<input type="submit" name="send" value="Buscar">-->          
          </div>
        </form>
                <?php
                      require '../efectivo/database/conn.php';
                      if($_POST)
                      {
                          $id = $_POST['no_rep'];
                          $sql_repartidor = "SELECT fecha, num_ped, nombre_rep, cantidad_pen FROM pedido WHERE id_status = 2 AND nombre_rep =".$id;
                          $stmt = $conn->prepare($sql_repartidor);
                          $result = $stmt->execute(array($id));
                          $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

                          if(count($rows))
                          {
                            echo "Si existe";
                          }else{
                            echo '<script language="javascript">alert("Cancelación registrada con éxito!");</script>';
                          }
                      }

                ?>

      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
  <footer>
    <p>Cualquier duda o aclaración, favor de contactar a soporte técnico. 
    Created by Möuvers® 2021.</p>
  </footer>
</html>
