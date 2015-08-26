<?php 
include_once("keys.php");
include_once('simplify.php');
require_once('crpapi.php');
require_once('VoteSmart.php');
//error_reporting(E_ALL);
//error_reporting(NONE);
/** -------------------------setup functions----------------------- **/

function whorep($z){
	$url = "http://whoismyrepresentative.com";
    $iface = "/getall_mems.php";
    $args ="?zip=".$z;
    echo '<!-- Request ['.$url.$iface.$args.'] -->';
	$get_reps = simplexml_load_file($url.$iface.$args);	

/* <result>
<rep name='James Marshall' party='D' state='GA' district='8' phone='202-225-6531' office='504 Cannon House Office Building' link='http://www.house.gov/marshall/' />
</result> */
echo '
<div class="container" id="myreps">
<p class="title">You are located in <span class="repname">'.$_SESSION["state_name"].'&#39;s</span> District <span class="repname">'.$get_reps->rep[@district].'</span> and represented by: </p>
<table>
	<tr>
		<th>Representative</th>	<th>District / Position</th>	<th>Office Phone</th>	<th>Office Address</th>
	</tr>';

foreach($get_reps->rep as $rep){
echo '
		<tr>
		<td class="namecell"><a href="'.$rep[@link].'">'.$rep[@name].'</a> ('.$rep[@party].') </td>
		<td class="distcell">'.$rep[@district].' </td>
		<td class="phonecell">'.$rep[@phone].' </td>
		<td class="officecell">'.$rep[@office].' </td>
		</tr>';
		}
echo '</table></div>';

	$_SESSION['dist'] = (string)$get_reps->rep[@district];
	$_SESSION['repname'] = (string)$get_reps->rep[@name];
	$_SESSION['repphone'] = (string)$get_reps->rep[@phone];
	$_SESSION['repadd'] = (string)$get_reps->rep[@office];
	$_SESSION['link1'] = (string)$get_reps->rep[@link];

$piece = explode(" ", $_SESSION['repname']); //break name to get lastname
$_SESSION['fname']=$piece[0];
$_SESSION['lname']=$piece[1];
}
//-------------------------sunlightlabs -----------------------------

/*<response>
<legislators>
<legislator>
<district>30</district>
<title>Rep</title>
<eventful_id>P0-001-000016663-3</eventful_id>
<in_office>True</in_office>
<state>CA</state>
<crp_id>N00001861</crp_id>
<official_rss></official_rss>
<party>D</party>
<email></email>
<votesmart_id>26753</votesmart_id>
<website>http://waxman.house.gov</website>
<fax>202-225-4099</fax>
<govtrack_id>400425</govtrack_id>
<firstname>Henry</firstname>
<middlename>A.</middlename>
<lastname>Waxman</lastname>
<congress_office>2204 Rayburn House Office Building</congress_office><phone>202-225-3976</phone>
<webform>http://waxman.house.gov/Contact/</webform>
<youtube_url></youtube_url>
<nickname></nickname>
<bioguide_id>W000215</bioguide_id>
<fec_id>H6CA24048</fec_id><gender>M</gender>
<senate_class></senate_class>
<name_suffix></name_suffix>
<twitter_id></twitter_id>
<birthdate>1939-09-12</birthdate>
<congresspedia_url>http://www.opencongress.org/wiki/Henry_Waxman</congresspedia_url>
</legislator>  */

/* $req_l='http://services.sunlightlabs.com/api/legislators.allForZip.xml?zip='.$_SESSION['zip_code'].'&apikey='._SUNKEY_;
$l_xml=curl_call($req_l);
$legs=$l_xml->xpath('//legislator');
echo $legs;
foreach ($legs as $key=>$val){
(string)$l_xml;
} */
function sl_leg() {
$req_ls='http://services.sunlightlabs.com/api/legislators.get.xml?state='.htmlentities($_SESSION['state']).'&district='.$_SESSION['dnum'].'&apikey='._SUNKEY_;
$leg=curl_call($req_ls);
$ls = $leg->legislator;

foreach ($ls->children() as $key=>$val) {
$_SESSION["$key"]=$val;
if (empty($_SESSION["$key"])) {unset($_SESSION["$key"]);}
}}
//-------------------------------
function sl_off($f, $l) {
$req='http://services.sunlightlabs.com/api/legislators.get.xml?';
$args='lastname='.$l.'&firstname='.$f.'&apikey='._SUNKEY_;
$get=simplexml_load_file($req.$args);
$leg=$get->legislator;
if (isset($leg)) {
echo '<table id="atable">';
if (!empty($leg->phone)) echo '<tr><td>Phone: '.$leg->phone.'</td></tr>';
if (!empty($leg->website)) echo '<tr><td><a href="'.$leg->website.'">Official Contact Form</a>  </td></tr>';
if (!empty($leg->youtube_url)) echo '<tr><td><a href="' .$leg->youtube_url. '">YouTube Videos</a> </td></tr>';
if (!empty($leg->twitter_id)) echo '<tr><td><a href="http://www.twitter.com/'.$leg->twitter_id.'">Tweet Them! (@'.$leg->twitter_id.')</a> </td></tr>';
echo '<tr><td><a href="'.$leg->congresspedia_url.'">Congresspedia Bio</a> </td></tr>';

echo '</table>'; 
}}
//-------------------------------------
function sl_comm($d) {
$req_com='http://services.sunlightlabs.com/api/committees.allForLegislator.xml?bioguide_id='.$d.'&apikey='._SUNKEY_;
$comx=curl_call($req_com);

//committees/committee/subcommittees/committee/name
$com=$comx->xpath("//committees/committee/name");
$scom=$comx->xpath("//subcommittees//name");
echo '
<div class="container" id="committees">
<p class="title"> <span class="repname"> '.$_SESSION["repname"].'</span> serves on the following Committees :</p>
<ul>';
foreach ($com as $key=>$val) {echo '<li>Serves on the '.$com[$key].'.</li>';}
echo '</ul> <p class="title"> And Subcommittees :</p><ul id="subcommittees">';
foreach ($scom as $key=>$val) {echo '<li>Serves on the '.$scom[$key].'.</li>';}
echo '</ul>
</div>';
}

//-------------------------------------------------------nytimes -------------------------
function nyleg(){
$m_req ='http://api.nytimes.com/svc/politics/v3/us/legislative/congress/members/senate/'.urlencode($_SESSION['city']).'/'.$_SESSION['district'][0].'/current.xml?api-key='._NYCONG_;	

/* 
<result_set>
    <status>
        OK
    </status>
    <copyright>
        Copyright (c) 2010 The New York Times Company. All Rights Reserved.
    </copyright>
    <results>
        <member>
            <id>
                G000555
            </id>
            <name>
                Kirsten  Gillibrand
            </name>
            <role>
                Senator, 1st Class
            </role>
            <gender>
                F
            </gender>
            <party>
                D
            </party>
            <times_topics_url>
                http://topics.nytimes.com/top/reference/timestopics/people/g/kirsten_gillibrand/index.html
            </times_topics_url>
            <seniority>
                1
            </seniority>
            <api_uri>
                http://api.nytimes.com/svc/politics/v3/us/legislative/congress/members/G000555.xml
            </api_uri>
        </member>
*/
	//Location variables
	$s_member = curl_call($m_req);
	print_r($s_member);
}


//----------------------------- OpenSecrets--------------------------------------------
/*   gets OpenSecrets ID from xml
$clist=simplexml_load_file('data/CID_Cand08.xml');
$cid = $clist->xpath('/members/member[distid="'.$_SESSION['dist'].'"]/cid');
$_SESSION['crp_id'] = $cid[0];
*/

function os_ind($oid){
$crp = new crpData("candIndustry", Array("cid"=>"{$oid}","cycle"=>"2010","output"=>"json"));
/**
 * These variables are exposed upon instantiation
**/

echo '<!-- Request:['.$crp->url.'] -->';

/**
 * Get the data. This example retrieves json data which is converted to 
 * an associative array. If using xml, a SimpleXML object will be returned.  
 * The getData method can optionally be passed a true/false value (true is 
 * default).  If set to false, a local file cache will not be used.
**/

$data = $crp->getData();
/*  Print Data /*
foreach ($data['response']['industries']['@attributes'] as $key=>$val) {
	echo '<!-- Keys:'.$key . '=' . $val . '-->';
}
/**/

//Table Data
echo '<div class="container" id="industries">
<p class="title"> Top Industries Contributing to <span class="repname">: '.$data['response']['industries']['@attributes']['cand_name'].'</span></p>
<table><tr><th>Industry</th><th>Indivs</th><th>PACs</th><th>Total</th></tr>';
foreach ($data['response']['industries']['industry'] as $k=>$ind) {
	foreach ($ind as $row) {
		echo "<tr><td>" . htmlentities($row['industry_name']) . "</td><td>$" . 
			simplify_number($row['indivs']) . "</td><td>$" . simplify_number($row['pacs']) . "</td><td>$" . 
			simplify_number($row['total']) . "</td></tr>";
	}
}

echo "</table>";
echo '</div>';

/**
 * Show the cache status.  By default, the library caches API query results in a
 * gzipped, serialized form in a text file in the dataCache directory.  If you do 
 * not desire file caching, call getData(false) (see above).  The cache life can
 * be set by altering $this->cacheTime value in crpapi.php.  The default is 
 * one day.
**/

if ($crp->getCacheStatus()) {
	echo "<!-- Cache Hit -->";
} else {
	echo "<!-- Cache Miss -->";
}}

/*<response>
<summary cand_name="Maloney, Carolyn B" cid="N00000078" cycle="2010" state="NY" party="D" chamber="H" first_elected="1992" next_election="2010" total="2035993" spent="1156593" cash_on_hand="1986587" debt="0" origin="Center for Responsive Politics" source="http://www.opensecrets.org/politicians/summary.php?cid=N00000078&cycle=2006" last_updated="03/31/2010" />
</response>
*/

function os_sum($oid){
$r = 'http://www.opensecrets.org/api/?method=candSummary&cid='.$oid.'&cycle=&apikey='._OSKEY_;
$cand=curl_call($r);
$cname = $cand->xpath('//@cand_name');
$party = $cand->xpath('//@party');
$cycle = $cand->xpath('//@cycle');
$felect = $cand->xpath('//@first_elected');
$nelect = $cand->xpath('//@next_election');
$total = $cand->xpath('//@total');
$spent = $cand->xpath('//@spent');
$cash = $cand->xpath('//@cash_on_hand');
$debt = $cand->xpath('//@debt');
$source = $cand->xpath('//@source');
$origin = $cand->xpath('//@origin');
$updated = $cand->xpath('//@last_updated');

echo '<div class="container" id="summary">
<p class="title"> Summary of Contributions for: <span class="repname">'.$cname[0].'</span> ['.$party[0].'] for '.$cycle[0].'.</p>
<ul>
<li>First Elected in '.$felect[0].', and up for election again in '.$nelect[0].'.</li>
<li>Total Contributions: $'.simplify_number($total[0]).'</li>
<li>Spent so far: $'.simplify_number($spent[0]).'</li>
<li>Cash currently on hand: $'.simplify_number($cash[0]).'</li>
<li>Amount of Debt: $'.simplify_number($debt[0]).'</li>
</ul>
<p class="source">| Source: <a href="'.htmlentities($source[0]).'">'.$origin[0].'</a> | Updated on: '.$updated[0].'</p>
</div>';
}

//----------------
function os_sec($oid){
$crp = new crpData("candSector", Array("cid"=>"{$oid}","cycle"=>"","output"=>"json"));
echo '<!-- Request:['.$crp->url.'] -->';

$data = $crp->getData();

/*
foreach ($data['response']['sectors']['@attributes'] as $key=>$val) {
	echo '<!-- Keys:'.$key . '=' . $val . '-->';
}
/**/
echo '<div class="container" id="sectors">
<p class="title"> Top Sectors Contributing to: <span class="repname">'.$data['response']['sectors']['@attributes']['cand_name'].'</span></p>
<table><tr><th>Sector</th><th>Indivs</th><th>PACs</th><th>Total</th></tr>';
foreach ($data['response']['sectors']['sector'] as $ind) {
	foreach ($ind as $row) {
		echo "<tr><td>" . htmlentities($row['sector_name']) . "</td><td>$" . 
			simplify_number($row['indivs']) . "</td><td>$" . simplify_number($row['pacs']) . "</td><td>$" . 
			simplify_number($row['total']) . "</td></tr>";
	}
}
echo '</table>
<p class="source">| Source: <a href="'.htmlentities($data['response']['sectors']['@attributes']['source']).'">'.$data['response']['sectors']['@attributes']['origin'].'</a> | Updated on: '.$data['response']['sectors']['@attributes']['last_updated'].'</p>
</div>';
if ($crp->getCacheStatus()) {
	echo "<!-- Cache Hit -->";
} else {
	echo "<!-- Cache Miss -->";
}}

//----------------
function os_org($oid){
$crp = new crpData("candContrib", Array("cid"=>"{$oid}","cycle"=>"","output"=>"json"));
echo '<!-- Request:['.$crp->url.'] -->';

$data = $crp->getData();
/*
foreach ($data['response']['contributors']['@attributes'] as $key=>$val) {
	echo '<!-- Keys:'.$key . '=' . $val . '-->';
}
/**/
echo '<div class="container" id="orgs">
<p class="title"> Top Organizations Contributing to: <span class="repname">'.$data['response']['contributors']['@attributes']['cand_name'].'</span> for '.$data['response']['contributors']['@attributes']['cycle'].'.</p>
<table><tr><th>Organization</th><th>Total</th></tr>';
foreach ($data['response']['contributors']['contributor'] as $org) {
	foreach ($org as $row) {
		echo "<tr><td>" . htmlentities($row['org_name']) . "</td><td>$" . 
			simplify_number($row['total']) . "</td></tr>";
	}
}
echo '</table>
<p class="source">| Source: <a href="'.htmlentities($data['response']['contributors']['@attributes']['source']).'">'.$data['response']['contributors']['@attributes']['origin'].'</a> | Updated on: '.$data['response']['contributors']['@attributes']['last_updated'].'</p>
</div>';
if ($crp->getCacheStatus()) {
	echo "<!-- Cache Hit -->";
} else {
	echo "<!-- Cache Miss -->";
}}
//----------------
function os_trip($oid){
$crp = new crpData("memTravelTrips", Array("cid"=>"{$oid}","cycle"=>"","output"=>"json"));
echo '<!-- Request:['.$crp->url.'] -->';

$data = $crp->getData();
/*
foreach ($data['response']['trips']['@attributes'] as $key=>$val) {
	echo '<!-- Keys:'.$key . '=' . $val . '-->';
}
/**/
echo '<div class="container" id="trips">
<p class="title"> Trips taken in the name of  <span class="repname">'.$_SESSION['repname'].'</span> for '.$data['response']['trips']['@attributes']['year'].'.</p>';
foreach ($data['response']['trips']['trip'] as $trip) {
	foreach ($trip as $row) {
		echo '<div class="trip"><p><strong>'.$row['traveler'] .' went to '.$row['destination'].' on '.$row['start_date'].' and returned on '.$row['end_date'].'.</strong></p>
			<table>';
if (!empty($row['sponsor'])) echo'<tr><th>Sponsor: </th><td>'.$row['sponsor'].'</td></tr>';
if (!empty($row['purpose'])) echo'<tr><th>Purpose: </th><td>'.$row['purpose'].'</td></tr>';
if (!empty($row['cost'])) echo'<tr><th>Cost: </th><td>$'.simplify_number($row['cost']).'</td></tr>';
echo '		</table></div>';
	}
}
echo '
<p class="source">| Source: <a href="'.htmlentities($data['response']['trips']['@attributes']['source']).'">'.$data['response']['trips']['@attributes']['origin'].'</a> | Updated on: '.$data['response']['trips']['@attributes']['last_updated'].'</p>
</div>';
if ($crp->getCacheStatus()) {
	echo "<!-- Cache Hit -->";
} else {
	echo "<!-- Cache Miss -->";
}}
//--------------------------------------VoteSmart Functions-------------------------------------

/* notneeded unless sunlight is down
function vs_last($v) {
$obj = new VoteSmart(
        'Officials.getByLastname', 
        Array(
                'lastName' => $v
        ));

$x = $obj->getXmlObj();
if (isset($x->errorMessage)) {
        echo '
        <div>' . $x->errorMessage . '</div>';
} else {
$y = $x->xpath('//candidate[firstName="'.$_SESSION["fname"].'"]/candidateId');

$_SESSION['candid'] = $y[0];
}}
/**/
//--------------------------------
function vs_zip($z) {
$obj = new VoteSmart(
        'Officials.getByZip', 
        Array(
                'zip5'=>$z,
              ));
$x = $obj->getXmlObj();
//echo '<div class="container" id="officials">';
if (isset($x->errorMessage)) {echo '<div>'.$x->errorMessage.'</div>';} 
else {
global $offselect;
/*echo '<p class="title"> List of Officials for<span class="repname"> Zipcode '.$_SESSION["zip_code"].'</span> </p>';
*/
foreach ($x->candidate as $k=>$v) {$offselect .= '<option value="'.$v->candidateId.'"> '.$v->firstName.' '.$v->lastName.' - '.$v->title.' - '.$v->officeName.'</option>\n';}
/*echo '<table id="official">
<tr>
<th>Name</th><th>Title</th><th>Office</th></tr>';
$nname="";
foreach ($x->candidate as $k=>$c) {
if (!empty($c->nickName)) {$nname='('.$c->nickName.')';}
$name=$c->firstName.' '.$c->middleName.' '.$nname.' '.$c->lastName;
echo '
<tr><td class="namecell">'.htmlentities($name).'</td><td class="titlecell">'.$c->title.'</td><td class="officecell">'.$c->officeName.'</td></tr>'; 
}
echo '</table>
<p class="source">| Source: <a href="'.htmlentities($x->generalInfo->linkBack).'">'.$x->generalInfo->title.'</a> |</p>
</div>';*/
}}
//---------------------------------------
function vs_bio($i) {

$obj = new VoteSmart('CandidateBio.getBio', Array('candidateId' => $i));
$x = $obj->getXmlObj();
echo '<div class="container" id="bio">';
if (isset($x->errorMessage)) {echo '<div>'.$x->errorMessage.'</div>';} 
else {
echo '<div id="inputs">
<form name="search_form" action="home.php?" method="get" target="_self">
<select name="off">';
global $offselect;
echo $offselect;
echo '</select>
<input type="hidden" name="loc" value="reps" />
<input type="hidden" name="zipcode" value="'.$_SESSION["zip_code"].'" />
<input type="submit" value="Get Another"/>
</form></div>';
if (!empty($x->candidate->middleName)) {$mname='('.$x->candidate->middleName.') ';}
$name = $x->candidate->firstName.' '.$mname.$x->candidate->lastName.' '.$x->candidate->suffix;
if (!empty($x->candidate->photo)) {$photo = '<img src="'.$x->candidate->photo.'" alt="'.$name.'" />';}
		
$bdate=explode("/", $x->candidate->birthDate);
$birth=$bdate[2];
date_default_timezone_set("US/Eastern");
$year=date("Y");
$_SESSION['age'] = $year-$birth;
echo '
<p class="title">Brief Biography of <span class="repname"> '.$name.'</span></p>
'.$photo;
sl_off($x->candidate->firstName,$x->candidate->lastName); //imbedded function
echo '<table id="btable">';
if (!empty($x->candidate->birthPlace)) echo'<tr><th>Born in:</th<td> '.$x->candidate->birthPlace.'</td></tr>';
if (!empty($_SESSION['age'])) echo'<tr><th>Age: </th><td>'.$_SESSION['age'].'</td></tr>';
if (!empty($x->candidate->family)) echo'<tr><th>Family:</th><td>' . $x->candidate->family . '</td></tr>';
if (!empty($x->candidate->homeCity)) echo'<tr><th>Currently Resides in:</th><td>'.$x->candidate->homeCity.', '.$x->candidate->homeState.'</td></tr>';
if (!empty($x->candidate->education)) echo'<tr><th>Education:</th><td>' . $x->candidate->education . '</td></tr>';
if (!empty($x->candidate->profession)) echo'<tr><th>Professional Resume:</th><td>' . $x->candidate->profession . '</td></tr>';
if (!empty($x->candidate->political)) echo'<tr><th>Political Resume:</th><td>' . $x->candidate->political . '</td></tr>';
if (!empty($x->candidate->congMembership)) echo'<tr><th>Congressional Membership:</th><td>' . $x->candidate->congMembership . '</td></tr>';
if (!empty($x->candidate->orgMembership)) echo'<tr><th>Organizational Membership:</th><td>'.$x->candidate->orgMembership.'</td></tr>';

echo '        </table>
<p class="source"> | Source: <a href="'.htmlentities($x->generalInfo->linkBack).'">'.$x->generalInfo->title.'</a> |</p>
</div>';
}}
//--------------------------------
function npat($i) {
$obj = new VoteSmart('CandidateBio.getBio', Array('candidateId' => $i));
$x = $obj->getXmlObj();
print_r($x);
echo '<div class="container" id="offbio">';
if (isset($x->errorMessage)) {echo '<div>' . $x->errorMessage . '</div>';} 
else {
echo '
<h4><span class="repname">'.$x->firstName.' '.$x->lastName.'</span></h4>

<p class="source">| Source: <a href="'.htmlentities($x->generalInfo->linkBack).'">'.$x->generalInfo->title.'</a> |</p></div>';
}} 

//npat(113360);
?>