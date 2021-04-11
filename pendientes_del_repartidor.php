<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="efectivo/images/logo_title.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="efectivo/css/main.css">
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
        <form class="login-form" method="POST">
          <h3 class="login-head"></i>¡Encuentra tus pendientes!</h3>
          <div class="form-group">
            <label class="control-label">Nombre</label>
            <input name="no_rep" class="form-control" type="text" placeholder="Nombre de usuario en la app" autofocus required>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa fa-address-card"></i>Buscar</button>
          </div>
        </form>
        <?php
                      require 'efectivo/database/conn.php';
                      if($_POST)
                      {
                          $id = $_POST['no_rep'];
                          $sql_repartidor = "SELECT fecha, num_ped, nombre_rep, cantidad_pen FROM pedido WHERE id_status = 2 AND nombre_rep = :rep";
                          $stmt = $conn->prepare($sql_repartidor);
                          $result = $stmt->execute(array(':rep' => $id));
                          $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);

                          if(count($rows))
                          {
                           ?> 
                           <?php
                                for ($i = 1; $i <= 13; $i++) {
                                echo '<br>';
                            }
                           ?>
                           <center><h5>Estos son tus pedidos pendientes</h5></center>
                                                <div class="row">
                                                <div class="col-md-12">
                                                  <div class="tile">
                                                    <div class="tile-body">
                                                      <div class="table-responsive">
                                                        <table class="table table-hover table-bordered" id="sampleTable">
                                                          <thead>
                                                            <tr>
                                                              <th>Fecha</th>
                                                              <th>Número de pedido</th>
                                                              <th>Repartidor</th>
                                                              <th>Cantidad pendiente del pedido</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php
                                                                  foreach ($rows as $row) {
                                                                    
                                                            ?>
                                                            <tr>
                                                              <td><?php print($row->fecha)?></td>
                                                              <td><?php print($row->num_ped)?></td>
                                                              <td><?php print($row->nombre_rep)?></td>
                                                              <td><?php print($row->cantidad_pen)?></td>
                                                              
                                                            </tr>
                                                            <?php
                                                                  }
                                                            ?>
                                                          </tbody>
                                                        </table>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                            

                            <?php
                            
                          }else{
                           echo '<script language="javascript">alert("Al parecer no cuentas con ningún pendiente. Comunicate con el equipo de soporte!");</script>';
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
    <p>Created by Möuvers® 2021.</p>
  </footer>
</html>