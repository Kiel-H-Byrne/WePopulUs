<?php header("Content-type: text/css");
include_once("scheme.php")?>
@charset "us-ascii";
@charset "utf-8";
@charset "iso-8859-1";

<?='
/* colors */
* hr {color:'.$CC["cc4"].';background-color:'.$CC["cc4"].'}
body a:link{color:'.$PP["pp6"].'}
body a:visited{color:'.$CB["cb1"].'}
body a:hover{color:'.$CB["cb2"].'}
ul.sidemenu li a{color:'.$PP["pp1"].'}
ul.sidemenu li a:link, ul.sidemenu li a:active, ul.sidemenu li a:link, ul.sidemenu li a:visited {background-color: '.$PP["pp6"].'} 
ul.sidemenu li a:visited{color:'.$PP["pp2"].';}
ul.sidemenu li a:hover:not(.submenu), ul.sidemenu li ul {background-color:'.$PP["pp6"].'; color:'.$CC["cc7"].'}
.side{background-color:'.$PP["pp1"].';color:'.$PP["pp4"].'}
#foot{color:'.$CA["ca5"].'}
#foot a{color:'.$CB["cb1"].'}
.slide-out-div{background-color:'.$CC["cc7"].'}
#twit{background-color:'.$PP["pp1"].'}
#twitter_div{background-color:'.$CC["cc7"].'}
ul#twitter_update_list li{color:'.$PP["pp6"].'}
ul#twitter_update_list li span {color: '.$PP["pp4"].'}
ul#twitter_update_list li a , ul#twitter_update_list li a:link{color:'.$PP["pp6"].'}
ul#twitter_update_list li a:visited{color:'.$CB["cb6"].'}
ul#twitter_update_list li a:hover {color:'.$CA["ca5"].'}';
?>

#twit{position:relative;margin: auto;margin-bottom:5px;margin-top:5px;padding: 35px 1px 1px 1px;width:190px;z-index: 10;font-family: Times, Georgia, sans-serif;
border-radius:10px;-moz-border-radius: 10px;-webkit-border-radius:10px;-khtml-border-radius:10px;}	

#twitter_div{position: relative;padding: 3px 5px 3px 20px;margin: 0;border: 1px dotted <?=$PP["pp1"]?>;text-align: left;overflow:hidden;
border-radius:10px;-moz-border-radius: 10px;-webkit-border-radius:10px;-khtml-border-radius:10px}

#twit img{height: 30px;width: 188px; border:1px outset <?=$PP["pp2"]?>;position:absolute;top:0;padding:1px 0;margin:auto;
border-radius:5px;-moz-border-radius: 5px;-webkit-border-radius:5px;-khtml-border-radius:5px}

ul#twitter_update_list {width: auto; padding: 0; margin: 0}
ul#twitter_update_list li {width: auto; padding: 0; border-bottom:1px dotted <?=$PP["pp2"]?>; list-style: circle; }
ul#twitter_update_list li a , ul#twitter_update_list li a:link{border-bottom:1px  dotted <?=$PP["pp5"]?>; text-decoration: none;font-size: .8em} 
ul#twitter_update_list li a:visited{border-bottom:1px solid <?=$PP["pp4"]?>}
ul#twitter_update_list li a:hover {border-bottom:1px solid <?=$PP["pp2"]?>}

.jsclass body .randomcontent{display: none;}/*Do NOT remove! CSS to hide random contents in JS enabled browsers*/
* body {overflow:visible}
* html #foot{\height:23px;he\ight:23px}
* textarea{resize:none; noresize:noresize}
* hr{size:1px;width:80%}
html,body{margin:0;padding:0}
html>body{height:auto}
body{font:1em Georgia,"Footlight MT","Times New Roman",Times,serif;height: 100%;margin: 0px;padding: 0px;font-size: .8em; overflow-x: hidden;z-index: 5}
body a:link{text-decoration:none}
body a:visited{text-decoration:none}
body a:hover{text-decoration:underline}
h1,h2,h3, h4, h5, h6{text-align:center;font-family:"Georgia";margin:6px;padding:0px}
/* #bg_pat{background: url("../img/backs/back<?=rand(1,37)?>.jpg") repeat fixed; height:100%;position:absolute;left:0;top:0;width:100%;z-index:1;opacity:.1} */
#bg_frame{/* visibility:none;/**/ height:100%;position:absolute;left:0;top:0;width:100%;z-index:2}
#bg_window{height:100%;width:100%;left:0;overflow-x:hidden;position:absolute;top:0;z-index:3}

#dykdiv{position:relative;height:100px;margin:3px 3px 3px 210px;width:860px}
#dyk {overflow:hidden;max-height:75px;background-color:<?=$PP["pp1"]?>;margin:6px; border: 1px dotted <?=$PP["pp6"]?>;border-radius:10px;-moz-border-radius: 10px;-webkit-border-radius:10px;-khtml-border-radius:10px;}
#dyk .title {position:relative;float:left;width:6.5pc;font-size: 1.9em; text-shadow: 3px 4px 3px gray;text-align: center;font-variant:small-caps;font-weight: 600;margin:6px}
#dyk .group1 {font-size:1.2em;margin:auto;text-align: justify;font-weight: 750;display:block;padding:20px;margin:0px;vertical-align:middle}
#dyk .source {float: right; font-size: .9em;font-style: inherit; font-weight: lighter}


#bod{margin:6px 6px 24px 210px;width:830px;/*border:2px inset <?=$PP["pp3"]?>/**/;overflow:hidden;
border-radius:10px;-khtml-border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;}

.side {border-right:1px inset;left:1px;left:0px;position:absolute;padding:3px;width:200px;height:inherit;overflow:visible;z-index: 10; -khtml-border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px}

ul.sidemenu {margin: 11px 0;padding: 0;list-style-type: none;width: 100%;} /* Main Menu Item widths */
ul.sidemenu li{position: relative}
/* Top level menu ul links style */
ul.sidemenu li a{display: block;overflow:auto;text-decoration:none;text-align:center;font-weight:750;font-size:1.2em;padding:6px;margin:2px;border-bottom:1px dotted <?=$PP["pp2"]?>;
-khtml-border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px} /*force hasLayout in IE7 */

/*Sub level menu items */
ul.sidemenu li ul{position: absolute;left:200px;width: 170px;top: 0;visibility:hidden;border:1px inset <?=$PP["pp4"]?>}/*Sub Menu Items width */
ul.sidemenu li:hover ul{visibility:visible}

.side #tweets {margin:11px;}
.side #tweets *{position:relative;margin:auto}
.side input{padding:2px;width:75px;font-family: Georgia, sans-serif;display:inline-block;font-size: 1.1em;border:2px solid <?=$PP["pp4"]?>;margin:7px 0 7px 3px;
border-radius;-webkit-border-radius: 5px;-moz-border-radius:5px}
.side input:focus {border: 2px solid <?=$PP["pp6"]?>}
.side input.submit-button {width:95px}

#foot {font-size:.85em;height:23px;margin-left:210px;margin:auto;padding-bottom:2px;position:relative;text-align:center;width:inherit;z-index:5}
#foot table {text-align:center;position:relative;margin:auto;}
#foot a.valid{padding-left:16px; background:transparent url(../img/tick.png) no-repeat 0% 50%}
#foot a.valid:hover{background:transparent url(../img/tick-hover.png) no-repeat 0% 50%}
#foot td {padding:30px}
.slide-out-div{border:1px solid <?=$PP["pp2"]?>;padding:4px;z-index:20}
.clear{clear:both}
