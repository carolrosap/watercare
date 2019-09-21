<?php
session_start();
//include("sessao_cookie_login.php");
include("includes/conexao.php");
include("classes/Usuario.class.php");
if(!empty($_GET['cod']) && !empty($_GET['litros']) && !empty($_GET['valor'])){
	$user=new Usuario(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_GET['cod']);

}
echo uniqid();


?>
