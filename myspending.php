<?php 
if (isset($_REQUEST['_SESSION'])) die("Stop trying to Hack!");
include_once("lib/functions_nec.php"); //must call first because sends headers.
include_once('lib/simplify.php');
?>
<div id="finding_location"><img src="img/wait-wheel.gif" alt="" /> Gathering Federal Spending Data...</div>

<div id="spendingpage">
<?php
$request =  'http://www.usaspending.gov/faads/faads.php?&detail=c&sortby=d';
$search_type="zipcode";
$search_location=$_SESSION["zip_code"];
if (isset($_GET['search_type']) == true ) {$search_type = htmlentities($_GET['search_type']);}
if (isset($_GET['search_location']) == true ) {$search_location = htmlentities($_GET['search_location']);}

switch ($search_type)
{
	case "zipcode":
		$request = $request.'&placeOfPerformanceZIPCode='.$_SESSION["zip_code"];
	break;
	case "state":
		$request = $request.'&stateCode='.$_GET["state"];
	break;
	case "district":
		if ($search_location =='DC00') { $request = $request.'&pop_cd=DC98';}
		else {$request = $request.'&pop_cd='.$_GET["district"];}
	break;
}

if (isset($_GET['fy']))
{
	$fy =  htmlentities($_GET['fy']);
	switch ($fy)
	{
		case "all":
		break;
		case "recovery":
			$request = $request.'&busn_indctr=r';
			echo "<h3>Recovery Funding</h3>";
		break;
		default:
			$request = $request.'&fiscal_year='.$fy;
			$funding_type="year";
	}
}
$XML = curl_call($request);
print_r($XML);
/*
 <search_criteria>
    <search_criterion field="Federal Fiscal Year" value="2006"/>
    <search_criterion field="Place of Performance Cong. District" value="District of Columbia nonvoting (Eleanor Holmes Norton)"/>
    <search_criterion field="Place of Performance Zip Code" value="20009*"/>
    <search_criterion field="Business Fund Indicator" value="Recovery Act"/> 
  </search_criteria>
*/

$search_criteria = $XML->search_criteria;

foreach($search_criteria->search_criterion as $criterion)
	{
		switch ($criterion->attributes()->field)
		{
			case "Federal Fiscal Year":
				$funding = "Fiscal Year ".$criterion->attributes()->value;
				$funding_type = "year";
				$year = $_GET["fy"];
			break;
			case "Place of Performance Cong. District":
				$search = "District: " . $criterion->attributes()->value;
			break;
			case "Place of Performance Zip Code":
				$search = "Zip Code: " . $criterion->attributes()->value;
			break;
			case "Business Fund Indicator":
				$funding = "Recovery Act Funding";
				$funding_type = "recovery";
			break;			
			case "Place of Performance State":
				$search = "the State of: ".$criterion->attributes()->value;
			break;
		}
	}
if (isset($funding) == false)
{
	if ($search_type == "district") { $funding="Fiscal Years (2004 - 2009)"; $funding_type="range";}
	else {$funding = "Fiscal Years (2000 - 2009)"; $funding_type = "range"; }
}
$totals = $XML->data->record->totals;
?>

<div id="amount">
<?php
$total_amt=Null;
if (!empty($totals->total_ObligatedAmount)) {(float)$total_amt = $totals->total_ObligatedAmount;}
echo '<h2> <span style="font-size:30px">$'.simplify_number($total_amt).'</span> have been given to '.$search.'<br />';
echo 'During '.$funding.'</h2>';
?>
</div>

<div id="inputs">
<form name="search_form" action="home.php?" method="get" target="_self">

<select name="fy">
<option value="all" <?php if($funding_type=="range"){echo "selected='selected'";}?>>All Available Years</option>
<option value="recovery" <?php if($funding_type=="recovery"){echo "selected='selected'";}?>>Recovery Funding</option>
<?php
if ($search_type == "district")
{
	for ($i = 2004; $i < 2010; $i++)
	{
		echo '<option value="',$i,'"';
		if (($funding_type == "year") && $year == $i)
		{
			echo ' selected="selected"';
		}
		echo '>FY ',$i,"</option>\n";
	}
}
else
{
	for ($i = 2000; $i < 2010; $i++)
	{
		echo '<option value="',$i,'"';
		if (($funding_type == "year") && $year == $i)
		{
			echo ' selected="selected" ';
		}
		echo '>FY ',$i,"</option>\n";
	}		
}
?>
</select>
<select name="search_type">
<option value="zipcode" <?php if($search_type=="zipcode"){echo "selected='selected'";}?>>Zip</option>
<?php
	foreach($_SESSION['district'] as $d)
	{
		echo '<option value="district"';
		if ($search_location==$_SESSION['district'])
		{
			echo " selected='selected' ";
		}
		echo '>',  $d ,'</option>',"\n";
	}
?>
<option value="state" <?php if($search_type=="state"){echo "selected='selected'";}?>>State</option>
</select>


<input type="submit" value="Go"/>
<?php
		foreach($_SESSION['district'] as $k=>$d)
		{
			echo '<input type="hidden" name="district" value="', $d , '"/>';	
		}
		echo '<input type="hidden" name="loc" value="sp" />';
//		echo '<input type="hidden" name="city" value="', $_SESSION['city'] , '"/>';
//		echo '<input type="hidden" name="state" value="', $_SESSION['state'] , '"/>';
//		echo '<input type="hidden" name="lat" value="', $_SESSION['lat'] , '"/>';
//		echo '<input type="hidden" name="lng" value="', $_SESSION['lng'] , '"/>';
		echo '<input type="hidden" name="zipcode" value="', $_SESSION['zip_code'] , '"/>',"\n";	
	?>
</form>
</div>
<? if (!empty($XML->error)) {$errormsg = $XML->error;die('<div id="error_alert">'.$errormsg.'</div>');} ?>

<div id="content">
<div class="container">
<p class="title">Summary of Contracts</p>
<?php
$total_amt = $totals->total_ObligatedAmount;
settype($total_amt, "float");
echo '<table><tr><th>Total Obligated:</th><td class="number"> $'.simplify_number($total_amt).'</td></tr>';
echo '<tr><th>Number of Contractors:</th><td class="number"> '.$totals->number_of_contractors.'</td></tr>';
echo '<tr><th>Number of Contracts:</th><td class="number"> '.$totals->number_of_transactions.'</td></tr></table>';
?>
</div>
<div class="container">
<p class="title">Competition</p>
<?php
/*
<extent_of_competition description="total obligated amount dollars by extent of competition in contracts">
        <full_and_open_competition>339792113.81</full_and_open_competition>
        <full_and_open_competition_but_only_one_bid>257152015.54</full_and_open_competition_but_only_one_bid>
        <competition_after_exclusion_of_sources>147245829.51</competition_after_exclusion_of_sources>
        <follow_on_contract>2627364.3</follow_on_contract>
        <not_available_for_competition>262204253.65</not_available_for_competition>
        <not_competed>73114360.32</not_competed>
        <unknown>47969416.66</unknown>
      </extent_of_competition>
*/

$competition = $XML->data->record->extent_of_competition;

$full_and_open = $competition->full_and_open_competition;
settype($full_and_open, "float");
$percent = $full_and_open / $total_amt * 100;
$comp_chart_percent = array(number_format($percent, 0));
echo '<table>
<tr><td class="description">Open to everyone: </td><td class="number">';
echo  "$", simplify_number($competition->full_and_open_competition),  "</td></tr>";

$one_bid = $competition->full_and_open_competition_but_only_one_bid;
settype($one_bid, "float");
$percent = $one_bid / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
echo '<tr><td class="description">Open to everyone, but only one offer was received: </td><td class="number">';
echo "$", simplify_number($competition->full_and_open_competition_but_only_one_bid),  "</td></tr>";

$competition_after_exclusion = $competition->competition_after_exclusion_of_sources;
settype($competition_after_exclusion, "float");
$percent = $competition_after_exclusion / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
echo '<tr><td class="description">Competition within a limited pool: </td><td class="number">';
echo "$", simplify_number($competition_after_exclusion),  "</td></tr>";

$follow_on_contract = $competition->follow_on_contract;
settype($follow_on_contract, "float");
$percent = $follow_on_contract / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
echo '<tr><td class="description">Bridge contract: </td><td class="number">';
echo "$", simplify_number($follow_on_contract),  "</td></tr>";

$not_available_for_comp = $competition->not_available_for_competition;
settype($not_available_for_comp, "float");
$percent = $not_available_for_comp / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
echo '<tr><td class="description">Available only for groups such as disabled persons: </td><td class="number">';
echo  "$", simplify_number($not_available_for_comp),  "</td></tr>";

$not_competed = $competition->not_competed;
settype($not_competed, "float");
$percent = $not_competed / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
echo '<tr><td class="description">Not competed for an allowable reason: </td><td class="number">';
echo "$", simplify_number($not_competed),  "</td></tr>";

$competition_unknown = $competition->unknown;
settype($competition_unknown, "float");
$percent = $competition->unknown / $total_amt * 100;
$comp_chart_percent[] = number_format($percent, 0);
echo '<tr><td class="description">Not Identified: </td><td class="number">';
echo "$", simplify_number($competition_unknown),  "</td></tr></table>";
?>
</div>

<div class="container">
<?php
echo "<p>\n";
echo '<img src="http://chart.apis.google.com/chart?cht=p&amp;chdl=';
echo 'Open+to+everyone|';
echo 'Open+to+everyone,+but+only+one+offer+was+received|';
echo 'Competition+within+a+limited+pool|';
echo 'Bridge+contract|';
echo 'Available+only+for+groups+such+as+disabled+persons|';
echo 'Not+competed+for+an+allowable+reason|';
echo 'Not+identified';
//echo '&chco=17D813,27A53B,91D849,D0D833,E2651D,AF3228,31030C,000000';
echo '&amp;chco=073540,d2e5e8,ea7100';
echo '&amp;chl=';
echo $comp_chart_percent[0],'%|';
echo $comp_chart_percent[1],'%|';
echo $comp_chart_percent[2],'%|';
echo $comp_chart_percent[3],'%|';
echo $comp_chart_percent[4],'%|';
echo $comp_chart_percent[5],'%|';
echo $comp_chart_percent[6],'%';
echo '&amp;chd=t:';
echo $comp_chart_percent[0],',';
echo $comp_chart_percent[1],',';
echo $comp_chart_percent[2],',';
echo $comp_chart_percent[3],',';
echo $comp_chart_percent[4],',';
echo $comp_chart_percent[5],',';
echo $comp_chart_percent[6],'&amp;chs=290x355&amp;chdlp=bv&amp;chtt=Method+of+Competition" alt="Method of Competition" />';
echo "</p>\n";
?>
</div>

<div class="container">
<?php
/*
      <top_known_congressional_districts description="Top congressional districts where work is performed" ranked_by="total obligated amount in dollars" maximum_shown="5">
        <congressional_district rank="1" total_obligatedAmount="751875253.31">District of Columbia nonvoting (Eleanor Holmes Norton)</congressional_district>
        <congressional_district rank="2" total_obligatedAmount="205001608.64">Unknown districts (probably outside U.S.)</congressional_district>
        <congressional_district rank="3" total_obligatedAmount="24791961.07">Georgia 04 (Cynthia A. McKinney / Denise L. Majette / Cynthia A. McKinney / Henry C. &quot;Hank&quot; Jr. Kingston)</congressional_district>
        <congressional_district rank="4" total_obligatedAmount="20454273.41">Maryland 08 (Constance A. Morella / Chris Van Hollen)</congressional_district>
        <congressional_district rank="5" total_obligatedAmount="13010596.41">Georgia 05 (John Lewis)</congressional_district>
      </top_known_congressional_districts>
      
      /*
$districts = $XML->data->record->top_known_congressional_districts;
foreach($districts->attributes() as $name=>$attr) {
	$res[$name]=$attr;	
}
echo '<p class="title">Districts where work is performed or contractor is located </p>
<table>
<tr><th>Rank</th><th>Area</th><th>Amount</th></tr>';

$rank = 1;
foreach($districts->children() as $dist)
{
	foreach($dist->attributes() as $name=>$attr) 
	{
		$res[$name]=$attr;
	
	}	
echo '
	<tr><td class="rank">'.$rank++.'</td>
	<td class="description">'.$dist.'</td>
	<td class="number"> $'.simplify_number($res["total_obligatedAmount"]).'</td></tr>';
}
echo '</table>'; */
?>
</div>

<div class="container">
<?php
/*
<top_products_or_services_sold ranked_by="total obligated amount in dollars" maximum_shown="5">
        <product_or_service_category rank="1" total_obligatedAmount="177437684.67">Technical Assistance</product_or_service_category>
        <product_or_service_category rank="2" total_obligatedAmount="157283460.23">Other Professional Services</product_or_service_category>
        <product_or_service_category rank="3" total_obligatedAmount="125883193.69">Services -- Advanced Development (R&amp;D)</product_or_service_category>
        <product_or_service_category rank="4" total_obligatedAmount="74674436.92">Other Management Support Services</product_or_service_category>
        <product_or_service_category rank="5" total_obligatedAmount="73326979.87">Personal Services Contracts</product_or_service_category>
      </top_products_or_services_sold>
*/

$services = $XML->data->record->top_products_or_services_sold;

echo '<p class="title">Top Products or Services</p>
<table>
<tr><th>Rank</th><th>Product / Service</th><th>Amount</th></tr>';


$rank = 1;
foreach($services->children() as $service)
{
	foreach($service->attributes() as $name=>$attr) {$res[$name]=$attr;}	
	echo "<tr><td class='rank'>", $rank++, "</td>";
	echo "<td class='description'>", htmlentities($service), "</td>";
	echo "<td class='number'> $",  simplify_number($res["total_obligatedAmount"]),  "</td></tr>";
}
echo '</table>';
?>
</div>

<div class="container">
<?php
/*
      <top_contracting_agencies ranked_by="total obligated amount in dollars" maximum_shown="5">
        <agency rank="1" total_obligatedAmount="303320088.27">U.S. Agency for International Development</agency>
        <agency rank="2" total_obligatedAmount="229161375.52">EDUCATION, Department of</agency>
        <agency rank="3" total_obligatedAmount="71358265.17">Centers for Disease Control and Prevention</agency>
        <agency rank="4" total_obligatedAmount="58577869.04">ARMY, Department of the (except Corps of Engineers Civil Program Financing)</agency>
        <agency rank="5" total_obligatedAmount="56864840">Centers for Medicare &amp; Medicaid Services</agency>
      </top_contracting_agencies>
*/

$agencies = $XML->data->record->top_contracting_agencies;

echo '<p class="title">Top Contracting Agencies</p>
<table>
<tr><th>Rank</th><th>Agency</th><th>Amount</th></tr>';

$rank = 1;
foreach($agencies->children() as $agency)
{
	foreach($agency->attributes() as $name=>$attr) {$res[$name]=$attr;}	
	echo "<tr><td class='rank'>", $rank++, "</td>";
	echo "<td class='description'>", htmlentities($agency), "</td>";
	echo "<td class='number'> $",  simplify_number($res["total_obligatedAmount"]),  "</td></tr>";
}
echo '</table>';
?>
</div>

<div class="container">
<?php
/*
 <top_contractor_parent_companies ranked_by="total obligated amount in dollars" maximum_shown="10">
        <contractor_parent_company rank="1" total_obligatedAmount="444396818.22">Academy For Educational Development</contractor_parent_company>
        <contractor_parent_company rank="2" total_obligatedAmount="217488692.69">Reading Is Fundamental, Inc</contractor_parent_company>
        <contractor_parent_company rank="3" total_obligatedAmount="72046924.25">Icf International, Inc.</contractor_parent_company>
        <contractor_parent_company rank="4" total_obligatedAmount="71803013.57">Rendon Group Inc</contractor_parent_company>
        <contractor_parent_company rank="5" total_obligatedAmount="45414785.09">Tatc Consulting Inc</contractor_parent_company>
        <contractor_parent_company rank="6" total_obligatedAmount="30426229.33">Fintrac, Inc</contractor_parent_company>
        <contractor_parent_company rank="7" total_obligatedAmount="25938092.67">Angel Morgan and Associates</contractor_parent_company>
        <contractor_parent_company rank="8" total_obligatedAmount="25360002.35">R &amp; R Janitorial, Painting &amp; Building Services Inc.</contractor_parent_company>
        <contractor_parent_company rank="9" total_obligatedAmount="18613346.05">Westwood Group Inc</contractor_parent_company>
        <contractor_parent_company rank="10" total_obligatedAmount="17930687.36">Sorg and Associates, P.C.</contractor_parent_company>
      </top_contractor_parent_companies>
*/

$companies = $XML->data->record->top_contractor_parent_companies;

echo '<p class="title">Top Contractors</p>
<table>
<tr><th>Rank</th><th>Contractors</th><th>Amount</th></tr>';

$rank = 1;
foreach($companies->children() as $company)
{
	foreach($company->attributes() as $name=>$attr) 
	{
		$res[$name]=$attr;
	
	}	
	echo "<tr><td class='rank'>", $rank++, "</td>";
	echo "<td class='description'>", htmlentities($company), "</td>";
	echo "<td class='number'> $",  simplify_number($res["total_obligatedAmount"]),  "</td></tr>";
}
echo '</table>';
?>
</div>

<div class="container">
<?php
/*
      <fiscal_years description="total obligated amount in dollars by year">
        <fiscal_year year="2000">88672414</fiscal_year>
        <fiscal_year year="2001">97951216.91</fiscal_year>
        <fiscal_year year="2002">176687881.41</fiscal_year>
        <fiscal_year year="2003">77959517.64</fiscal_year>
        <fiscal_year year="2004">108802020.56</fiscal_year>
        <fiscal_year year="2005">119002363.82</fiscal_year>
        <fiscal_year year="2006">196031214.57</fiscal_year>
        <fiscal_year year="2007">101980271.26</fiscal_year>
        <fiscal_year year="2008">135292802.79</fiscal_year>
        <fiscal_year year="2009">27725650.83</fiscal_year>
      </fiscal_years>
      */
 $years = $XML->data->record->fiscal_years;
 
if (count($years) != 0 )
{     
echo '<p class="title">Totals by year</p>
<table>
<tr><th>Year</th><th>Amount</th></tr>';
foreach($years->children() as $year)
{
	foreach($year->attributes() as $name=>$attr) 
	{
		$res[$name]=$attr;
			$chd=$res["year"].'|'. simplify_number($year);		
	}	
	echo '<tr><td class="year">',$res["year"], "</td>";
	echo '<td class="number"> $',  simplify_number($year),  "</td></tr>";
//	$chd=$res["year"].'|'. simplify_number($year);
}
echo '</table>';}
?>
</div>


<?php /*
echo "
<div class="container">
<p>;
echo '<img src="http://chart.apis.google.com/chart?cht=bvg';
echo '&amp;chco=523440, 883444, 980000&amp;chbh=20,10';
echo '&amp;chxt=x,y';
echo '&amp;chxr=0,2001,2010,1';
echo '&amp;chxl=';
echo '1:|00|10|20|30|40|50|60';
echo '&amp;chds=0,4000';
echo '&amp;chd=t:'.$chd;
echo '&amp;chs=300x350&amp;chtt=Annual+Totals" alt="Annual Totals" />';
echo "</p>\n";
echo $chd;
echo "</div>";
/**/?>



</div>
<p class="source">
Data gathered from the <a href="https://www.fpds.gov/">Federal Procurement Data System</a> 
via <a href="http://www.usaspending.gov/index.php">USASpending.gov</a> and was last updated 
<?php echo $XML->data->attributes()->compiled_from_government_data_last_released_on; ?>
</p>
</div><!--end spendingpage-->