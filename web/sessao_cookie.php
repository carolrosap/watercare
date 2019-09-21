<?php
session_start();
 if (empty($_SESSION["emailUsuario"])||empty($_SESSION["senhaUsuario"]) || empty($_SESSION['idUsuario']) || empty($_SESSION['user']))
  header("location: login.php");
 else{
  if (empty($_COOKIE["tempo"])){
   	session_destroy();
   	header("location: login.php");
  }
 }
 //setcookie("tempo","existe",time()+3600);
?>
