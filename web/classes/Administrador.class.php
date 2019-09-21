
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
	<?php
		include_once("Pessoa.class.php"); 
		class Administrador extends Pessoa{
			private $idAdmin;
			private $userName;
			private $senha;
			private $picture;
			private $cargo;
			
		
			function setUserName($_user){
				$this->userName=$_user;
			}
			function setCargo($_cargo){
				$this->cargo=$_cargo;
			}
			function getCargo(){
				return $this->cargo;
			}	
			function setSenha($_senha){
				$this->senha=$_senha;
			}
			function setPicture($_picture){
				$this->picture=$_picture;
			}
			function getUserName(){
				return $this->userName;
			}
			function getSenha(){
				return $this->senha;
			}
			
			
			
			function __construct($_username,$_senha,$_picture,$_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_cargo,$_id){
				parent::__construct($_nome,$_sobrenome,$_nascimento,$_cidade,$_pais);
				$this->userName=$_username;
				$this->senha=$_senha;
				$this->picture=$_picture;
				$this->cargo=$_cargo;
				$this->idAdmin=$_id;
			}
			function incluiAdmin($mysqli){
				$query="INSERT INTO administrador(nome,sobrenome,data_nasc,cidade,estado,pais,username,senha,cargo) VALUES('$this->nome','$this->sobrenome','$this->nascimento','$this->cidade','$this->estado','$this->pais','$this->username','$this->senha','$this->cargo')";
				$mysqli->query($query);
			}
			function removeAdmin($mysqli){
				$query="DELETE FROM administrador WHERE id_admin=$this->idAdmin";
				$mysqli->query($query);
			}
			function alteraUsuario($mysqli){
				$query="UPDATE administrador SET nome='$this->nome',sobrenome='$this->sobrenome',data_nasc='$this->nascimento',cidade='$this->cidade',estado='$this->estado',pais='$this->pais',username='$this->userName',senha='$this->senha',cargo='$this->cargo' where id_admin=$this->idAdmin";
				$mysqli->query($query);
			}
			function listaUsuario($mysqli){
				$query="SELECT*FROM administrador";
				$resultado=$mysqli->query($query);
				while($linha=$resultado->fetch_array()){
					$admin[]=$linha;
				}
				return $admin;
			}
		}
	?>
</body>
</html>