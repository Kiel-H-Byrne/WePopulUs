<?php
include_once("keys.php");
require_once('VoteSmart.php');
//error_reporting(E_ALL);
//error_reporting(NONE);
/** -------------------------setup functions----------------------- **/
//chamber =senate/assembly
//type=updated,introduced
function nybill() {
$_REQUEST["chamber"]="senate";
$_REQUEST["type"]="updated";
$req='http://api.nytimes.com/svc/politics/v2/ny/legislative/2009/'.$_REQUEST["chamber"].'/bills/'.$_REQUEST["type"].'.xml?api-key='._NYLEGI_;

$get=curl_call($req);
$bill=$get->results->bills->bill;
foreach ($bill as $k=>$b) {
echo '<div style="width:250px" class="container">
<table>
<h5>Bill <a href="'.htmlentities($b->url).'">'.$b->number.'</a>:</h5>
<p>'.$b->title.'</p>
<tr><th>Sponsor:</th><td>'.$b->sponsor.'</td></tr>
<tr><th>Introduced:</th><td>'.$b->introduced_date.'</td></tr>
<tr><th>Latest Action:</th><td>'.$b->latest_action.' on '.$b->latest_action_date.'</td></tr>
</table>
</div>';
}}
//-----------------------------
function vs_bill() {
// Initialize the VoteSmart object

$obj = new VoteSmart(
        'Votes.getBillsByStateRecent', 
        Array(
                'ammount' => 25,
                'state' => $_SESSION["state"]
        ));

// Get the SimpleXML object
$x = $obj->getXmlObj();

// Check and make sure there is no error
echo '<div class="container" id="bills">';
if (isset($x->errorMessage)) { // If there is, let's handle it
        echo '
        <div>' . $x->errorMessage . '</div>';
        
} else { // If not, let's go ->
        // some quick and dirty assembly
/*
    [billId] => 10896
    [billNumber] => HR 4872
    [title] => Health Care Reconciliation Act
    [officeId] => 5
    [office] => U.S. House
    [actionId] => 29284
    [stage] => Concurrence Vote
    [vote] => Y
/**/
echo '
<div id="inputs">
<form name="search_form" action="home.php?" method="get" target="_self">
<select name="bill">';
foreach ($x->bill as $k=>$v) {echo '<option value="'.$v->billId.'"> Bill '.$v->billNumber.'</option>\n';}
echo '
</select>
<input type="hidden" name="loc" value="bills" />
<input type="hidden" name="zipcode" value="'.$_SESSION["zip_code"].'" />
<input type="submit" value="Get Info"/>
</form></div>
<p class="title"> Bills for <span class="repname"> '.$_SESSION["state"].'</span> State.</p>
<table>
<tr><th>Bill Number</th><th>Bill Title</th></tr>';

foreach ($x->bill as $k=>$v) {
echo '
<tr><td class="billcell">'.$v->billNumber.'</td><td>'.htmlentities($v->title).'</td></tr>
';}
echo '</table> 
<p class="source">| Source: <a href="'.htmlentities($x->generalInfo->linkBack).'">'.$x->generalInfo->title.'</a> |</p></div>'; 
}}
//--------------------------------
function get_bill($i) {
$obj = new VoteSmart('Votes.getBill', Array('billId' => $i));

$x = $obj->getXmlObj();

echo '<div class="container" id="billsumm">';
if (isset($x->errorMessage)) {echo '<div>' . $x->errorMessage . '</div>';} 
else {
date_default_timezone_set("US/Eastern");
$year=date("Y");
$bn = preg_replace('/[^\d]/', '', $x->billNumber);
echo '
<p class="title">Summary of '.$x->billNumber.' - <a href="http://www.govtrack.us/congress/bill.xpd?bill=h111-'.$bn.'&tab=summary">'.$x->title.'</a>.<br />
Introduced in '.$x->dateIntroduced.' as '.$x->type.'.<br />';
if (!empty($x->parentBill)) {echo 'This Bill falls under '.$x->parentBill.'<br />';}
echo '</p>
<table><tr><th>Sponsor(s)</th><td>';
foreach ($x->sponsors->sponsor as $s) {echo '| '.$s->name;}
echo '</td></tr></table>

<table>
<tr align="center"><th>Date</th><th>Outcome</th></tr>';
$act=$x->actions->action;
foreach ($act as $a) {
echo '
<tr><td>'.$a->statusDate.'</td><td>'.$x->billNumber.'</td><td>'.$a->stage.' at '.$a->level.' Level<br />(<span class="yvote">'.$a->yea.'</span> | <span class="nvote">'.$a->nay.'</span>)</td></tr>';}
echo '
</table>
<p class="source">| Source: <a href="'.htmlentities($x->generalInfo->linkBack).'">'.$x->generalInfo->title.'</a> |</p></div>';
}} 
//-------------------------------
function new_bills() {
$url="http://www.washingtonwatch.com/bills/passed/index.xml";
$get=simplexml_load_file($url);
$item=$get->channel->item;
echo '<div class="container rss" id="laws">
<h5> New Laws </h5>';
foreach ($item as $v) {
echo '<ul><strong>'.$v->title.'</strong>
<li>'.$v->description.'<a href="'.htmlentities($v->link).'" >...more</a></li>
</ul>';}

echo '<p class="source">| Source: <a href="'.htmlentities($get->channel->link).'">'.$get->channel->title.'</a> |</p></div>';
}
?>