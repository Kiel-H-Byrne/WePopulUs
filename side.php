<div id="side">

<div id="Gmap"></div> 

<script type="text/javascript">// <!-- google map script -->
//<![CDATA[
var map;
 
if (!GBrowserIsCompatible()) {
	//alert("This page uses Google Maps, which is unfortunately not supported by your browser.");
} else {
	var WMS_URL = 'http://www.govtrack.us/perl/wms-cd.cgi?';
	var G_MAP_LAYER_FILLED = createWMSTileLayer(WMS_URL, "cd-filled,district=<?= $_SESSION['state'].$_SESSION['dnum']?>", null, "image/gif", null, null, null, .25);
	var G_MAP_LAYER_OUTLINES = createWMSTileLayer(WMS_URL, "cd-outline,district=<?= $_SESSION['state'].$_SESSION['dnum']?>", null, "image/gif", null, null, null, .66, "Overlay by GovTrack.us");
	var G_MAP_OVERLAY = createWMSOverlayMapType([G_NORMAL_MAP.getTileLayers()[0], G_MAP_LAYER_FILLED, G_MAP_LAYER_OUTLINES], "Overlay");
 
	map = new GMap2(document.getElementById("Gmap"));
	//map.enableContinuousZoom();
	map.removeMapType(G_SATELLITE_MAP);
	map.addMapType(G_MAP_OVERLAY);
	map.addControl(new GLargeMapControl());
	//map.addControl(new GMapTypeControl());
	//map.addControl(new GOverviewMapControl());
	map.addControl(new GScaleControl());
	map.setMapType(G_MAP_OVERLAY);
	
	map.setCenter(new GLatLng(<?=$_SESSION['lat'].','.$_SESSION['lng']?>),9);
	createMarker(<?=$_SESSION['lng'].",".$_SESSION['lat'].", '".$_SESSION['state']."', '".$_SESSION["dnum"]."'"?>);
}
 
function createMarker(x, y, s, d) {
	var marker = new GMarker(new GPoint(x, y));
	GEvent.addListener(marker, "click", function() {
		if (d == 0) d = "";
		marker.openInfoWindowHtml("<h3>This is the boundary of " + s + "&#39;s District " + d + ".</h3><p>Use the buttons to the left to zoom out/in <br /> in order to see just how large your district really is!</p>");
	});
	map.addOverlay(marker);
}
//]]>
</script>

	<h3> Links and Tools:</h3>	
		<ul class="sidemenu">
   	   	   	<li><a href="#" class="submenu" onclick="return false">Offices</a>
   	   	   		<ul>
   					<li><a href="http://www.house.gov/house/MemberWWW_by_State.shtml">Representatives</a></li>
   					<li><a href="http://www.house.gov/house/CommitteeWWW.shtml">Committees</a></li>
   					<li><a href="http://www.house.gov/house/orgs_pub_hse_ldr_www.shtml">Leadership</a></li>
   					<li><a href="http://www.house.gov/house/Party_organizations.shtml">House Organizations</a></li>
				</ul></li>
   			<li><a href="#" class="submenu" onclick="return false">Resources</a>
   				<ul>
   					<li><a href="http://speaker.house.gov/" target="_self">Speaker of the House</a></li>
   					<li><a href="http://cao.house.gov/index.shtml">Chief Administrative Officer</a></li>   
   					<li><a href="http://clerk.house.gov">Clerk of the House</a></li>
   					<li><a href="http://www.house.gov/house/Educate.shtml">Educational Resources</a></li>
   					<li><a href="http://www.house.gov/house/govsites.shtml">Government Resources</a></li>
   					<li><a href="http://clerk.house.gov/member_info/index.html">House Directory</a></li>
   					<li><a href="http://www.house.gov/house/Orgops.shtml">House Rules</a></li>
   					<li><a href="http://clerkkids.house.gov/congress/index.html">Kids in the House</a></li>
   					<li><a href="http://www.house.gov/house/Legproc.shtml">Legislative Archive</a></li>
   					<li><a href="http://www.house.gov/house/mediagallery.shtml">Media Resources</a></li>
   					<li><a href="http://www.house.gov/house/Visitor.shtml">Visiting D.C.</a></li>
		   	   	   	<li><hr /></li>
 					<li><a href="http://www.house.gov/house/House_Calendar.shtml">House Schedule</a></li>
 					<li><a href="http://www.house.gov/house/status.shtml">House Operating Status</a></li>
 					</ul></li>
   			<li><a href="#" class="submenu" onclick="return false">Friends of We:</a>
   				<ul>
   					<li><a href="http://www.twitter.com/wepopulus">WePopulus on Twitter</a></li>
   					<li><a href="http://voices.washingtonpost.com/44" title="Washington Post's coverage of the 44th President">Washington Post: 44</a></li>   	
   					<li><a href="http://www.theinsanityreport.com" title="">The Insanity Report</a></li>
   					<li><a href="http://www.votesmart.org" title="">VoteSmart</a></li>
   					<li><a href="http://www.watchdog.net" title="">Watchdog.net</a></li>
   					<li><a href="http://www.govtrack.us" title="">GovTrack</a></li>
   					<li><a href="http://www.govluv.com" title="">GovLuv</a></li>
   					<li><a href="http://www.freedomspeaks.com" title="">FreedomSpeaks</a></li>   					
   				</ul></li>
       	</ul>
	<form id="getzip" action="home.php" method="get" target="_self" onsubmit="return validateZIP(this.zipcode.value)">
	<input type="text" name="zipcode" id="zipcode" value="*****-****" maxlength="10" size="10" onclick="this.value=''" /> 
	<input type="submit" id="submit" value="Find Another" class="submit-button" />
		</form>

	<div id="twit">
		<div id="twitter_div" class="twitlist"> <ul id="twitter_update_list"><li></li></ul></div>
		<img src="img/twitbutton.png" alt=" " title="Follow us on Twitter!"/>
<?php 
function ltwit() {
$url="http://api.twitter.com/1/trends/available.xml";
$args='?lat='.$_SESSION["lat"].'&long='.$_SESSION["lng"];
$get=simplexml_load_file($url.$args);
$loc=$get->location;
$_SESSION["woeid"]=$loc->woeid;
$url2="http://api.twitter.com/1/trends/".$loc->woeid.".xml";
$got=simplexml_load_file($url2);
echo '<div id=trends>
<h5>Local Trends in '.$got->trends->locations->location->name.'</h5>';
$trend=$got->trends->trend;
foreach ($trend as $t) {
echo '<li><a href="http://www.twazzup.com/?q='.urlencode($t).'" title="Twazzup! Search">'.$t.'</a></li>';}
echo '</div>';}

//ltwit();
?>
		</div>
		
	<div class="GAD"><object data="Gad.htm" type="text/html" width="200" height="200"></object></div>
<!--[if lte IE 6]>
<div id="Gadsie">
<script type="text/javascript">
google_ad_client = "pub-5571120348274858";
/* 200x200, created 3/29/10 */
google_ad_slot = "1369573054";
google_ad_width = 200;
google_ad_height = 200;
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></div>
<![endif]-->

</div> <!--end side div-->