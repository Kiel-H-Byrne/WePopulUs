<!-- div><img id="bg_frame" src="img/bbox.jpg" alt="" title="" /></div-->

<div id="head">

<div id="dykdiv"><?php include("dyk.php");?></div><!--end dyk div-->	

   	   	<ul class="headmenu"> <!--must be id for menu.js to work-->
   	   	   	<li><a href="home.php?zipcode=<?=$_SESSION['zip_code']?>" target="_top" title="We:Populus Home">My: Home</a></li>
   	   	   	<li><a href="home.php?loc=reps&amp;zipcode=<?=$_SESSION['zip_code']?>" target="_top" title="Determine what your district is, and who represents it.">My: District &amp; Representatives</a></li>
			<li><a href="home.php?loc=bills&amp;zipcode=<?=$_SESSION['zip_code']?>" target="_top" title="Search and Learn about bills.">My: Laws &amp; Legislation</a></li>
<!--   	   	   	<li><a href="home.php?loc=sp&amp;zipcode=<?=$_SESSION['zip_code']?>" target="_self" title="Billions are spent on government contracts... Track how much Federal money is spent near you and who it is going to.">Federal Spending in My: Neighborhood</a></li> -->
   	   	    <li><a href="home.php?loc=fx&amp;zipcode=<?=$_SESSION['zip_code']?>" target="_self" title="Information graphics or infographics are visual representations of information, data or knowledge.">My: Info Graphics</a></li>
   	   	   	<li><a href="http://www.wepopulus.com/weBlog" target="_blank">We: Blog</a></li>
   	   	   	<li><a href="home.php?loc=about&amp;zipcode=<?=$_SESSION['zip_code']?>" target="_self">About We:</a></li>
		</ul>
</div>
<div id="bg_window">