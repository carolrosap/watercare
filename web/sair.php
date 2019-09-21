<?php
session_start();

  if (!empty($_COOKIE["tempo"]))
  {
   session_destroy();
   setcookie("tempo", "", time()-3600);
   header("location: index.php");
   
  }
 
?>