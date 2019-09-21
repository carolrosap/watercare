<?php
	function converteM($term, $tp) {
    if ($tp == "1") $palavra = strtr(strtoupper($term),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    elseif ($tp == "0") $palavra = strtr(strtolower($term),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
    return $palavra;
}
function alert($a,$r) {
	if($r!=''){
		$location = "location.href='".$r."';";
	}else{
		$location = "";
	}
	echo "<SCRIPT LANGUAGE=\"JAVASCRIPT\"> alert('".$a."'); $location</SCRIPT>";
}
function saudacao(){
	$hr = date(" H ");
	if($hr >= 12 && $hr<18) {
		$resp = "Boa tarde";}
	else if ($hr >= 0 && $hr <12 ){
		$resp = "Bom dia";}
	else {
		$resp = "Boa noite";
	}
	return $resp;
}
function vetorMeses($ano){
	$mes=array(
			array("Mes"=>Janeiro,"inicio"=>"$ano-01-01","fim"=>"$ano-01-31"),
			array("Mes"=>Fevereiro,"inicio"=>"$ano-02-01","fim"=>"2015-02-28"),	
			array("Mes"=>Marco,"inicio"=>"$ano-03-01","fim"=>"$ano-03-31"),
			array("Mes"=>Abril,"inicio"=>"$ano-04-01","fim"=>"$ano-04-30"),
			array("Mes"=>Maio,"inicio"=>"$ano-05-01","fim"=>"$ano-05-31"),
			array("Mes"=>Junho,"inicio"=>"$ano-06-01","fim"=>"$ano-06-30"),
			array("Mes"=>Julho,"inicio"=>"$ano-07-01","fim"=>"$ano-07-31"),
			array("Mes"=>Agosto,"inicio"=>"$ano-08-01","fim"=>"$ano-08-31"),
			array("Mes"=>Setembro,"inicio"=>"$ano-09-01","fim"=>"$ano-09-30"),
			array("Mes"=>Outubro,"inicio"=>"$ano-10-01","fim"=>"$ano-10-31"),
			array("Mes"=>Novembro,"inicio"=>"$ano-11-01","fim"=>"$ano-11-30"),
			array("Mes"=>Dezembro,"inicio"=>"$ano-12-01","fim"=>"$ano-12-31")
);
	return $mes;
}
function mesExtenso($mes) {
	switch ($mes) {
		case 1:
		   $m = "Janeiro";
		break;
		case 2:
		  $m = "Fevereiro";
		break;
		  case 3:
		  $m = "Março";
		break;
		  case 4:
		  $m = "Abril";
		break;
		  case 5:
		  $m = "Maio";
		break;
		  case 6:
		  $m = "Junho";
		break;
		  case 7:
		  $m = "Julho";
		break;
		  case 8:
		  $m = "Agosto";
		break;
		  case 9:
		  $m = "Setembro";
		break;
		  case 10:
		  $m = "Outubro";
		break;
		  case 11:
		  $m = "Novembro";
		break;
		  case 12:
		  $m = "Dezembro";
		break;
	}
	return $m;
}
function dataExtenso($data) {
	$data=explode("-",$data);
	
	$dia = $data[2];
	$mes = mesExtenso($data[1]);
	$ano = $data[0];
	return $dia." de ".$mes." de ".$ano;
}
?>
