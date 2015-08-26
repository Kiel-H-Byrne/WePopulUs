<?php
error_reporting(NONE);
require_once('../crpapi.php');

$crp = new crpData("candIndustry", Array("cid"=>"N00002408","cycle"=>"2010","output"=>"json"));
/**
 * These variables are exposed upon instantiation
**/

echo '<!-- Request:['.$crp->url.'] -->';

/**
 * Get the data. This example retrieves json data which is converted to 
 * an associative array. If using xml, a SimpleXML object will be returned.  
 * The getData method can optionally be passed a true/false value (true is 
 * default).  If set to false, a local file cache will not be used.
**/

$data = $crp->getData();

//Metadata
foreach ($data['response']['industries']['@attributes'] as $key=>$val) {
	echo '<!-- Keys:'.$key . '=' . $val . '-->';
}

//Table Data
echo "<table><tr><th>Industry</th><th>Indivs</th><th>PACs</th><th>Total</th></tr>";
foreach ($data['response']['industries']['industry'] as $ind) {
	foreach ($ind as $row) {
		echo "<tr><td>" . $row['industry_name'] . "</td><td>$" . 
			$row['indivs'] . "</td><td>$" . $row['pacs'] . "</td><td>$" . 
			$row['total'] . "</td></tr>";
	}
}

echo "</table>";
echo "<hr />";

/**
 * Show the cache status.  By default, the library caches API query results in a
 * gzipped, serialized form in a text file in the dataCache directory.  If you do 
 * not desire file caching, call getData(false) (see above).  The cache life can
 * be set by altering $this->cacheTime value in crpapi.php.  The default is 
 * one day.
**/

if ($crp->getCacheStatus()) {
	echo "<!-- Cache Hit -->";
} else {
	echo "<!-- Cache Miss -->";
}

?>