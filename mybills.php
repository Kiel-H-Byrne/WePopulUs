<?php 
if (isset($_REQUEST['_SESSION'])) die("Stop trying to Hack!");
include_once("lib/functions_rep.php");
include_once("lib/functions_bill.php");
?>
<div id="finding_location"><img src="img/wait-wheel.gif" alt="" />Gathering Federal Legislative Data...</div>
<div id="billspage">

<div id="content">
<?
//-------------------------Call Functions-------------------------------

//sl_leg(); //gets age, all ids: Needs district|state | NO OUTPUT
/**/ //vs_last($_SESSION['lname']); //gets candidate ID /* not needed unless sunlight down */ 
if (isset($_REQUEST["bill"])) {
get_bill($_REQUEST["bill"]); 
vs_bill($_SESSION['votesmart_id']);} //vs bill search
else {
vs_bill($_SESSION['votesmart_id']);
new_bills();}

//nybill(); //ny only

?>
</div>

<p class="source">
All data gathered from various sources are public domain and are frequently updated.
</p>
</div><!--end billspage-->