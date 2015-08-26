<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
if (isset($_REQUEST['_SESSION'])) die("Stop trying to hack!");
require_once('lib/keys.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>W E  :  p o p u l U S</title>

<base target="_blank"/>
<!--[if lte IE 6]>
<style>
#GAD {display:none;}
#Gadsie {clear:both; text-align:center; 
width:750px; margin-top:10px;}
</style>
<![endif]-->

<link rel="stylesheet" type="text/css" href="style/contact.css" />
<link rel="stylesheet" type="text/css" href="style/wtp2.css.php" />
<link rel="stylesheet" type="text/css" href="style/menu.css.php" />
<!--[if IE 5]> <link href="style/ie5.css" rel="stylesheet" type="text/css" /> <![endif]-->
<!--[if IE 6]> <link href="style/ie6.css" rel="stylesheet" type="text/css" /> <![endif]-->

<script type="text/javascript" src="http://www.google.com/jsapi?key=<?=_GMKEY_?>"></script>
<script type="text/javascript">
google.load("jquery", "1.4");
</script>
<script type="text/javascript" src="scripts/wloader.js"></script>
<script type="text/javascript" src="scripts/menu.js"></script>
<script type="text/javascript" src="scripts/slide_source.js"></script>
<script type="text/javascript" src="scripts/tslide.js"></script>
<script type="text/javascript" src="scripts/autoheight.js"></script>
<script type="text/javascript" src="scripts/twit.js"></script>	
<!--script type="text/javascript">
function clearForm(ele) {
$(ele).find(':input').each(function() {
        switch(this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });
}
</script-->
</head>

<body onunload="GUnload()">
<!--script type="text/javascript" src="scripts/gsync.js"></script--> <!-- google analytics -->

<!--div><img id="bg_frame" src="img/bbox.jpg" alt="" title="" /></div-->
<div id="bg_window">

<div class="side">

<div id="head">
	<ul id="topmenu">
		<li><h3>We: Sections</h3></li>
   	   	<li><a href="myreps2.php?zipcode=<?=$_GET['zip_code']?>" target="bodframe" title="Determine what your district is, and who represents it.">My: District &amp; Government</a></li>
   	   	<li><a href="spending.php?zipcode=<?=$_GET['zip_code']?>" target="bodframe" title="Billions are spent on government contracts... Track how much Federal money is spent near you and who it is going to.">Federal Spending <br />in my: Neighborhood</a></li>
   	   	<li><a href="grafx.php" target="bodframe" title="Information graphics or infographics are visual representations of information, data or knowledge.">We: Info Graphics</a></li>
   	   	<li><a href="http://www.wepopulus.com/weBlog" target="_top">We: Blog</a></li>
   	   	<li><a href="about.htm" target="bodframe">About We:</a></li>
		</ul>
	</div>
	
   	   	<ul id="sidemenu"> <!--must be id for menu.js to work-->
   	   	   	<li><a href="#" class="submenu" onclick="return false">Offices</a>
   	   	   		<ul>
   	   		   	   	<li><h3> Links and Tools:</h3></li>
   					<li><a href="http://www.house.gov/house/MemberWWW_by_State.shtml">Representatives</a></li>
   					<li><a href="http://www.house.gov/house/CommitteeWWW.shtml">Committees</a></li>
   					<li><a href="http://www.house.gov/house/orgs_pub_hse_ldr_www.shtml">Leadership</a></li>
   					<li><a href="http://www.house.gov/house/Party_organizations.shtml">House Organizations</a></li>
				</ul></li>
   			<li><a href="#" class="submenu" onclick="return false">Resources</a>
   				<ul>
   					<li><a href="http://speaker.house.gov/" target="bodframe">Speaker of the House</a></li>
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
					<hr />
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
		<div id="twitter_div" class="twitlist"> <ul id="twitter_update_list"><li></li></ul>
			</div>
		<img src="img/twitbutton.png" alt=" " title="Follow us on Twitter!"/>
		</div>
	
	<div class="GAD"><object data="Gad.htm" type="text/html" width="200" height="200"></object>
		</div>
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

<div id="m_window">
	<div id="dykdiv"><iframe id="dykframe" name="dykframe" class="autoHeight" src="dyk.php" frameborder="0" scrolling="no" ></iframe>
		</div>
	<div id="bod"><iframe id="bodframe" name="bodframe" class="autoHeight" src="myreps2.php?zipcode=<?=$_GET['zip_code']?>" frameborder="0" scrolling="yes" ></iframe>	
		</div>
	<div id="foot">Created by Yo Productions, of <a href="http://www.wepopulus.com">The Hilmar Companies, Inc.</a> | Follow <a href="http://www.twitter.com/wepopulus">@wEpopulus</a> on 	<a href="http://www.twitter.com/wepopulus">twitter</a>.
		</div>
	</div>	

<div class="slide-out-div" id="contact-area">
	<form method="post" action="contactwe.php" id="weForm">
    	<label for="name">Name:</label> <input type="text" name="name" id="name" />
   		<label for="email">Email:</label> <input type="text" name="email" id="email" />
    	<label for="msg">Message:</label><br /> <textarea name="msg" id="msg" cols="10" rows="5"></textarea>    
	    <input type="reset" name="Reset" value="Reset" class="submit-button"/>
    	<input type="submit" id="formsubmit" value="Submit" class="submit-button" />
	</form>
	<a href="http://twitter.com/wepopulus" class="handle"></a>
	</div>
</div>

<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/wepopulus.json?callback=twitterCallback2&amp;count=8"></script>
<script type="text/javascript" src="scripts/form.js"></script>
</body>
</html>
<!-- 
How to change our Govt:Know the Law ()|Become trust-worthy (fix credit)|Know the Right People (learn district officials)|Be Healthy (healthcare)|Be Rich (economy, budget, taxes)|
	How Our: Gov't Works>>Structure|Authority|Legislation|
	Your: Neighborhood>>
	We: Blog

wepop:GovT:
wepop:Community:
wepop:Laws:
wepop:Health
wepop:Credit


infographics
blog articles
links
definitions
rss feeds
-->