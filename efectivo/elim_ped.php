<?php
session_start();
    if(!isset($_SESSION['admin'])){
        
          header('Location:loginreynosa.php');
    }
include 'database/conn.php';
$idpedido=$_GET["id"];
$consulta ="DELETE FROM pedido WHERE id_pedido=".$idpedido;
$result=$conn->query($consulta);
if (!$result) 
	{
		
		echo '<script language="javascript">alert("No se ha podido finalizar correctamente");</script>';
		
	}
	else
	{
		echo '<script language="javascript">alert("Finalizado!");</script>';
		header("Location: pedidos_pag.php");
	}