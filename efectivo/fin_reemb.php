<?php
session_start();
    if(!isset($_SESSION['admin'])){
        
          header('Location:loginreynosa.php');
    }
include 'database/conn.php';
$idreembolso=$_GET["id"];
$consulta ="UPDATE reembolso SET id_sta = '1' WHERE reembolso.id_reembolso=".$idreembolso;
$result=$conn->query($consulta);
if (!$result) 
	{
		
		echo '<script language="javascript">alert("No se ha podido finalizar correctamente");</script>';
		
	}
	else
	{
		echo '<script language="javascript">alert("Finalizado!");</script>';
		header("Location: lista_reembolsos.php");
	}