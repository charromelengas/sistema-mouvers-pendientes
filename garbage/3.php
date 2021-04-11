          <!DOCTYPE html>
            <html>
            <head>
              <title></title>
              <link rel="stylesheet" type="text/css" href="../efectivo/css/main.css">
            </head>
            <body>
            <section class="material-half-bg">
              <div class="cover"></div>
            </section>
            <section class="login-content">
                <div class="logo">
                  <h1>Möuvers</h1>
                </div>
              <div class="container">
                <h2>Buscar</h2>
                <form role="form" method="POST">
                  <div class="form-group">
                    <label for="usuario">Ingresa nombre</label>
                    <input type="text" name="no_rep" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-default">Buscar</button>
                </form>
                 <?php
                      require '../efectivo/database/conn.php';
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
                            echo "No";
                          }
                      }

                      

                ?>
              </div>


            </body>
            </html>            

           