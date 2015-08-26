<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>

<meta name="viewport" content="width=1120" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>W E  :  p o p u l U S</title>

<base target="_blank"/>
<!--[if lte IE 6]>
<style>
#GAD {display:none;}
#Gadsie {clear:both; text-align:center; 
width:750px; margin-top:10px;}
</style>
<![endif]-->

<link rel=”Shortcut Icon” href=”/favicon.ico”>
<link rel=”icon” href=”/favicon.ico” type=”image/x-icon”>

<link rel="stylesheet" type="text/css" href="style/text.css" />
<link rel="stylesheet" type="text/css" href="style/contact.css" />
<!--[if IE 5]> <link href="style/ie5.css" rel="stylesheet" type="text/css" /> <![endif]-->
<!--[if IE 6]> <link href="style/ie6.css" rel="stylesheet" type="text/css" /> <![endif]-->
<link rel="stylesheet" type="text/css" href="style/wtp2.css.php" />

<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAS6Af49j863sp8bda7yAjVBSY07mVlX8cRHcmeGKIYSqopSYUqBRNmWvtUOq5C4o650z9QwLHHmg7Nw"></script>
<script type="text/javascript"> google.load("jquery", "1.4") </script>
<script type="text/javascript" src="scripts/slide_source.js"></script>
<script type="text/javascript" src="scripts/tslide.js"></script>
<script type="text/javascript" src="scripts/twit.js"></script>

<? 
require('lib/functions_nec.php');
switch ($page) { 
case "sp":
echo '<link rel="stylesheet" type="text/css" href="style/spending.css.php" media="screen" />';
break;
case "reps":
echo '<link rel="stylesheet" type="text/css" href="style/reps.css.php" media="screen" />';
break;
case "bills":
echo '<link rel="stylesheet" type="text/css" href="style/bills.css.php" media="screen" />';
break;
case "fx":
echo '
<link rel="stylesheet" href="style/grafx.css.php" type="text/css" media="screen" />
<link rel="stylesheet" href="style/jqzoom.css" type="text/css" media="screen" />
';
break;
case "about":
echo '<link rel="stylesheet" type="text/css" href="style/about.css.php" media="screen" />';
break;
default:
echo '
<link rel="stylesheet" type="text/css" href="style/home.css.php" media="screen" />
<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='._GMKEY_.'"></script>
<script type="text/javascript" src="http://www.govtrack.us/scripts/gmap-wms.js"></script>';
break;
}
?>
</head>
<body onload="randomfact.init()" onunload="GUnload()">
<script type="text/javascript" src="scripts/gsync.js"></script><!-- google analytics -->