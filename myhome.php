<?php 
if (isset($_REQUEST['_SESSION'])) die("Stop trying to hack!");
//require_once("lib/functions_nec.php"); //must call first because sends headers.
require_once("lib/functions_misc.php");
?>
<div id="finding_location"><img src="img/wait-wheel.gif" alt="" />Gathering Local Data for <?=$_SESSION["city"]?>...</div>

<div id="homepage">
	<div id="location">
<?php
echo '
<p class="title">'.$_SESSION['city'].', '.$_SESSION['state'].'<br />
Zipcode: ',$_SESSION['zip_code'],'<br />
District(s): ', $_SESSION['district_text'], '<br />
Geo Coordinates: '.round($_SESSION["lat"], 5).', '.round($_SESSION["lng"], 5).'</p>';
?>
</div>

<div>
<?php
weath();
wiki(urlencode($_SESSION['city']));
//groups($_SESSION["zip_code"]);
//def("populus");
//abb("lol");
?>
</div>

<div id="Gnews"></div>

<script type="text/javascript"> //<!-- google news script -->
//<![CDATA[
google.load("elements", "1", {packages : ["newsshow"]});

function onLoad() {
  // geo location to City
  var options = {
	"linkTarget" : "_blank",
//  	"format" : "300x250", // 300x250, or 728x90 (default)
    "queryList" : [
    {
      title : "<?= $_SESSION['city'] ?> News:",
      geo : "<?= $_SESSION['zip_code'] ?>",
    }
    ]
  }
  var content = document.getElementById('Gnews');
  var newsShow = new google.elements.NewsShow(content, options);
}
google.setOnLoadCallback(onLoad);
//]]>
</script>
</div><!--end homepage-->