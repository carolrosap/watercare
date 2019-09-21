<?php
//include("includes/FusionCharts/FusionCharts.php");


include("sessao_cookie.php");
include("includes/conexao.php");
include("includes/funcoes.php");
include("classes/Consumo.class.php");
	$consumo=new Consumo($_SESSION['idDispositivo'],$_SESSION['idUsuario'],NULL,NULL,NULL,NULL,NULL);
	
	
	$inicio="<?php \n require_once('jpgraph.php'); 
require_once ('jpgraph_line.php');";
	$meio='$datay1 = array(';
	$meses=$consumo->meses($mysqli);
	$num=count($meses);
	foreach($meses as $indice => $mes){
		$fatura=$consumo->litrosMes($mes,$mysqli);
		if($indice+1!=$num){	
			$meio.=$fatura . ",";
		}else{
			$meio.=$fatura;
		}
	}
	$meio.=");";
	$meio.='$graph = new Graph(600,420); 
$graph->SetScale(\'textlin\');
	$theme_class=new UniversalTheme;';
	/*$datay1 = array(20,15,23,15);
$datay2 = array(12,9,42,8);
$datay3 = array(5,17,32,24);


 //ok 
*/
	$meio.='$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set(\'Gasto anual em m³\');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle(\'solid\');
$graph->xaxis->SetTickLabels(array(';
foreach($meses as $indice => $mes){
	$extenso=mesExtenso($mes);	
	if($indice+1!=$num){
		$meio.="'". $extenso . "',";
	}else{
		$meio.="'". $extenso . "'";
	}
}
	$meio.="));";
	$meio.='
$graph->xgrid->SetColor(\'#E3E3E3\');';

// Create the first line
	$meio.=	'
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor(\'#6495ED\');
$p1->SetLegend(\'2015\');';

$meio.='

$graph->legend->SetFrameWeight(1);';

// Output line
$meio.='
$graph->Stroke();';
$fim="?>";
$fp=fopen("jpgraph/montagrafico2.php", 'w+');
fwrite($fp, $inicio);
fwrite($fp, $meio);
fwrite($fp, $fim);
fclose($fp);



	/*
	$fim="</chart>";
						
						$fp=fopen("jpgraph/montagrafico.php", 'w+');
						fwrite($fp, $inicio);
						while($outros=mysql_fetch_object($iselOutros)){
							$meio="<set label='" .$outros->resposta. " ' value='" . $outros->votos."' />\n";
							fwrite($fp, $meio);
						}
						fwrite($fp, $fim);*/

?>