<?php 
header("Content-type: text/css");
include_once("scheme.php");
echo '
#spendingpage th {color:'.$PP["pp4"].'; border-color:'.$PP["pp6"].'}
#spendingpage td a:link{color:'.$PP["pp4"].'; border-color:'.$PP["pp3"].'}
#spendingpage td a:hover{color:'.$PP["pp5"].'}
#spendingpage td a:visited{color:'.$PP["pp1"].'}
#spendingpage td {border-color:'.$PP["pp5"].'}
#spendingpage .container {background-color:'.$PP["pp2"].'}

#spendingpage #error_alert{color:'.$PP["pp6"].'}
#spendingpage #amount{color:'.$PP["pp6"].'}
#spendingpage #location{color:'.$PP["pp4"].'}
#spendingpage #finding_location {color:'.$PP["pp2"].'}

';?>
#spendingpage .container table {position: relative;margin: auto}
#spendingpage th {margin:5px;text-align:center;font-variant: small-caps; font-size: 1.1em; font-weight: bold;border-bottom: 1px dotted <?=$PP["pp4"]?>}
#spendingpage td {text-align:center; display:table-cell; font-variant: normal; font-size: 1em;padding:5px;border-bottom: 1px dotted <?=$PP["pp5"]?>}

#spendingpage #error_alert{font-family:Verdana, Geneva, sans-serif;font-size:1.5em;width:100%;text-align:center;margin:20px auto;}
#spendingpage #finding_location{width:420px;font-family:Verdana, Geneva, sans-serif;font-size:18px;vertical-align:top;}
#spendingpage select, input{padding:3px;font-family: Georgia, sans-serif;display:inline-block;font-size: 1em;border:1px solid <?=$PP["pp5"]?>;margin-left: 8px;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;}
#spendingpage #inputs{width:320px;margin:0 auto;}
#spendingpage #amount{width:100%;clear:both;font-family:Verdana, Geneva, sans-serif;text-align:center;}
#spendingpage #amount p{font-size:11px;text-align:center;line-height:13px;}
#spendingpage #location{width:100%;clear:both;font-family:Verdana, Geneva, sans-serif;font-size:14px;text-align:center;margin-bottom:5px;}
#spendingpage #location_form,li#spendingpage{width:320px;}

#spendingpage .title {font-size:1.2em;font-weight:800; margin:20px;text-align: center}
#spendingpage .source{font-size:.75em;text-align:center;font-family:Verdana, Geneva, sans-serif;clear:both;padding:10px 0px 0px}
#spendingpage .chart{width:300px;margin: 15px 10px;float:left;}
#spendingpage .container {max-width:290px;overflow:hidden;padding:7px;margin:15px 9px;float:left;border:1px solid <?=$PP["pp5"]?>;
border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;}