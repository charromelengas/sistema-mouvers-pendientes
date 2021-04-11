<?php
    include 'database/conn.php';
    session_start();
    if(!isset($_SESSION['admin'])){
        
          header('Location:loginreynosa.php');
    }
    $idus = $_SESSION['admin'];
    $sqlnombre = "SELECT id_usuario, nombre_usu FROM usuario WHERE id_usuario=".$idus;
    $resultado=$conn->query($sqlnombre);
    $row=$resultado->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="images/logo_title.png">
    <title>Möuvers - Sistema para el control de pendientes y reembolsos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">Möuvers</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu User menu-->
      <ul class="app-nav">
        <li class="app-search"> 
        </li>
    
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="loginout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo utf8_decode($row['nombre_usu']) ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa fa-table"></i><span class="app-menu__label">Pedidos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="pendientes.php"><i class="icon fa fa-circle-o"></i> Registrar nuevo pendiente</a></li>
            <li><a class="treeview-item" href="pendientesxpag.php" ><i class="icon fa fa-circle-o"></i> Pendientes por pagar</a></li>
            <li><a class="treeview-item" href="pedidos_pag.php" ><i class="icon fa fa-circle-o"></i> Pendientes pagados</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa fa-ban"></i><span class="app-menu__label">Cancelaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="cancelacion.php"><i class="icon fa fa-circle-o"></i> Registrar cancelacion</a></li>
            <li><a class="treeview-item" href="lista_cancelados.php" ><i class="icon fa fa-circle-o"></i> Lista de cancelados</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-credit-card-alt"></i><span class="app-menu__label">Reembolsos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="nuevo_reembolso.php"><i class="icon fa fa-circle-o"></i> Registrar reembolso</a></li>
            <li><a class="treeview-item" href="lista_reembolsos.php" ><i class="icon fa fa-circle-o"></i> Lista de reembolsos pendientes</a></li>
            <li><a class="treeview-item" href="reembolsos_liquidados.php" ><i class="icon fa fa-circle-o"></i> Reembolsos realizados</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-external-link-square"></i><span class="app-menu__label">Detalles</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item"  target ="blank" href="https://docs.google.com/spreadsheets/d/1xdbcNHaybftk4IxkfBRtddUM5BCEVQzQlK2dOs6kQkE/edit#gid=237193510"><i class="icon fa fa-file-excel-o"></i>Hoja excel para detalles menores</a></li>
        </li>

      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-archive"></i> Sistema para el control de pendientes y reembolsos</h1>
          <p>Bienvenido <?php echo utf8_decode($row['nombre_usu']) ?>!</p>
        </div>
      </div>
     <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
              <h4>Reembolsos</h4>
              <p>
                <b>
                <?php
                                    require 'database/conn.php';
                                    $sql = "SELECT COUNT(*) total FROM reembolso WHERE id_sta = 2";
                                    $result = $conn->query($sql); 
                                    $total = $result->fetchColumn();
                                    echo 'Reembolsos pendientes: ' . $total;
                    ?>
                </b>
              </p>
            </div>
          </div>
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
              <h4>Efectivos</h4>
              <p>
                <b>
                <?php
                                    require 'database/conn.php';
                                    $sql = "SELECT COUNT(*) total FROM pedido WHERE id_status = 2";
                                    $result = $conn->query($sql); 
                                    $total = $result->fetchColumn();
                                    echo 'Pedidos en efectivo pendientes: ' . $total;
                    ?>
                </b>
              </p>
            </div>
          </div>
          <div class="tile">
            <h3 class="tile-title">Nota importante</h3>
            <div class="tile-body">Como responsable del soporte técnico y soporte al cliente, procura siempre mantener abierto este sistema ya que funge de apoyo para llevar un mejor control en los pendientes y efectivos que se registran en el día a día :)</div>
            <div class="tile-footer"><a class="btn btn-primary" href="https://mouvers.mx/ciudades/#/pagessimples/loginf" target="blank">Ir a panel de administración</a></div>
          </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    
    
  </body>
</html>