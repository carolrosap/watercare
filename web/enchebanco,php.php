<?php
	include("includes/conexao.php");
	session_start();
	
	/*for($i=0;$i<=29;$i++){
		$num=rand ( 1 , 3);
		$sql="SELECT * 
			FROM consumo
			WHERE id_consumo = ( 
				SELECT MAX( id_consumo ) 
				FROM consumo )";
		$resultado=$mysqli->query($sql);
		while($linha=$resultado->fetch_object()){
			$dia=$linha->data;
			$hora=$linha->hora;
			$bateria=$linha->bateria;
			$litros=$linha->litros_consumidos;	
		}
		if($num==1){
			$ndia="";
			$nhora="";
			$nbateria=$bateria-2;
			$nlitros=$litros++;
			
			
		
		}*/
		echo date('Y:m:d h:i:s');
		$dia="2015-07-01";
	$hora="12:00:00";
		$data_venc=date('Y:m:d', strtotime("+2 days",strtotime($data)));
	
	
		
		$sql="INSERT INTO `consumo` (`id_consumo`, `id_usuario`, `valor_total`, `data`, `hora`, `bateria`, `litros_consumidos`, `id_dispositivo`) VALUES
(1, 44, '4.40', '2015-07-01', '00:12:00', 100, 1, 3);";
	//}
?>