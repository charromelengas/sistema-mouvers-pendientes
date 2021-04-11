<?php
session_start();
    if(!isset($_SESSION['admin'])){
        
          header('Location:loginreynosa.php');
    }
include 'database/conn.php';
$idcancelacion=$_GET["id"];
$consulta ="DELETE FROM cancelaciones WHERE id_cancel=".$idcancelacion;
$result=$conn->query($consulta);
if (!$result) 
	{
		
		echo '<script language="javascript">alert("No se ha podido finalizar correctamente");</script>';
		
	}
	else
	{
		echo '<script language="javascript">alert("Finalizado!");</script>';
		header("Location: lista_cancelados.php");
	}