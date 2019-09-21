<?php 
 require_once('jpgraph.php'); 
require_once ('jpgraph_line.php');$datay1 = array(14,17,11);$graph = new Graph(600,420); 
$graph->SetScale('textlin');
	$theme_class=new UniversalTheme;$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Gasto anual em m³');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle('solid');
$graph->xaxis->SetTickLabels(array('Julho','Agosto','Setembro'));
$graph->xgrid->SetColor('#E3E3E3');
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor('#6495ED');
$p1->SetLegend('2015');

$graph->legend->SetFrameWeight(1);
$graph->Stroke();?>