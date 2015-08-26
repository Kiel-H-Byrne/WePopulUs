<?php 
header("Content-type: text/css");
include_once("scheme.php");
echo '
#billspage th {color:'.$PP["pp4"].'; border-color:'.$PP["pp2"].'}
#billspage td a:link{color:'.$PP["pp4"].'; border-color:'.$PP["pp3"].'}
#billspage td a:hover{color:'.$PP["pp5"].'}
#billspage td a:visited{color:'.$PP["pp1"].'}
#billspage .container{background-color:'.$PP["pp2"].'}
#billspage .namecell, .repname {color:'.$PP["pp6"].'}
#billspage #atable {background-color:'.$PP["pp3"].'}
';?>
#billspage th {margin:5px;text-align:center;font-variant: small-caps; font-size: 1.1em; font-weight: bold; border-bottom: 1px dotted}
#billspage td {text-align:center; display:table-cell; font-variant: normal; font-size: 1em;padding:5px}

#billspage #error_alert{font-family:Verdana, Geneva, sans-serif;font-size:20px;width:100%;}
#billspage #finding_location{width:320px;font-family:Verdana, Geneva, sans-serif;font-size:18px;vertical-align:top;}
.repname {font-weight: bolder;}
#billspage .title {display: block;font-size:1.5em;font-weight:800; margin:20px;text-align: center;}
.gns-snippet{text-align: justify !important}

#billspage .container{overflow:hidden;padding:9px;margin:12px 11px;float:left;border:1px solid <?=$PP["pp5"]?>;
border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;}
#billspage .container img {width: auto;float:left;margin:2px; border: 1px solid <?=$PP["pp6"]?>}
#billspage .container table {position:relative;margin: auto}

#billspage .container#bills {width:30%}
#billspage .container#bills td {max-width:15pc}
#billspage .container#bills .votecell {width:2pc}
#billspage .container#bills .billcell {width:4pc}
#billspage  .yvote{padding-right:20px; background:transparent url(../img/thumbs-up.png) no-repeat 100% 0%}
#billspage  .nvote{padding-right:20px; background:transparent url(../img/thumbs-dn.png) no-repeat 100% 0%}

#billspage .container#billsumm {width:55%}

#billspage .container#laws {width:55%}
#billspage .rss {text-align: center;font-size: .9em}
#billspage .rss li {padding: 4px 11px;text-align: left;}

#billspage .source{font-size:.75em;text-align:center;font-family:Verdana, Geneva, sans-serif;clear:both;padding:10px 0px 0px}

#billspage #inputs {position:relative;margin:auto}
#billspage #inputs select, input{padding:2px;font-family: Georgia, sans-serif;font-size: 1em;border:2px solid <?=$PP["pp4"]?>;
#billspage border-radius;-webkit-border-radius: 5px;-moz-border-radius:5px}
#billspage #inputs input:focus, #inputs select {border: 2px solid <?=$PP["pp6"]?>}
#billspage #inputs input.submit-button {width:95px}