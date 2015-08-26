<?php 
include_once("keys.php");
?>
<script type="text/javascript" src="http://www.google.com/jsapi?key=<?=_GMKEY_?>"></script>
<script type="text/javascript"> google.load("jquery", "1.4") </script>
<script type="text/javascript" src="scripts/jqzoom.js" ></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	var options = {
	    zoomWidth: 250,
	    zoomHeight: 540,
            xOffset: 33,
            yOffset: 0,
            position: "right" 
	};
	$('.jqzoom').jqzoom(options);
});
//]]>
</script>

<div id="grafxpage">
<?php 
/*
if (isset($_REQUEST['frob'])) {

$frob=$_REQUEST['frob'];
$meth="flickr.auth.getToken";
$tokstring=_FSEC_."api_key"._FKEY_."frob".$frob."method".$meth;
$token=md5($tokstring);

$call="http://flickr.com/services/rest/?method=".$meth."&api_key="._FKEY_."&frob=".$frob."&api_sig=".$token;
//echo '<!-- Request: [ '.$call.' ]-->';
$get=json_encode($call);
print_r($get);
$auth=$get->auth->token;
echo $auth[0];
}
else {
$perm="read";
$sigstring=_FSEC_."api_key"._FKEY_."perms".$perm;
$sig=md5($sigstring);
$link="http://flickr.com/services/auth/";
$args="?api_key="._FKEY_."&perms=".$perm."&api_sig=".$sig;
echo '<hr /><a href="'.$link.htmlspecialchars($args).'" title="flickr">Flickr Auth</a>';

$get=simplexml_load_file("rest.xml");
//print_r($get);
$auth=$get->auth->token;
//echo $auth[0];
} */
?>
<div id="gallery">

<div class="photobox stim"><div class="grafx"><a href="img/igrafx/StimulusBill.gif" class="jqzoom" title="Economic Stimulus Bill"><img src="img/igrafx/StimulusBill_s.gif"  alt="Economic Stimulus Bill" /></a></div><div class="info">	<h3>Economic Stimulus Bill</h3> <p>This graphic illustrates how the $820 Billion of economic stimulus funds will be allocated until 2019.</p>
<ul><li>The tax portion would account for 22% of total spending,</li>
<li>34% would account for funds given directly to individuals (through Medicaid &amp; health insurance, tax refunds, and unemployment insurance).</li>
<li>and 44% of funds will be spent indirectly through various industries.</li></ul>
</div><h5><a href="img/igrafx/StimulusBill.gif" target="_blank">Large</a> | <a rel="#2">Next</a></h5></div>

<div class="photobox edu unem"><div class="grafx"><a href="img/igrafx/EducationvUnemployment.jpeg" class="jqzoom" title="Credit Score"><img src="img/igrafx/EducationvUnemployment_s.jpeg"  alt="Education v. Unemployment" /></a></div><div class="info">	<h3>Education vs. Unemployment</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/EducationvUnemployment.jpeg" target="_blank">Large</a> | Next</h5></div>
<?php /*
<div class="photobox health"><div class="grafx"><a href="img/igrafx/AffordTreatment.jpeg" class="jqzoom" title="Affordability of Healthcare"><img src="img/igrafx/AffordTreatment_s.jpeg"  alt="Affordability of Healthcare" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/AffordTreatment.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox health unem "><div class="grafx"><a href="img/igrafx/AmericasPriorities.gif" class="jqzoom" title="America's Priorities in 2010"><img src="img/igrafx/AmericasPriorities_s.gif"  alt="America's Priorities in 2010" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/AmericasPriorities.gif" target="_blank">Large</a> | Next</h5></div>

<div class="photobox anc"><div class="grafx"><a href="img/igrafx/ANCSpending.jpeg" class="jqzoom" title="Inequalities of ANC Spending"><img src="img/igrafx/ANCSpending_s.jpeg"  alt="Inequalities of ANC Spending" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/ANCSpending.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox house" id="2"><div class="grafx"><a href="img/igrafx/BestHouse.jpeg" class="jqzoom" title="Best Place to Buy a House in America"><img src="img/igrafx/BestHouse_s.jpeg"  alt="Best Place to Buy a House in America" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/BestHouse.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox cred"><div class="grafx"><a href="img/igrafx/CreditScore.jpeg" class="jqzoom" title="What Your Credit Score Means"><img src="img/igrafx/CreditScore_s.jpeg"  alt="What Your Credit Score Means" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/CreditScore.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox email pers"><div class="grafx"><a href="img/igrafx/EmailProvider.jpeg" class="jqzoom" title="What Your Email Provider Says About Your Personaliy"><img src="img/igrafx/EmailProvider_s.jpeg"  alt="What Your Email Provider Says About Your Personaliy" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/EmailProvider.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox int"><div class="grafx"><a href="img/igrafx/IntFeeling.jpeg" class="jqzoom" title="What The World Thinks About America &amp; Vice Versa"><img src="img/igrafx/IntFeeling_s.jpeg"  alt="What The World Thinks About America &amp; Vice Versa" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/IntFeeling.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox health"><div class="grafx"><a href="img/igrafx/IntHappy.jpeg" class="jqzoom" title="Global Happiness"><img src="img/igrafx/IntHappy_s.jpeg"  alt="Global Happiness" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/IntHappy.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox obama int"><div class="grafx"><a href="img/igrafx/IntObama.jpeg" class="jqzoom" title="International Obama Approval"><img src="img/igrafx/IntObama_s.jpeg"  alt="International Obama Approval" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/IntObama.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox news"><div class="grafx"><a href="img/igrafx/KnowNews.gif" class="jqzoom" title="Americans In The Know"><img src="img/igrafx/KnowNews_s.gif"  alt="Americans In The Know" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/KnowNews.gif" target="_blank">Large</a> | Next</h5></div>

<div class="photobox rep dem"><div class="grafx"><a href="img/igrafx/LvR.gif" class="jqzoom" title="Left Wing vs. Right Wing"><img src="img/igrafx/LvR_s.gif"  alt="Left Wing vs. Right Wing" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/LvR.gif" target="_blank">Large</a> | Next</h5></div>

<div class="photobox debt"><div class="grafx"><a href="img/igrafx/NatDebt2006.gif" class="jqzoom" title="National Debt as of 2006"><img src="img/igrafx/NatDebt2006_s.gif"  alt="National Debt as of 2006" /></a></div><div class="info">	<h3>Credit Score</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/NatDebt2006.gif" target="_blank">Large</a> | Next</h5></div>

<div class="photobox sen"><div class="grafx"><a href="img/igrafx/Reconciliation.png" class="jqzoom" title="Brief History of Senate Reconciliation"><img src="img/igrafx/Reconciliation_s.png"  alt="Brief History of Senate Reconciliation" /></a></div><div class="info">	<h3>Brief History of Senate Reconciliation</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/Reconciliation.png" target="_blank">Large</a> | Next</h5></div>

<div class="photobox"><div class="grafx"><a href="img/igrafx/StatesUnited.jpeg" class="jqzoom" title="The States, United"><img src="img/igrafx/StatesUnited_s.jpeg"  alt="he States, United" /></a></div><div class="info">	<h3>he States, United</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/StatesUnited.jpeg" target="_blank">Large</a> | Next</h5></div>

<div class="photobox vote"><div class="grafx"><a href="img/igrafx/VoteMatter.jpeg" class="jqzoom" title="Importance of Your Vote"><img src="img/igrafx/VoteMatter_s.jpeg"  alt="Importance of Your Vote" /></a></div><div class="info">	<h3>Importance of Your Vote</h3> <p>This depicts the relationship between the level of education and the rate of of unemployment.</p>
<ul><li>The higher your education, the less likely you are to be unemployed.</li>
<li>Those that earn doctoral degrees receive $1,555/week and 2% of them are unemployed.</li>
<li>Those that do not earn a high school diploma receive $426 a week; 9% of them are unemployed.</li></ul>
</div><h5><a href="img/igrafx/VoteMatter.jpeg" target="_blank">Large</a> | Next</h5></div>
*/ ?>
</div>
</div><!--end grafxpage-->