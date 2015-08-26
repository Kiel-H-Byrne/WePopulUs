<script type="text/javascript" src="scripts/dyk.js"></script>

<div id="dyk">
<span class="title">Did you Know? </span> 
	<div id="div1a" class="randomcontent group1">In order to take a tour of the White House, you must first get authorization from your District Representative</div>
	<div id="div2a" class="randomcontent group1">The <a href="http://2010.census.gov/2010census/why/index.php">2010 Census</a> is only 10 questions, and tells the government that your community and/or demographic needs money. The census is used to map out congressional districts and balance electoral colleges.</div>	
	<div id="div3a" class="randomcontent group1">The next Presidential Election will be held on <strong>Tuesday, November 6th 2012</strong>. It will be the 57th election which also encompass eleven gubernatorial races, Senatorial races, House of Representative races, as well as many state legislature races. <span class="source">Source:<a href="http://en.wikipedia.org/wiki/United_States_presidential_election,_2012">Wikipedia</a></span></div>
	<div id="div4a" class="randomcontent group1">The median household income is $50,740. Single: $30,909 | Married: $72,168 | Families: $61,173 </div>
	<div id="div5a" class="randomcontent group1">There are seven states that have no state income tax: Alaska, Florida, Nevada, South Dakota, Texas, Washington and Wyoming. While New Hampshire and Tennessee, tax only dividend and interest income. </div>
	<div id="div6a" class="randomcontent group1">Since 1789, more than 11,000 proposed amendments to the United States Constitution have been introduced in Congress. 27 have been ratified.</div>	
	<div id="div7a" class="randomcontent group1">43 percent of the Government's revenue is from Individual income taxes.</div>
	<div id="div8a" class="randomcontent group1">The United States spends more money than any other country on its military [$547B], at almost nine times more than 2nd place, The United Kingdom [$59.7B]. (China, France, and Japan round out the Top 5.)</div>
	<div id="div9a" class="randomcontent group1">President Obama and his wife Michelle earned $2.7 million in 2008. Tax filings also showed the Obama's paid $855,323 in federal income taxes and $77,883 in Illinois state income taxes. They also donated $172,050 to 37 charities. <span class="source"> Sources: <a href="http://graphics8.nytimes.com/packages/images/nytint/docs/president-obamas-2008-income-tax-returns/original.pdf">IRS</a> | <a href="http://www.nytimes.com/2009/04/16/us/politics/16obama.html?_r=1&amp;ref=politics">NYT</a>.</span></div>
	<div id="div10a" class="randomcontent group1">The "ZIP" in Zip Code stands for "Zone Improvement Plan."</div>
	<div id="div11a" class="randomcontent group1">During the State of the Union Address, one member of the President's Cabinet and two Members of the House and Senate will purposefully skip the event should any tragedy occur. </div>	
	<div id="div12a" class="randomcontent group1">It is actually <em>very</em> possible for <strong>YOU </strong>to amend the <a href="http://www.usconstitution.net">U.S. Constitution</a>. Article 5 provides this procedure.</div>
	<div id="div13a" class="randomcontent group1">A member of Congress must be at least 25 years old, must have been a US citizen for at least seven years, and must live in the state he or she represents.</div>
	<div id="div14a" class="randomcontent group1">A senator must be at least 30 years old, must have been a US citizen for at least nine years, and must live in the state he or she represents.</div>	

</div> <!--end dyk div-->

<script type="text/javascript">
$(function() {
  var timer = setInterval( showDiv, 11000);
  var counter = 0;
  function showDiv() {
    if (counter ==0) { counter++; return; }
    $('div','#dyk')
      .stop()
      .hide()
      .filter( function() { return this.id.match('div' + counter + 'a'); })   
      .show(0);
    counter == 14? counter = 0 : counter++; 
  }
});
</script>