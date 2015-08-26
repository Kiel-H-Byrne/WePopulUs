<?php
include_once ("graph/jpgraph.php");
include_once ("graph/jpgraph_pie.php");

// Some data

if (isset($_GET['full']))
{
	$data[] = $_GET['full'];
	$titles[] = 'Full and open competition %d';
}

if (isset($_GET['exlusion']))
{
	$data[] = $_GET['exlusion'];
	$titles[] = "Competition after exclusion of sources";
}
if (isset($_GET['one_bid']))
{
	$data[] = $_GET['one_bid'];
	$titles[] = "Full and open competition but only one bid";
}
if (isset($_GET['follow_on']))
{
	$data[] = $_GET['follow_on'];
	$titles[] = "Follow on contract";
}
if (isset($_GET['not_available']))
{
	$data[] = $_GET['not_available'];
	$titles[] = "Not available for competition";
}
if (isset($_GET['no_comp']))
{
	$data[] = $_GET['no_comp'] ;
	$titles[] = "Not competed";
}
if (isset($_GET['unknown']))
{
	$data[] = $_GET['unknown'];
	$titles[] = "Unkown";
}

// Create the Pie Graph. 
$graph = new PieGraph(300,400,'auto');
//$graph->SetShadow();

// Set A title for the plot
$graph->title->Set("Competition");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Create
$p1 = new PiePlot($data);
$p1->SetCenter(0.5,0.3);

$p1->SetLegends($titles);
$graph->legend->Pos(0.01,0.6,'left','top');
$graph->legend->SetLayout(LEGEND_VERT);  

/*$targ=array("pie_csimex1.php#1","pie_csimex1.php#2","pie_csimex1.php#3",
"pie_csimex1.php#4","pie_csimex1.php#5","pie_csimex1.php#6");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$p1->SetCSIMTargets($targ,$alts);*/

$graph->Add($p1);


// Send back the HTML page which will call this script again
// to retrieve the image.
$graph->Stroke();
?>