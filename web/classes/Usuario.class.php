
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
	<?php
		include_once("Pessoa.class.php"); 
		class Usuario extends Pessoa{
			private $idUsuario;
			private $userName;
			private $senha;
			private $picture;
			private $email;
			function getEmail(){
				return $this->email;
			}
			function setEmail($_email){
				$this->email=$_email;
			}
			function getIdUsuario(){
				return $this->idUsuario;
			}
			
			function setUserName($_user){
				$this->userName=$_user;
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
			function getPicture(){
				return $this->picture;
			}
			
			
			function __construct($_username,$_senha,$_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_id,$_uf,$_email){
				parent::__construct($_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_uf);
			
				$this->userName=$_username;
				$this->senha=$_senha;
				$this->idUsuario=$_id;
				$this->email=$_email;
			}
			function incluiUsuario($mysqli){
				//echo "oi";
				//echo $this->userName;
				//$this->getNascimento
				//echo $this->getNome();
				/*$query="INSERT INTO usuario(nome,sobrenome,data_nasc,cidade,estado,pais,username,senha) VALUES('$this->getNome()','$this->getSobrenome()','$this->getNascimento()','$this->getCidade()','$this->getEstado()','$this->getPais()','$this->username','$this->senha')";*/
				$query="INSERT INTO usuario(nome,sobrenome,data_nasc,cidade,estado,pais,username,senha,email) 
				VALUES('$this->nome','$this->sobrenome','$this->nascimento','$this->cidade','$this->uf','$this->pais','$this->userName','$this->senha','$this->email')";
				$mysqli->query($query);
				if($mysqli->affected_rows){
					echo $mysqli->insert_id;
					$this->idUsuario=$mysqli->insert_id;
					return "ok";
					
				}else{
					return "erro";
				}
			}
			function cadastraFoto($foto,$mysqli){
				echo "oi";
				echo $foto['name'];
				//var_dump($foto);
				
				if($foto['tmp_name'] !=""){
					$part = converteM(substr($foto['name'],-4), 0);
					if ($part == ".jpg" || $part == ".jpeg" || $part == ".png" || $part == ".gif"){	
						if($foto['size'] <= 5242880){// Limite de 5MG
							$arquivo_t  = $foto['tmp_name'];
						//mkdir("../../img/sport_jogador/", 0777);
							$a = move_uploaded_file($arquivo_t, "img/usuarios/".$foto['name']);
							if($a){
								
								$query="INSERT INTO foto_pessoa(nome_foto,id_usuario,ativo)VALUES('" . $foto['name'] . "',$this->idUsuario,1)";
								echo $query;
								$mysqli->query($query);
						}
					}else{
						alert("Não foi possível fazer o upload da imagem. Tamanho Max. de 5Mb excedido.", "");
					}
				}else{
					alert("Não foi possível fazer o upload da imagem. O formato deve ser gif ou jpg ou png.", "");
				}
			}
			}
			function login($mysqli){
				//echo "oi";
				//echo "SELECT * FROM usuario WHERE email='" . $this->email . "' AND senha='".$this->senha . "'";
				$query="SELECT * FROM usuario WHERE username='" . $this->userName . "' AND senha='".$this->senha . "'";
				
				//echo "SELECT * FROM usuario WHERE email='" . $_POST['email'] . " AND senha='".$_POST['senha'] . "'";
				$resultado=$mysqli->query($query);
				if($resultado->num_rows){
					while($linha=$resultado->fetch_object()){
						$this->idUsuario=$linha->id_usuario;
						$this->email=$linha->email;
						$_SESSION['idUsuario']=$this->idUsuario;
						$_SESSION['senhaUsuario']=$this->senha;
						$_SESSION['emailUsuario']=$this->email;
						$_SESSION['user']=$this->userName;
						setcookie("tempo","existe",time()+3600);
						//echo $_SESSION['idUsuario'];
						//echo $_SESSION['senhaUsuario'];
						//echo $_SESSION['emailUsuario'];
						//echo $_SESSION['user'];
						//echo $this->userName;
						
					}
					return "ok";
				}else{
					return "Usuario ou senha est&atilde;o incorretos";
				}
				//while($linha=mysql
				
			

			}
			function removeUsuario($mysqli){
				$query="DELETE FROM usuario WHERE id_usuario=$this->idUsuario";
				$mysqli->query($query);
			}
			function alteraUsuario($mysqli){
				$query="UPDATE usuario SET nome='$this->getNome()',sobrenome='$this->getSobrenome()',data_nasc='$this->getNascimento()',cidade='$this->getCidade()',estado='$this->getEstado()',pais='$this->getPais()',username='$this->userName',senha='$this->senha' where id_usuario=$this->idUsuario";
				$mysqli->query($query);
			}
			function listaUsuario($mysqli){
				$query="SELECT*FROM usuario";
				$resultado=$mysqli->query($query);
				while($linha=$resultado->fetch_array()){
					$usuario[]=$linha;
				}
				return $usuario;
			}
			
			//faltou da foto
			//colocar get
		}
		
	?>
</body>
</html>