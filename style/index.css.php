<?php header("Content-type: text/css");
include_once("scheme.php")?>
@charset "utf-8";

#window {clear:both;background:rgb(220,220,220);background:rgba(220,220,220,.9);opacity:0.8;filter:alpha(opacity=80);top:30%;width:700px;position:relative;margin:auto;padding: 15px;font-size: 16px;
 -moz-border-radius: 25px; -webkit-border-radius:25px; -khtml-border-radius:25px;}
#window p {text-align: center; font-size: 32px;font-weight:bolder;}
#window hr {width:60%;background-color:<?=$PP["pp6"]?>;color:<?=$PP["pp6"]?>}
#window input{padding:2px;width:90px;font-family: Georgia, sans-serif;margin: 6px;display:inline;font-size: 1em;border:2px solid <?=$PP["pp6"]?>;-webkit-border-radius: 5px;-moz-border-radius:5px}
#window input:focus {border: 2px solid <?=$PP["pp6"]?>;}
#window input.submit-button {width:45px}
#window ul{margin:20px 0px 20px 120px;color:<?=$PP["pp4"]?>}
#window li{margin:7px;font-size:1.2em}
#window #brand{font-size: 1.2em;text-shadow: 5px 5px 9px <?=$PP["pp5"]?>;margin: 13px}
#window .title {font-size:1.4em;font-weight:800; margin:20px auto;}
#window form {position: relative;margin: auto;font-size: 1.2em;text-align: center;}
#window .gps {/*display:none;visibility: hidden;/**/text-align:center;font-size:10px;font-weight: 100;}
#window img {position: relative;left: 33%}
#error_alert {font-family: Verdana, Geneva, sans-serif;font-size: 20px;color: #D84F1A;width: 100%;}

#finding_location{width:320px;font-family:Verdana, Geneva, sans-serif;color:<?=$PP["pp2"]?>;font-size:28px;vertical-align:top;}
#finding_location img {size: 250%;}
#location_form{width: 320px;}

#foot {position: absolute;bottom: 0;margin: auto}