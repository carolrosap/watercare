<?php
	session_start();
	include("includes/conexao.php");
	include("classes/Usuario.class.php");
	include("classes/Dispositivo.class.php");
	if($_SESSION['idDispositivo']==""){
		$bt="cadastrar";
		$_GET['id']=$_SESSION['idDispositivo'];
	}elseif($_SESSION['idDispositivo']!="" && $_POST['id']==""){
		$bt="atualizar";
		//$_GET['id']=$_SESSION['idDispositivo'];
		$dispositivo1=new Dispositivo($_SESSION['idDispositivo'],$_SESSION['idUsuario'],NULL,NULL);
		$dispositivo1->consultaDispositivo($mysqli);
		$_POST['tarifa']=$dispositivo1->getTarifa();
		$_POST['serial']=$dispositivo1->getSerial();
	}elseif($_SESSION['idDispositivo']!="" && $_POST['id']!=""){
		$bt="atualizar";
	}
?>

<h4>Preencha os campos abaixo com os seus dados</h4>
<form name="cadastro" action="#" method="POST">
	Serial
	<input class="name" type="text" name="serial" value="<?=$_POST['serial']?>"><br>
    <input class="name" type="hidden" name="id" value="<?=$_SESSION['idDispositivo']?>">
	<br>
    Tarifa (da companhia do fornecimento de água)
	<input class="name" type="text" name="tarifa" value="<?=$_POST['tarifa']?>" ><br>
   	<br>
    <button type="clear" class="btn btn-info mrgn-can">Limpar</button>
    <button type="submit" class="btn btn-info mrgn-can" name="botao" value="<?=$bt?>"><?=$bt?></button>
</form>
<?php
	
	//$user=new Usuario(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	if($_POST['botao']=="cadastrar"){		
		if(!empty($_POST['serial']) 
		&& !empty($_POST['tarifa']) 
		){
			$dispositivo=new Dispositivo(NULL,$_SESSION['idUsuario'],$_POST['serial'],$_POST['tarifa']);
			//var_dump($dispositivo);
			echo $_SESSION['idUsuario'];
			//echo $_SESSION['idUsuario'];
						//echo $_SESSION['senhaUsuario'];
						//echo $_SESSION['emailUsuario'];
						//echo $_SESSION['user'];
			
			$cadastro=$dispositivo->incluiDispositivo($mysqli);
			//$user2->cadastraFoto($_FILES['foto'],$mysqli);
			if($cadastro=="ok"){
				header("location:home.php?ok=1");	
			}else{
				echo "Erro ao cadastrar";
			}
			}else{
			echo "Todos os campos devem ser preenchidos";
	
		}
	
	}elseif($_POST['botao']=="atualizar"){
		if(!empty($_POST['serial']) 
		&& !empty($_POST['tarifa']) 
		){
			$dispositivo3=new Dispositivo($_SESSION['idDispositivo'],$_SESSION['idUsuario'],$_POST['serial'],$_POST['tarifa']);
			
			//echo $dispositivo3->atualiza($mysqli);
			if($dispositivo3->atualiza($mysqli)){
				header("location:home.php?ok=2");	
			}else{
				echo "Erro ao atualizar";
				//var_dump($dispositivo3);
			}
			
			
		}else{
			echo "Todos os campos devem ser preenchidos";
		
		}
		
	}
	//$_username,$_senha,$_picture,$_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_id,$_uf,$_email)
?>