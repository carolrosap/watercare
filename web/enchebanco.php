<?php
	include("includes/conexao.php");
	session_start();
	
	for($i=0;$i<=14;$i++){
		$num=rand ( 1 , 3);
		$day=rand(48,60);
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
			//echo $litros . "LITROS CONSUMIDOS";
			$datetime=$dia." " . $hora;	
		}
		if($num==1){
			//$ndia="";
			//$nhora="";
			$nbateria=$bateria-3;
			//$nlitros=$litros+1;
			$new = date('Y-m-d H:i:s', strtotime("+" . $day . "hours", strtotime($datetime)));
			$datahora=explode(" ",$new);
			$ndia=$datahora[0];
			$nhora=$datahora[1];
			

		}
		if($num==2){
			//$ndia="";
			//$nhora="";
			$nbateria=$bateria-4;
			$new = date('Y-m-d H:i:s', strtotime("+" . $day. "hours", strtotime($datetime)));
			//$nlitros=$litros+1;
			//echo $new = date('Y-m-d H:i:s', strtotime('+47 hours', strtotime($datetime)));
			$datahora=explode(" ",$new);
			$ndia=$datahora[0];
			$nhora=$datahora[1];
		
		}
		if($num==3){
			//$ndia="";
			//$nhora="";
			$nbateria=$bateria-5;
			//$nlitros=$litros+1;
			$new = date('Y-m-d H:i:s', strtotime("+" . $day. "hours", strtotime($datetime)));
			//echo $new . "<br>";
			$datahora=explode(" ",$new);
			//var_dump($datahora);
			$ndia=$datahora[0];
			$nhora=$datahora[1];
		
		}
		
		
		$taxa="4.40";
		$nlitros=$litros+1;
		$nvalor=$taxa*$nlitros;
		
		//echo $nvalor . "<br>";
		//echo $litros+1 . "<br>";
		
		
		//echo date('Y:m:d h:i:s') . "<br>";
		//$dia="2015-07-01";
		//$hora="12:00:00";
		//echo "<br>";
		//$datetime=$dia." " . $hora;
		/*
		echo "<br>";
		echo $datetime;
		echo date('Y-m-d H-i', strtotime("+3 days",strtotime($datetime)));
		echo "<br>";
	echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";*/
		//echo $last_access = date('Y-m-d H:i:s', strtotime('+62 hours', strtotime($datetime)));
	
		
		$sql="INSERT INTO `consumo` (`id_usuario`, `valor_total`, `data`, `hora`, `bateria`, `litros_consumidos`, `id_dispositivo`) VALUES
(44, '" . $nvalor . "', '" . $ndia . "', '"  . $nhora . "', " . $nbateria . ", " . $nlitros . ", 3);";

		$mysqli->query($sql);
	}
?>