<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
	<?php
		//local
		$mysqli=new mysqli('localhost','root','','projeto_watercare');
		//hospedado
		//000host
		//$mysqli=new mysqli('mysql1.000webhost.com','a9765706_wcuser','watercare123456','a9765706_wc');
		//hostinger
		//$mysqli=new mysqli('mysql.hostinger.com.br','u937692838_user1','wc123456','u937692838_wc');
		if($mysqli->connecct_error){
			die('Erro na conexao('.$mysqli->connect_error);
		}
		//echo "Conexao efetuada com sucesso..." . $mysqli->host_info;
	?>
</body>
</html>