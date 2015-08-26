
<html lang="en">
<head>
<title>colors</title>
<style>
h3{padding:0;margin:0}
</style>
</head>
<body>

<?php 
include_once('scheme.php');

echo '<h4>colorwheel</h4>';
foreach ($CA as $key=>$cwp) {
	echo '<div id="',$key,'" style="background:',$cwp,';position:relative;margin:3px;display:inline-block;width:160px;height:50px;color:white;text-align:center"><h3>$CA["',$key,'"] - ',$cwp,'</h3></div>';
	}
	echo '<br />';
foreach ($CB as $key=>$cwa) {
	echo '<div id="',$key,'" style="background:',$cwa,';position:relative;margin:3px;display:inline-block;width:160px;height:50px;color:white;text-align:center"><h3>$CB["',$key,'"] - ',$cwa,'</h3></div>';
	}
	echo '<br />';
foreach ($CC as $key=>$cwb) {
	echo '<div id="',$key,'" style="background:',$cwb,';position:relative;margin:3px;display:inline-block;width:160px;height:50px;color:white;text-align:center"><h3>$CC["',$key,'"] - ',$cwb,'</h3></div>';
	}
	echo '<hr />';

echo '<h4>pumpKinpatch</h4>	';
foreach ($PP as $k=>$p) {
	echo '<div id="',$k,'" style="background:',$p,';position:relative;margin:3px;display:inline-block;width:160px;height:50px;color:white;text-align:center"><h3>$PP["',$k,'"] - ',$p,'</h3></div>';
	}
	echo '<hr />';

	
	echo '<h4 style="color:'.$CA["ca2"].'">testinnnzz</h4>';
	echo '<div style="background-color:'.$CA["ca2"].';color:'.$CC["cc6"].';width:200px;height:200px"><h3>TEXT is <em>all up in</em> <strong>here SON!!!</strong> <p>saamplesbpaldkfj apoeijra fldkfjalksde</p></h3></div>'
	
?>


</body>
</html>