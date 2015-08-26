<?php
header("Content-type: text/css");
include_once("scheme.php");
echo '
#gallery .photobox {background-color:'.$PP["pp2"].'}
#gallery .photobox .grafx img{border-color:'.$PP["pp5"].'}
'; ?>
#grafxpage {overflow-x: scroll;height:650px;}
#gallery {position:relative;top:0;width: 13000px;}
#gallery .photobox {float:left; width:450px;padding: 5px;margin: 11px 283px 11px 15px;border: 1px maroon inset;-khtml-border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px}
#gallery .photobox .grafx img{max-height:350px; max-width: 430px;border:1px outset}
#gallery .photobox a{position:relative;margin:auto}
#gallery .info {clear:both;padding:3px}