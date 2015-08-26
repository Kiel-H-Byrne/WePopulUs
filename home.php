<?php 
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); //put before session_starts
if (isset($_REQUEST['_SESSION'])) die("Stop trying to hack!");

$page=$_GET['loc']; 
if (empty($page)) { $page=''; } 

require_once('lib/keys.php');
include("head.php");
include("main.php");
include("side.php");
echo '<div id="bod">';

function load($page) { 
		switch ($page) { 
		case "sp":
		include ("myspending.php"); 	
		break;
		case "reps": 	
		include ("myreps.php"); 	
		break;
		case "bills": 	
		include ("mybills.php"); 	
		break;
		case "fx": 	
		include ("mygrafx.php"); 	
		break;
		case "about": 	
		include ("about.php"); 	
		break;		
		default:
		include_once('lib/functions_misc.php');
		include ("myhome.php");
		break; }}
load($page);
 
echo '</div><!--end bod div-->';?>

<script type="text/javascript">
//<![CDATA[
	element = document.getElementById("finding_location");
	element.style.display = "none";
//]]>
</script>

<?
include("foot.php");
function clean() {
foreach($_SESSION as $key=>$value) {
	if (empty($_SESSION["$key"])) {unset($_SESSION["$key"]);}
	/* DO NOT SHOW PUBLIC YOUR SESSION VARIABLES 
    echo '
    <!-- sesh|'.$key.'| '.$value.' -->'; /**/
}}
if (!empty($_SESSION)) clean();
?>