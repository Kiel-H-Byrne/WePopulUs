<?php 
header("Content-type: text/css");
include_once("scheme.php");
echo '
#homepage th {color:'.$PP["pp4"].'; border-color:'.$PP["pp6"].'}
#homepage td a:link{color:'.$PP["pp4"].'; border-color:'.$PP["pp6"].'}
#homepage td a:hover{color:'.$PP["pp5"].'}
#homepage td a:visited{color:'.$PP["pp1"].'}
#homepage td {border-color:'.$PP["pp5"].'}
#homepage .container {background-color:'.$CC["cc7"].'}

#homepage #error_alert{color:'.$PP["pp6"].'}
#homepage #amount{color:'.$PP["pp6"].'}
#homepage #location{color:'.$PP["pp4"].'}
#homepage #finding_location {color:'.$PP["pp2"].'}
';?>
#homepage th {margin:5px;text-align:center;font-variant: small-caps; font-size: 1.1em; font-weight: bold;border-bottom: 1px dotted <?=$PP["pp4"]?>}
#homepage td {margin:5px;width:11pc; text-align:center; display:table-cell; font-variant: normal; font-size: 1em;padding:5px;border-bottom: 1px dotted <?=$PP["pp5"]?>}
#homepage select, #homepage input{padding:3px;font-family: Georgia, sans-serif;display:inline-block;font-size: 1em;border:1px solid <?=$PP["pp5"]?>;margin-left: 8px;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;}

#homepage .group {text-align:center}
#homepage .group p {padding:4px 11px;visibility:hidden;text-align: left;position:relative;height:0px;left:-50px}
#homepage .group:hover p {visibility:hidden;height:5px;}


#homepage #location{position:relative;margin:auto;width:400px;border:2px outset <?=$PP["pp5"]?>;
border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;}
#homepage #inputs{width:320px;margin:0 auto;}
#homepage #error_alert{font-family:Verdana, Geneva, sans-serif;font-size:20px;width:100%;}
#homepage #finding_location{font-family:Verdana, Geneva, sans-serif;font-size:18px;vertical-align:top;}
#homepage #Gmap{position:relative;margin:11px auto;max-width: 90%; height: 350px; border: 1px solid <?=$PP["pp6"]?>;clear:both;overflow:hidden;}
#homepage #Gnews{position:relative;margin: 11px auto;width:728px;height: 90px;border:1px solid <?=$PP["pp6"]?>; clear:both} 


#homepage .title {font-size:1.2em;font-weight:800; margin:20px;text-align: center;font-stretch:expanded}
#homepage .source{position:relative;margin:auto;font-size:.8em;text-align:center;font-family:Verdana, Geneva, sans-serif;clear:both;padding:10px 0px 0px}
#homepage .chart{width:300px;margin: 15px 10px;float:left;}
#homepage .container {position:relative;width:250px;float:left;overflow:hidden;padding:7px;margin:15px 11px;border:1px solid <?=$PP["pp6"]?>;
border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;}
#homepage #weather table {position: relative;margin: auto;padding:2px}
#homepage #wiki img {float:left;margin:11px;border: 1px solid <?=$PP["pp5"]?>}
#homepage #wiki {width:330px}
