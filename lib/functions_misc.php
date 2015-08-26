<?php
//error_reporting(NONE);
//error_reporting(E_ALL);
//include_once("keys.php");
//include_once("functions_nec.php");

//------------------------------ DEFINITION / ABB -----------------------------------------

function def($w){
$req_def='http://www.abbreviations.com/services/v1/defs.aspx?tokenid='._AKEY_.'&word='.$w;
$def = curl_call($req_def);
/* <results>
<result><term>humectant</term><definition>any substance that is added to another substance to keep it moist</definition><example></example>
<partofspeach>noun</partofspeach></result></results> */
 $dterm = $def->xpath('//term');
 $ddef = $def->xpath('//definition');
 $dpos = $def->xpath('//partofspeach');

echo '
<p id="definition" class="container">
<span class="term">'.(string)$dterm[0].' <span class="cat">['.(string)$dpos[0].'] : <span class="def">'.(string)$ddef[0].'.</p>';
}

function abb($t){
$req_def='http://www.abbreviations.com/services/v1/abbr.aspx?tokenid='._AKEY_.'&term='.$t.'&categoryid=&sortby=p';
$abb = curl_call($req_def);
/* 
<results>
  <result>
    <term>asap</term>
    <definition>As Soon As Possible</definition>
    <category>Chat</category>
  </result>
  <result>
    <term>asap</term>
    <definition>As Soon As Possible</definition>
    <category>Chat</category>
  </result>
</results>
 */
 $aterm = $abb->xpath('//term');
 $adef = $abb->xpath('//definition');
 $acat = $abb->xpath('//category');

echo '
<span class="term">'.(string)$aterm[0].' <span class="cat">['.(string)$acat[0].'] : <span class="def">'.(string)$adef[0].'.';
}
//---------------wikipedia article -------------------------
function wiki($c){
$req_wi='http://ws.geonames.org/wikipediaSearch?q='.$c.'&title='.$c.'&maxRows=1';
echo '<!-- Request ['.$req_wi.'] --> ';
$wiki= simplexml_load_file($req_wi);

echo '
<div class="container" id="wiki">
<p class="title"> Wikipedia Entry on '.$_SESSION["city"].'</p>';
if (!empty ($wiki->entry->thumbnailImg)) {echo '<a href="'.$wiki->entry->wikipediaUrl.'"><img src="'.$wiki->entry->thumbnailImg.'" alt="'.$_SESSION["city"].'"/></a>';}
echo '<em>'.$wiki->entry->summary.'</em><br />
<p class="source"><a href="'.$wiki->entry->wikipediaUrl.'">Wikipedia Entry</a></p>
</div>';

//		$_SESSION['summ'] = (string)$wiki->entry->summary;
//		$_SESSION['wiki'] = (string)$wiki->entry->wikipediaUrl;
//		$_SESSION['wikimg'] = (string)$wiki->entry->thumbnailImg;		

}

function weath() {
$req_w='http://ws.geonames.org/findNearByWeatherXML?lat='.$_SESSION['lat'].'&lng='.$_SESSION['lng'];
echo '<!-- Request ['.$req_w.'] --> ';
$weather = simplexml_load_file($req_w);
/* <geonames> 
<observation> 
<observation>LESO 260530Z VRB01KT 9999 FEW012 OVC017 12/10 Q1027</observation> 
<observationTime>2010-04-26 05:30:00</observationTime> 
<stationName>San Sebastian / Fuenterrabia</stationName> 
<ICAO>LESO</ICAO> 
<countryCode>ES</countryCode> 
<elevation>8</elevation> 
<lat>43.35</lat> 
<lng>-1.8</lng> 
<temperature>12</temperature> 
<dewPoint>10</dewPoint> 
<humidity>87</humidity> 
<clouds>few clouds</clouds> 
<weatherCondition>n/a</weatherCondition> 
<hectoPascAltimeter>1027.0</hectoPascAltimeter> 
<windSpeed>01</windSpeed> 
</observation> 
</geonames>  */
function conv($t) {
$t*=1.8;
$t+=32;
return($t);}
echo '
<div class="container" id="weather">
<p class="title"> Current Weather Conditions for '.$_SESSION['city'].', '.$_SESSION['state'].'</p>
<table>';
if (!empty($weather->observation->stationName)) echo '<tr><td>Station :</td><td> '.$weather->observation->stationName.'</td></tr>';
if (!empty($weather->observation->observationTime)) echo '<tr><td>Observation Time :</td><td>'.$weather->observation->observationTime.'</td></tr>';
if (!empty($weather->observation->temperature)) echo '<tr><td>Temperature: </td><td>'.conv($weather->observation->temperature).'&deg;F</td></tr>';
if (!empty($weather->observation->humidity)) echo '<tr><td>Humidity: </td><td>'.$weather->observation->humidity.'%</td></tr>';
if (!empty($weather->observation->dewPoint)) echo '<tr><td>Dewpoint: </td><td>'.conv($weather->observation->dewPoint).'&deg;F</td></tr>';
if (!empty($weather->observation->clouds)) echo '<tr><td>Cloud Coverage: </td><td>'.$weather->observation->clouds.'</td></tr>';
if (!empty($weather->observation->windSpeed)) echo '<tr><td>Wind Speed: </td><td>'.$weather->observation->windSpeed.' Knots</td></tr>';
if (!empty($weather->observation->weatherCondition)) echo '<tr><td>Weather: </td><td>'.$weather->observation->weatherCondition.'</td></tr>';
echo '</table></div>';
}

function groups($q) {
$url='http://www.groupsnearyou.com/rss.php?q='.$q;
$get=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
$item=$get->channel->item;
echo '
<div class="container" id="groups">
<h5> Groups near You! </h5>';
foreach ($item as $v) {
echo '<div class="group">
<h6>'.$v->title.'</span></h6>';
if (!empty($v->category)) {echo '<span>Category: '.$v->category.'</span><br />';}
echo '<p>'.$v->description.'<br />
<a href="'.$v->link.'"  title="Group Homepage">More Info</a></p>
</div>';
}
echo '<span class="source">via <a href="'.$get->channel->link.'" title="Groups Near You . Com"> GroupsnearYou</a> </span>
</div>';
}

function up_events() {
$url="http://upcoming.yahooapis.com/services/rest/?api_key="._UPKEY_;
$meth="&method=event.search";
$args="&search_text=".$_REQUEST['q']."&location=".$_REQUEST['zip_code']."&radius=".$_REQUEST['r'];
$get=simplexml_load_file($url.$meth.$args, 'SimpleXMLElement', LIBXML_NOCDATA);
$event=$get->event;
//print_r($get);
}
//up_events();
?>