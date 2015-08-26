<?php include_once("scheme.php"); ?>
/* ================================================================ 
This copyright notice must be untouched at all times.

The original version of this stylesheet and the associated (x)html
is available at http://www.cssplay.co.uk/menus/final_drop2.html
Copyright (c) 2005-2009 Stu Nicholls. All rights reserved.
This stylesheet and the associated (x)html may be modified in any 
way to fit your requirements.
=================================================================== */
/* style the outer div to give it width */

#sidemenu a, #sidemenu a:visited {color:<?=$PP["pp1"]?>}
/* style the second level background */
#sidemenu ul ul a.drop, #sidemenu ul ul a.drop:visited {background-color:<?=$PP["pp2"]?>}
/* style the second level hover */
#sidemenu ul ul a.drop:hover{background-color:<?=$PP["pp4"]?>}
#sidemenu ul ul:hover > a.drop {background-color:<?=$PP["pp3"]?>}
/* style the third level background */
#sidemenu ul ul ul a, #sidemenu ul ul ul a:visited {background-color:<?=$PP["pp2"]?>}
/* style the third level hover */
#sidemenu ul ul ul a:hover {background-color:<?=$PP["pp3"]?>}
#sidemenu ul ul ul:hover > a {background-color:<?=$PP["pp5"]?>}

#sidemenu a, #sidemenu a:visited {border:1px solid <?=$PP["pp1"]?>}
#sidemenu a, #sidemenu a:visited {background-color:<?=$PP["pp2"]?>} 
#sidemenu ul ul a, #sidemenu ul ul a:visited {color:<?=$PP["pp4"]?>;background-color:<?=$PP["pp3"]?>}

/* style the top level hover */
#sidemenu a:hover, #sidemenu ul ul a:hover{color:<?=$PP["pp1"]?>; background:<?=$PP["pp4"]?>;}
#sidemenu:hover > a, #sidemenu ul ul:hover > a {color:<?=$PP["pp1"]?>;background:<?=$PP["pp4"]?>;}

?>

#sidemenu {
width:100%;
font-size:.9em;
}
/* remove all the bullets, borders and padding from the default list styling */
#sidemenu ul {
padding:0;
margin:0;
list-style-type:none;
}
#sidemenu ul ul {
width:150px;
}

/* float the list to make it horizontal and a relative positon so that you can control the dropdown menu positon */
#sidemenu li {
float:left;
width:150px;
position:relative;
}
/* style the links for the top level */
#sidemenu a, #sidemenu a:visited {
display:block;
font-size:11px;
text-decoration:none; 
width:139px; 
height:30px;  
border-width:1px 1px 0 0; 
padding-left:10px; 
line-height:29px;
}
/* a hack so that IE5.5 faulty box model is corrected */
* html #sidemenu a, * html #sidemenu a:visited {
width:150px;
w\idth:139px;
}

/* hide the sub levels and give them a positon absolute so that they take up no room */
#sidemenu ul ul {
visibility:hidden;
position:absolute;
height:0;
top:31px;
left:0; 
width:150px;
}
/* another hack for IE5.5 */
* html #sidemenu ul ul {
top:30px;
t\op:31px;
}

/* position the third level flyout menu */
#sidemenu ul ul ul{
left:150px; 
top:0;
width:150px;
}
/* position the third level flyout menu for a left flyout */
#sidemenu ul ul ul.left {
left:-150px;
}

/* style the table so that it takes no part in the layout - required for IE to work */
#sidemenu table {position:absolute; top:0; left:0;}

/* style the second level links */
#sidemenu ul ul a, #sidemenu ul ul a:visited {
height:auto; 
line-height:1em; 
padding:5px 10px; 
width:129px
/* yet another hack for IE5.5 */
}
* html #sidemenu ul ul a{
width:150px;
w\idth:129px;
}

/* make the second level visible when hover on first level list OR link */
#sidemenu ul li:hover ul,
#sidemenu ul a:hover ul{
visibility:visible; 
}
/* keep the third level hidden when you hover on first level list OR link */
#sidemenu ul:hover ul ul{
visibility:hidden;
}
/* keep the fourth level hidden when you hover on second level list OR link */
#sidemenu ul:hover ul:hover ul:hover ul, #sidemenu ul:hover ul li:hover ul ul{
visibility:hidden;
}
/* make the third level visible when you hover over second level list OR link */
#sidemenu ul:hover ul li:hover ul{ 
visibility:visible;
}
/* make the fourth level visible when you hover over third level list OR link */
#sidemenu ul:hover ul:hover ul:hover li:hover ul { 
visibility:visible;
}