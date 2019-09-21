<?php
	if($_GET['ok']!=""){ ?>
			<h4>Usuário cadastrado com sucesso!</h4>
	<? }  ?>

<h4>Digite o seu nome de usuário e senha para logar-se no sistema</h4>
<form action="#" name="login" method="POST">
	Login
    <input class="mail2" type="text" name="usuario" value="<?=$_POST['usuario']?>"><br>
    <br>
    Senha
    <input class="mail2" type="password" name="senha" value="<?=$_POST['senha']?>"><br>
    <br>
    <button type="clear" class="btn btn-info mrgn-can">Limpar</button>
	<button type="submit" class="btn btn-info mrgn-can" name="enviar" value="enviar">Acessar</button>
</form>
<?php
	session_start();
	//include("sessao_cookie_login.php");
	include("includes/conexao.php");
	include("classes/Usuario.class.php");
	if(!empty($_POST['enviar'])){
		if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
			$user=new Usuario($_POST['usuario'],$_POST['senha'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
			$login=$user->login($mysqli);
			
			//var_dump($user);
			if($login=="ok"){
				//var_dump($user);
				header("location:home.php");
			}else{
				echo $login;
			}
		}else{
			echo "Todos os campos devem ser preenchidos";
		}
	}
	
?>