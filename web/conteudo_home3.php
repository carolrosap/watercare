<?php
	session_start();
	//include("sessao_cookie_login.php");
	include("includes/conexao.php");
	//include("includes/funcoes.php");
	include("classes/Dispositivo.class.php");
	include("classes/Consumo.class.php");
	$consumo=new Consumo($_SESSION['idDispositivo'],$_SESSION['idUsuario'],NULL,NULL,NULL,NULL,NULL);
	if($_POST['enviar']==""){
		$ultimo=$consumo->ultimoMes($mysqli);
		$meses=$consumo->meses($mysqli);
		//$consumo->faturaMes($m,$mysqli);
		if($_POST['mes']=="" && $_POST['inicio']=="" && $_POST['fim']==""){
		$fatura=$consumo->faturaMes($ultimo,$mysqli);
		}
	}else{
		$meses=$consumo->meses($mysqli);
		if($_POST['mes']!="" && $_POST['inicio']=="" && $_POST['fim']==""){
			$ultimo=$_POST['mes'];
			$fatura=$consumo->faturaMes($_POST['mes'],$mysqli);
		}elseif($_POST['inicio']!="" || $_POST['fim']!=""){
			$fatura=$consumo->faturaPeriodo($_POST['inicio'],$_POST['fim'],$mysqli);
			$ultimo=$_POST['mes'];
			echo "oi";
		}	
	}
?>	
	<div class="container">
		<div class="col-md-6" style="width:1200px;">
			<form name="fatura" action="#" method="POST">
    			<div class="list-group list-group-alternate"> 
				<p  class="list-group-item">Mês  
                	<select name="mes" >
                    	<? foreach($meses as $mes){ ?>      
        				<option value="<?=$mes?>" <? if($mes==$ultimo) echo "selected"; ?> ><? echo mesExtenso($mes) ?></option>
                        <? } ?>
        			</select>
                  	<i class="ti ti-email"></i> </p> 
                <p  class="list-group-item">Período </br> 
                	Início<input type="date" name="inicio" value="<?=$_POST['inicio']?>" />
                    Fim<input type="date" name="fim" value="<?=$_POST['fim']?>">
        				
        			</select>
                  	<i class="ti ti-email"></i></br><input type="submit" name="enviar" value="filtrar"> </p>
								
				</div>
                
          </div>
	
   	
    </form>
	<div class="col-md-6 txt1" style="width:1200px;">
		
        <h3 STYLE="text-align-last:left;">R$ <?=$fatura?></h3>
        <p style="color:#000;text-transform: none;text-align: right;">Fatura de água do mês de <? echo mesExtenso($mes)?></p>
        <? if(!empty($_POST['inicio']) && !empty($_POST['fim'])){ ?> 
        <p style="color:#000;text-transform: none;text-align: right;">Período de:  <? echo dataExtenso($_POST['inicio'])?> à <? echo dataExtenso($_POST['fim'])?></p>
		
		<? } ?>
        
		<p style="color:#000;text-transform: none;text-align: right;"><a href="grafico_reais.php?mes=<?=$mes?>&inicio=<?=$_POST['inicio']?>&fim=<?=$_POST['fim']?>">Gráfico</a></p>
       
</div>
<div class="clearfix"></div>
</div>
                