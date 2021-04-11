<?php
            require '../efectivo/database/conn.php';
            if($_GET)
              {
                $repartidor = $_GET['no_rep'];

                $sql_agregar = "SELECT * FROM pedido WHERE nombre_rep LIKE '%$repartidor%'";
                $sentencia_agregar = $conn->prepare($sql_agregar);
  
                $result=$conn->query($sql_agregar);
                while ($mostrar=$result->fetch(PDO::FETCH_ASSOC)) 
                {
                  echo $mostrar['nombre_rep'];
              }  

        ?>



        <div class="login-box">
        <form class="login-form" action="" method="GET">
          <h3 class="login-head"><i class="fa fa-user"></i>Encuentra tus pendientes</h3>
          <div class="form-group">
            <label class="control-label">Nombre del repartidor</label>
            <input class="form-control" name="no_rep" type="text" placeholder="Nombre de usuario en la aplicación" autofocus>
          </div>
          <div class="form-group btn-container">
            <!--<button class="btn btn-primary btn-block"><i class="fa fa-check-circle"></i>Buscar</button>-->
            <input type="submit" name="send" value="Buscar">          
          </div>
        </form>
      </div>
    
      <?php
            require '../efectivo/database/conn.php';
            if(isset($_GET['send']))
            {
              $repartidor = $_GET['no_rep'];
              $consulta = $conn->query("SELECT * FROM pedido WHERE nombre_rep LIKE '%$repartidor%'");
              while ($mostrar=$consulta->fetch(PDO::FETCH_ASSOC))
              {
                echo $mostrar['nombre_rep'].'<br>';
              }
            }

      ?>

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
                      <th>Cantidad pendiente</th>
                    </tr>
                  </thead>
                  <tbody>
                                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>