<h4>Preencha os campos abaixo com os seus dados</h4>
<form name="cadastro" action="#" method="POST">
	Nome
	<input class="name" type="text" name="nome" value="<?=$_POST['nome']?>"><br>
	<br>
    Sobrenome
	<input class="nuber" type="text" name="sobrenome" value="<?=$_POST['sobrenome']?>" ><br>
   	<br>
    Data de Nascimento
    <input class="nuber" type="date" name="data_nasc" value="<?=$_POST['data_nasc']?>"><br>
    <br>
    Endereço
    <input class="mail2" type="text" name="endereco" value="<?=$_POST['endereco']?>"><br>
    <br>
    Cidade
    <input class="mail2" type="text" name="cidade" value="<?=$_POST['cidade']?>"><br>
    <br>
    Estado
    <input class="mail2" type="text" name="estado" value="<?=$_POST['estado']?>"><br>
    <br>
    País
	<input class="mail2" type="text" name="pais" value="<?=$_POST['pais']?>"><br>
	<br>
    Email
    <input class="mail2" type="text" name="email" value="<?=$_POST['email']?>"><br>
	<br>
    Nome de Usuário
    <input class="mail2" type="text" name="usuario" value="<?=$_POST['usuario']?>"><br>
    <br>
    Senha
    <input class="mail2" type="password" name="senha" value="<?=$_POST['senha']?>"><br>
  	<br>
    <button type="clear" class="btn btn-info mrgn-can">Limpar</button>
    <button type="submit" class="btn btn-info mrgn-can" name="cadastrar" value="cadastrar">Cadastrar</button>
</form>
<?php
	include("includes/conexao.php");
	include("classes/Usuario.class.php");
	//$user=new Usuario(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	if(!empty($_POST['cadastrar'])){		
		if(!empty($_POST['nome']) 
		&& !empty($_POST['sobrenome']) 
		&& !empty($_POST['data_nasc']) 
		&& !empty($_POST['pais']) 
		&&!empty($_POST['estado'])
		&& !empty($_POST['cidade']) 
		&& !empty($_POST['email'])
		//&& !empty($_FILES['foto']['tmp_name']) 
		&& !empty($_POST['usuario']) 
		&& !empty($_POST['senha'])){
			$user2=new Usuario($_POST['usuario'],$_POST['senha'],$_POST['nome'],$_POST['sobrenome'],$_POST['data_nasc'],$_POST['cidade'],$_POST['pais'],NULL,$_POST['estado'],$_POST['email'],NULL);
			
			$cadastro=$user2->incluiUsuario($mysqli);
			//$user2->cadastraFoto($_FILES['foto'],$mysqli);
			if($cadastro=="ok"){
				header("location:login.php?ok=1");	
			}
		}else{
			echo "Todos os campos devem ser preenchidos";
	
		}
	}
	//$_username,$_senha,$_picture,$_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_id,$_uf,$_email)
?>