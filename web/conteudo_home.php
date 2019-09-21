<?php
	session_start();
	//include("sessao_cookie_login.php");
	include("includes/conexao.php");
	include("classes/Usuario.class.php");
	include("classes/Dispositivo.class.php");
	include("classes/Consumo.class.php");
	$user=new Usuario($_SESSION['user'],$_SESSION['senhaUsuario'],NULL,NULL,NULL,NULL,NULL,$_SESSION['idUsuario'],NULL,$_SESSION['emailUsuario']);
	
						//echo $_SESSION['senhaUsuario'];
						//echo $_SESSION['emailUsuario'];
						//echo $_SESSION['user'];
	$dispositivo=new Dispositivo(NULL,$user->getIdUsuario(),NULL,NULL);
	if($dispositivo->verifica($mysqli)){ ?>
		<div class="col-md-6 txt1">
        </br>
		<h5>Você já tem seu dispositivo cadastrado.</h5>
        <h5>Agora você pode acompanhar seus gastos detalhadamente no menu abaixo ou ter um panorama geral no botão "Consumo" ao lado.</h5>
		
</div>
      <?
	}else{
		//echo "nao tem";
		?>
    
    <div class="col-md-6 txt1">
		<h5>Você ainda não cadastrou um dispositivo.</h5>
		<a href="cadastro_dispositivo.php"><p style="text-transform: lowercase;">Clique aqui para cadastrar</a></p>
         <p style="text-transform: lowercase;">Não se esqueça de ter o serial do dispositivo em mãos</p>
					</div>
    <?
	}
	
	/*$_username,$_senha,$_nome,$_sobrenome,$_nascimento,$_cidade,$_pais,$_id,$_uf,$_email
	$login=$user->login($mysqli);
	$_SESSION['idUsuario']=$this->idUsuario;
						$_SESSION['senhaUsuario']=$this->senha;
						$_SESSION['emailUsuario']=$this->email;
						$_SESSION['user']=$this->userName;/*/			
			//var_dump($user);
			//if($login=="ok"){
				//var_dump($user);
				//header("location:home.php");
			//}else{
				//echo $login;
			//}
	$consumo=new Consumo($_SESSION['idDispositivo'],$_SESSION['idUsuario'],NULL,NULL,NULL,NULL,NULL);
		
		
	
?>
	
    <img src="images/bateria.png" width="121" height="109" />Nível da Bateria do dispositivo: <? echo $consumo->bateria($mysqli) . "%"; ?> 
    <?php
		$bateria=$consumo->bateria($mysqli);
		if($bateria<=0){
			echo "Troque a bateria do dispositivo";
		}
	?>