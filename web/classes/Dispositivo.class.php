<?php
		 
		class Dispositivo{
			private $idDispositivo;
			private $idUsuario;
			private $serial;
			private $tarifa;
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
			function getSerial(){
				return $this->serial;
			}
			function setSerial($_serial){
				$this->serial=$_serial;
			}
			function getTarifa(){
				return $this->tarifa;
			}
			function setTarifa($_tarifa){
				$this->tarifa=$_tarifa;
			}
			function __construct($_idDispositivo,$_idUsuario,$_serial,$_tarifa){
				$this->idDispositivo=$_idDispositivo;
				$this->serial=$_serial;
				$this->idUsuario=$_idUsuario;
				$this->tarifa=$_tarifa;
			}
			function verifica($mysqli){
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
			}
			
		}
		
	?>
</body>
</html>