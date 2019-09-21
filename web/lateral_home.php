<div class="col-md-4 cnt-pg">
	<p><h4>Seu painel</h4>
    
	<ul>
		<li><a href="consumo.php" target="_blank"> <button type="button" class="btn btn-warning but1" href="sobre.php">Consumo</button></a></li>
       	<li><a href="cadastro_dispositivo.php?id=<?=$_SESSION['idDispositivo']?>" target="_blank"> <button type="button" class="btn btn-warning but1">Configurações Dispositivo</button></a></li>
        
        <li><a href="cadastro_residencia.php" target="_blank"> <button type="button" class="btn btn-warning but1">Informações da Residência</button></a></li>
        <li><a href="cadastro.php?id=<?=$_SESSION['idUsuario']?>" target="_blank"> <button type="button" class="btn btn-warning but1">Atualizar cadastro</button></a></li>
        
	</ul>
</div>