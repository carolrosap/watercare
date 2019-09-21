<?php
		 
		class Consumo{
			private $idConsumo;
			private $idDispositivo;
			private $idUsuario;
			private $data;
			private $hora;
			private $bateria;
			private $litros;
			private $valorTotal;
			function getIdDispositivo(){
				return $this->idDispositivo;
			}
			function setIdDispositivo($_idD){
				$this->idDispositivo=$_idD;
			}
			function getIdUsuario(){
				return $this->idUsuario;
			}
			function setIdUsuario($_idU){
				return $this->idUsuario=$_idU;
			}
			function getData(){
				return $this->data;
			}
			function setData($_data){
				$this->data=$_data;
			}
			function getHora(){
				return $this->hora;
			}
			function setValorTotal($_valor){
				$this->valorTotal=$_valor;
			}
			function getValorTotal(){
				return $this->valorTotal;
			}
			function getBateria(){
				return $this->bateria;
			}
			function setBateria($_bateria){
				$this->bateria=$_bateria;
			}
			function getLitros(){
				return $this->litros;
			}
			function setLitros($_litros){
				$this->litros=$_litros;
			}
			function __construct($_idDispositivo,$_idUsuario,$_data,$_hora,$_bateria,$_litros,$_valor){
				$this->idDispositivo=$_idDispositivo;
				$this->litros=$_litros;
				$this->idUsuario=$_idUsuario;
				$this->bateria=$_bateria;
				$this->data=$_data;
				$this->hora=$_hora;
				$this->valorTotal=$_valor;
			}
			function ultimoMes($mysqli){
				$sql="SELECT DATE_FORMAT( 
						DATA ,  '%m' ) AS  'data'
						FROM consumo
						WHERE id_consumo = ( 
						SELECT MAX( id_consumo ) 
						FROM consumo ) AND id_dispositivo =$this->idDispositivo";
						
				$resultado=$mysqli->query($sql);
				
				$linha=$resultado->fetch_object();
				$mes=$linha->data;
				return $mes;
						
			}
			function meses($mysqli){
				$sql="SELECT DATE_FORMAT( 
						DATA ,  '%m' ) AS  'meses'
						FROM consumo
						WHERE id_dispositivo =$this->idDispositivo
						GROUP BY meses";
				$resultado=$mysqli->query($sql);
				
				while($linha=$resultado->fetch_object()){
					$meses[]=$linha->meses;
				}
				return $meses;
						
			}
			function faturaMes($mes,$mysqli){
				$sql="SELECT * 
					FROM  `consumo` 
					WHERE DATE_FORMAT( 
					DATA ,  '%m' ) =$mes
					AND id_dispositivo =$this->idDispositivo
					AND id_consumo = ( 
SELECT MAX( id_consumo ) 
FROM consumo
WHERE DATE_FORMAT( 
DATA ,  '%m' ) =$mes )"; 
				$resultado=$mysqli->query($sql);
				$linha=$resultado->fetch_object();
				$this->valorTotal=$linha->valor_total;
				return $linha->valor_total;	
				
			}
			function litrosMes($mes,$mysqli){
				$sql="SELECT * 
					FROM  `consumo` 
					WHERE DATE_FORMAT( 
					DATA ,  '%m' ) =$mes
					AND id_dispositivo =$this->idDispositivo
					AND id_consumo = ( 
SELECT MAX( id_consumo ) 
FROM consumo
WHERE DATE_FORMAT( 
DATA ,  '%m' ) =$mes )"; 
				$resultado=$mysqli->query($sql);
				$linha=$resultado->fetch_object();
				$this->litros=$linha->litros_consumidos;
				return $linha->litros_consumidos;	
				
			}
			function bateria($mysqli){
				$sql="SELECT * 
					FROM  `consumo` 
					WHERE id_dispositivo =$this->idDispositivo
					AND id_consumo = ( 
SELECT MAX( id_consumo ) 
FROM consumo
WHERE id_dispositivo=$this->idDispositivo )";
				$resultado=$mysqli->query($sql);
				$linha=$resultado->fetch_object();
				$this->bateria=$linha->bateria;
				return $linha->bateria;
				
			}
			function litrosPeriodo($inicio,$fim,$mysqli){
				$sql="SELECT * 
FROM  `consumo` 
WHERE DATA >=  '$inicio'
AND DATA <=  '$fim'
AND id_dispositivo =3
ORDER BY id_consumo DESC "; 
				$resultado=$mysqli->query($sql);
				$linha=$resultado->fetch_object();
				$this->litros=$linha->litros_consumidos;
				//echo $linha->valor_total;
				return $linha->litros_consumidos;
			
			
			}
			
			function faturaPeriodo($inicio,$fim,$mysqli){
				$sql="SELECT * 
FROM  `consumo` 
WHERE DATA >=  '$inicio'
AND DATA <=  '$fim'
AND id_dispositivo =3
ORDER BY id_consumo DESC "; 
				$resultado=$mysqli->query($sql);
				$linha=$resultado->fetch_object();
				$this->valorTotal=$linha->valor_total;
				//echo $linha->valor_total;
				return $linha->valor_total;
			
			
			}
			

			/*function verifica($mysqli){
				$sql="SELECT*FROM dispositivo where id_usuario=$this->idUsuario";
				//echo "SELECT*FROM dispositivo where id_usuario=$this->idUsuario";
				$resultado=$mysqli->query($sql);
				while($linha=$resultado->fetch_object()){
					$this->idDispositivo=$linha->id_dispositivo;
					$this->serial=$linha->serial;
					$this->tarifa=$linha->tarifa;
					$this->idUsuario=$linha->id_usuario;
					$_SESSION['idDispositivo']=$this->idDispositivo;
				}
				if($resultado->num_rows){
					return TRUE;	
				}else{
					return FALSE;
				}
			}
			function incluiDispositivo($mysqli){
				$query="INSERT INTO dispositivo(id_usuario,serial,tarifa) 
				VALUES($this->idUsuario,'$this->serial','$this->tarifa')";
				//echo "INSERT INTO dispositivo(id_usuario,serial,tarifa) 
				//VALUES($this->idUsuario,'$this->serial','$this->tarifa')";
				
				$mysqli->query($query);
				if($mysqli->affected_rows){
					//echo $mysqli->insert_id;
					$this->idDispositivo=$mysqli->insert_id;
					return "ok";
					
				}else{
					return "erro";
				}
			}
			function consultaDispositivo($mysqli){
				$query="SELECT*FROM dispositivo WHERE id_dispositivo=" . $this->idDispositivo;
				$resultado=$mysqli->query($query);
				while($linha=$resultado->fetch_object()){
					//$this->idDispositivo=$linha->id_dispositivo;
					$this->serial=$linha->serial;
					$this->tarifa=$linha->tarifa;
					//$this->idUsuario=$linha->id_usuario;
					//$_SESSION['idDispositivo']=$this->idDispositivo;
				}
				
			}
			function atualiza($mysqli){
				$query="UPDATE dispositivo SET tarifa='$this->tarifa', serial='$this->serial' WHERE id_dispositivo=$this->idDispositivo";
				echo "UPDATE dispositivo SET tarifa='$this->tarifa', serial='$this->serial' WHERE id_dispositivo=$this->idDispositivo";
				$resultado=$mysqli->query($query);
				if($resultado->affected_rows){
					return ok;	
				}else{
					return erro;
				}
			}*/
			
		}
		
	?>
</body>
</html>