<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
	<?php
		abstract class Pessoa{
			protected $nome;
			protected $sobrenome;
			protected $nascimento;
			protected $cidade;
			protected $pais;
			protected $uf;
			
			function __construct($_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_uf){
				$this->nome=$_nome;
				$this->sobrenome=$_sobrenome;
				$this->nascimento=$_nascimento;
				$this->cidade=$_cidade;
				$this->pais=$_pais;
				$this->uf=$_uf;
			}
			function getNome(){
				return $this->nome;
			}
			function getUf(){
				return $this->uf;
			}
			function getSobrenome(){
				return $this->sobrenome;
			}
			function getCidade(){
				return $this->cidade;
			}
			function getNascimento(){
				return $this->nascimento;
			}
			function getPais(){
				return $this->pais;
			}
			function setNome($_nome){
				$this->nome=$_nome;
			}
			function setUf($_uf){
				$this->uf=$_uf;
			}
			function setSobrenome($_sobrenome){
				$this->sobrenome=$_sobrenome;
			}
			function setNascimento($_nascimento){
				$this->nascimento=$_nascimento;
			}
			function setCidade($_cidade){
				$this->cidade=$_cidade;
			}
			function setPais($_pais){
				$this->pais=$_pais;
			}
			
		}
	?>
</body>
</html>