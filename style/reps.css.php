<?php 
header("Content-type: text/css");
include_once("scheme.php");
echo '
#repspage th {color:'.$PP["pp4"].'; border-color:'.$PP["pp2"].'}
#repspage td a:link{color:'.$PP["pp4"].'; border-color:'.$PP["pp3"].'}
#repspage td a:hover{color:'.$PP["pp5"].'}
#repspage td a:visited{color:'.$PP["pp1"].'}
#repspage .container{background-color:'.$PP["pp2"].'}
#repspage .namecell, .repname {color:'.$PP["pp6"].'}
#repspage #atable {background-color:'.$PP["pp3"].'}
';?>
#repspage th {margin:5px;text-align:center;font-variant: small-caps; font-size: 1.1em; font-weight: bold; border-bottom: 1px dotted}
#repspage td {text-align:center; display:table-cell; font-variant: normal; font-size: 1em;padding:5px}

#repspage #error_alert{font-family:Verdana, Geneva, sans-serif;font-size:20px;width:100%;}
#repspage #finding_location{width:320px;font-family:Verdana, Geneva, sans-serif;font-size:18px;vertical-align:top;}
.repname {font-weight: bolder;}
#repspage .title {display: block;font-size:1.5em;font-weight:800; margin:20px;text-align: center;}
.gns-snippet{text-align: justify !important}

#repspage .container{overflow:hidden;padding:9px;margin:12px 11px;float:left;border:1px solid <?=$PP["pp5"]?>;
border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px;}

.container#myreps .distcell {width:5.6pc} 
.container#myreps .phonecell {width:5.8pc}

.container#bio {width:auto}
.container#bio li {margin: 4px}
.container#bio td {border-bottom: 1px dotted <?=$PP["pp5"]?>}

.container#committees {width:380px}

.container#industries {width:340px}

.container#sectors {width:340px}

.container#summary {width:380px}

.container#orgs {width:320px}

.container#trips {width:350px;text-align: center }
.container#trips div{border: 1px inset <?=$PP["pp6"]?>;
border-radius:5px;-webkit-border-radius:5px;-moz-border-radius:5px}
.container#trips table {margin: 8px;left:0}
.container#trips td{text-align: left; border-bottom: 1px dotted <?=$PP["pp5"]?>}
.container#trips .trip {float:left}

.container#bills {width:auto}
.container#bills td {width:5pc;}
.container#bills .votecell {width:2pc}
.container#bills .billcell {width:4pc}
 .yvote{padding-right:20px; background:transparent url(../img/thumbs-up.png) no-repeat 100% 0%}
 .nvote{padding-right:20px; background:transparent url(../img/thumbs-dn.png) no-repeat 100% 0%}

.container#officials {}
.container#billsumm {width:500px}

#repspage .container img {width: 150px;float:left;margin:5px; border: 1px solid <?=$PP["pp6"]?>}
#repspage .container li {line-height:13px}
#repspage .container table {position:relative;margin: auto}
#repspage #atable {width:150px;display:block;clear:left;float:left;margin: 5px;border: 1px dotted <?=$PP["pp6"]?>;}
#repspage #btable {margin:11px;}

#repspage .source{font-size:.75em;text-align:center;font-family:Verdana, Geneva, sans-serif;clear:both;padding:10px 0px 0px}

#inputs {position:relative;margin:auto}
#inputs select, input{padding:2px;font-family: Georgia, sans-serif;font-size: 1em;border:2px solid <?=$PP["pp4"]?>;
border-radius;-webkit-border-radius: 5px;-moz-border-radius:5px}
#inputs input:focus, #inputs select {border: 2px solid <?=$PP["pp6"]?>}
#inputs input.submit-button {width:95px}