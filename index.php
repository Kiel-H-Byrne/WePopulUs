<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"> 
<head> 
<title>W E  :  p o p u l U S</title> 
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=320" />

<link rel="stylesheet" type="text/css" href="style/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="style/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="style/wtp.css.php" media="screen" />
<link rel="stylesheet" type="text/css" href="style/index.css.php" media="screen" />

</head>
<body>
<div id="finding_location">
<img src="img/wait-wheel.gif"/> Locating...
</div>
<script type="text/javascript" src="scripts/gsync.js"></script>
<script type="text/javascript" src="scripts/geometa.js"></script>
<script type="text/javascript">
//<![CDATA[
function foundLocation(position)
{
window.location.href = "home.php?lat=" + position.coords.latitude + "&lng=" + position.coords.longitude;
}
function locationError()
{
	element = document.getElementById('finding_location');
	element.style.display = 'none';
 	document.writeln('<div id="location_form">');
		document.writeln('<h3>Geolocating did not work correctly... How about we use your zipcode:</h3>');
    	document.writeln('<form id="getzipfail" action="home.php" method="get" onsubmit="return validateZIP(this.zipcode.value)">');
    	document.writeln('Zip Code: <input type="text" id="zipcodefail" name="zipcode" />');
		document.writeln('<input type="submit" id="submit" value="Go!" />');
		document.writeln('</form>'); 
		document.writeln('</div>');	
}
//]]>
</script>
<div id="frame"><img id="bg_frame" src="img/bbox.jpg" alt="" title="wePopulus" /></div>  
<div id="bg_window">
    <div id="window"> 
      	<p class="title1">Welcome to <span id="brand">We: Populus</span></p>
      	<ul>
      	<li><em>Pronunciation:</em> \<strong>'w&#275;</strong>-'p&#243;-p&#250;-l&#250;s\</li>
      	<li>Function: Term of collective unity and power.</li>
      	<li>Etymology: Latin &amp; English</li>
      	<li>Usage: <strong>'We' the People</strong> of the United States...</li>
      	</ul>
		<form id="getzip" action="home.php" method="get" onsubmit="return validateZIP(this.zipcode.value)">
		<span class="title">Enter your Zipcode:</span>
		<input type="text" name="zipcode" id="zipcode" value="*****-****" maxlength="10" size="10" onclick="this.value=''" /> 
		<input type="hidden" name="loc" id="loc" value=""/> 
		<input type="submit" id="Submit" value="Go!" class="submit-button" />
		</form>
	<script type="text/javascript">
if (navigator.geolocation) {	
 	document.writeln('<hr /><a href="#" onclick="navigator.geolocation.getCurrentPosition(foundLocation, locationError);">');
 	document.writeln('<img class="gps" src="img/locate.png" alt="GPS Locator"/>');
 	document.writeln('</a>');      
    } 
    else
    {
    document.writeln('<hr /><p class="gps">If you are accessing this page using a mobile device, or a browser that supports geo-positioning we: will locate you automatically!</p>'); 	
    }
</script>
</div>     

<div id="foot">Created by Yo Productions. Creative Division of <a href="mailto:TheHilmar@gmail.com">The Hilmar Companies, Inc.</a> | Follow <a href="http://www.twitter.com/wepopulus">@wePopulus</a> on <a href="http://www.twitter.com/wePopulus">twitter</a>.
</div> 

</div> 
<script type="text/javascript" src="scripts/form.js"></script>
</body>
</html>