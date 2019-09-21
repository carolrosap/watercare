<?php
	session_start();
	//include("sessao_cookie_login.php");
	include("includes/conexao.php");
	//include("includes/funcoes.php");
	include("classes/Dispositivo.class.php");
	include("classes/Consumo.class.php");
	$consumo=new Consumo($_SESSION['idDispositivo'],$_SESSION['idUsuario'],NULL,NULL,NULL,NULL,NULL);

		$ultimo=$consumo->ultimoMes($mysqli);
		$meses=$consumo->meses($mysqli);
		
		$litros=$consumo->litrosMes($ultimo,$mysqli);
		$reais=$consumo->faturaMes($ultimo,$mysqli);
		
?>	
	<div class="container">
		<div class="col-md-6" style="width:1200px;">
			
                
          </div>
	
   	
    </form>
	<div class="col-md-6 txt1" style="width:1200px;">
		<h3 STYLE="text-align-last:left;text-transform: none;">Litros Consumidos:</h3>
        <h1 STYLE="text-align-last:left;text-transform: none;"><?=$litros?> m³ = <?=$litros?> 000 litros</h1></br>
        <h3 STYLE="text-align-last:left;text-transform: none;"><?=$fatura?>Fatura em reais</h3>
        <h1 STYLE="text-align-last:left;text-transform: none;">R$ <?=$reais?> </h1>
        
       
		
		
		
       
</div>
<div class="clearfix"></div>
</div>
                