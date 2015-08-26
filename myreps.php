<?php 
if (isset($_REQUEST['_SESSION'])) die("Stop trying to Hack!");
//include_once("lib/functions_nec.php"); //must call first because sends headers.
include_once("lib/functions_rep.php");

?>
<div id="finding_location"><img src="img/wait-wheel.gif" alt="" />Gathering Local Representative Data...</div>
<div id="repspage">

<div id="content">
<?php

//-------------------------Call Functions-------------------------------
whorep($_GET['zipcode']); //gets reps and senators 
sl_leg(); //gets age, all ids: Needs district|state | NO OUTPUT
/**/ //vs_last($_SESSION['lname']); //gets candidate ID /* not needed unless sunlight down */ ?>

<?
vs_zip($_GET["zipcode"]);
if (isset($_REQUEST["off"])) {vs_bio($_REQUEST["off"]);} //vs Bio 
else {vs_bio($_SESSION['votesmart_id']);}

if (isset($_REQUEST["bill"])) {get_bill($_REQUEST["bill"]);} //vs bill search
else {vs_bill($_SESSION['votesmart_id']);} //votesmart bills by zip


sl_comm($_SESSION['bioguide_id']); //committees
os_sum($_SESSION['crp_id']);
os_org($_SESSION['crp_id']);
os_sec($_SESSION['crp_id']);
os_ind($_SESSION['crp_id']);
os_trip($_SESSION['crp_id']);

//nybill();

?>
</div>

<p class="source">
All data gathered from various sources are public domain and are frequently updated.
</p>
</div><!--end repspage-->