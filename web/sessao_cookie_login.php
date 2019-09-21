<?php
//session_start();
 if (!empty($_SESSION["emailUsuario"])|| !empty($_SESSION["senhaUsuario"]) || !empty($_SESSION['idUsuario']) || !empty($_SESSION['user']))
  header("location: home.php");
 
  if (!empty($_COOKIE["tempo"]))
  {
   
   header("location: home.php");
  }
 
 
?>