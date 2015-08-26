<?php 
//error_reporting(E_ALL);
error_reporting(NONE);
include_once("keys.php");

function curl_call($request) {
	echo "<!-- Request [", $request , "] -->\n";
	$start_time = time();
	//Initialize the Curl session
	$ch = curl_init();

	//Set curl to return the data instead of printing it to the browser.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//Set the URL
	curl_setopt($ch, CURLOPT_URL, $request);
	//Execute the fetch
	$response = curl_exec($ch);
	//Close the connection
	curl_close($ch);

	//$response = file_REQUEST_contents($request);

	if ($response === false) {die('Request failed');}

	$XML = simplexml_load_string($response);

	if ($XML === false) {die('Parsing failed');}
	echo "<!-- Call took: ", time() - $start_time, "Seconds -->\n";
	return($XML);
}

if (isset($_REQUEST['zipcode'])) {
$req='http://ws.geonames.org/findNearbyPostalCodes?postalcode='.htmlentities($_REQUEST['zipcode']).'&country=US&maxRows=1';	
//$req='http://www.uszip.com/services/v1/zip.aspx?zip='.htmlentities($_REQUEST['zipcode']).'&tokenid='._AKEY_;	
//$req_d='http://services.sunlightlabs.com/api/districts.getDistrictsFromZip.xml?zip='.htmlentities($_REQUEST['zipcode']).'&apikey='._SUNKEY_;
$_SESSION['zip_code'] = $_REQUEST['zipcode'];
}
elseif (isset($_REQUEST['lat'])) {
$req='http://ws.geonames.org/findNearbyPostalCodes?lat='.htmlentities($_REQUEST['lat']).'&lng='.htmlentities($_REQUEST['lng']).'&maxRows=1';
//$req_d = 'http://services.sunlightlabs.com/api/districts.getDistrictFromLatLong.xml?latitude='.htmlentities($_REQUEST['lat']).'&longitude='.htmlentities($_REQUEST['lng']).'&apikey='._SUNKEY_;
$_SESSION['lat'] = htmlentities($_REQUEST['lat']);
$_SESSION['lng'] = htmlentities($_REQUEST['lng']);
}
else {
	die('Sorry, You have reached this page because we did not receive enough information to locate you.');
}

$location = curl_call($req);
	
/* First Method */
if (!empty($location->code->postalcode)) {$_SESSION['zip_code'] = $location->code->postalcode;}
if (!empty($location->code->name)) {$_SESSION['city'] = $location->code->name;}
if (!empty($location->code->adminCode1)) {$_SESSION['state'] = $location->code->adminCode1;}
if (!empty($location->code->adminName1)) {$_SESSION['state_name'] = $location->code->adminName1;}
if (!empty($location->code->adminName2)) {$_SESSION['county'] = $location->code->adminName2;}
if (!empty($location->code->lat)) {$_SESSION['lat'] = $location->code->lat;}	
if (!empty($location->code->lng)) {$_SESSION['lng'] =  $location->code->lng;}
/* 2nd Method */
if (!empty($location->result->location)) {$cstate=explode(",", $location->result->location);$_SESSION['city']= $cstate[0];$_SESSION['state']= trim($cstate[1]);}
if (!empty($location->result->longitude)) {$_SESSION['lng'] = (int)$location->result->longitude;}
if (!empty($location->result->latitude)) {$_SESSION['lat'] = (int)$location->result->latitude;}

$district_xml = curl_call($req_d);

	/*<response>
	− <districts>
		− <district>
			<state>NC</state>
			<number>4</number>
			</district>
		</districts>
	</response>*/
	$_SESSION['district_count'] = 0;
	$_SESSION['district']= array();
	$_SESSION['district_text']="";
	foreach($district_xml->districts->children() as $d) {
		$_SESSION['district_count']++;
		$_SESSION['district'][] = $d->state . sprintf("%02d", $d->number);
		$_SESSION['district_text'] = $_SESSION['district_text'] . $d->state . sprintf("%02d", $d->number). " ";
		}
	$dnum=preg_replace("/[^0-9]/", '', (string)$_SESSION['district'][0]); // ditch anything that is not a number  
	$_SESSION["dnum"]=$dnum;
/* 
echo '<!-- City = ',$_SESSION['city'],' -->';	
echo '<!-- Zipcode = ',$_SESSION['zip_code'],' -->';
echo '<!-- State = ',$_SESSION['state'],' -->';
echo '<!-- Lat = ',$_SESSION['lat'],' -->';
echo '<!-- Lng = ',$_SESSION['lng'],' -->';
echo '<!-- 1st = '. $_SESSION['district'][0]. ' Districts = '.$_SESSION['district'].' District Text = '.$_SESSION['district_text']. ' Count = '. $_SESSION['district_count']. ' -->';
/**/
?>