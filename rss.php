<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>RSS</title>
<?php
include_once("lib/keys.php");
echo '
<script type="text/javascript" src="http://www.google.com/jsapi?key='._GFKEY_.'"></script>';?>

<script type="text/javascript" src="scripts/gfeedfetcher.js">

/***********************************************
* gAjax RSS Feeds Displayer- (c) Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<style type="text/css">

.labelfield{ /*CSS for label field in general*/
color:brown;
font-size: 90%;
}

.datefield{ /*CSS for date field in general*/
color:gray;
font-size: 90%;
}

#RSS a{ /*CSS specific to demo 3*/
color: #D80101;
text-decoration: none;
font-weight: bold;
}

#RSS p{ /*CSS specific to demo 3*/
margin-bottom: 2px;
}

code{ /*CSS for insructions*/
color: red;
}

</style></head>
<body>
<h3>We:Blog </h3>

<script type="text/javascript">
var newsfeed=new gfeedfetcher("content", "post-content", "_new") //divid, divclass, linktarget
newsfeed.addFeed("channel", "http://wepopulus.com/weBlog/?feed=rss2") //Specify "label" plus URL to RSS feed
newsfeed.displayoptions("description", "title") //show the specified additional fields
newsfeed.setentrycontainer("p") //Display each entry as a paragraph
newsfeed.filterfeed(20, "pubDate") //Show 8 entries, sort by date
newsfeed.init() //Always call this last
</script>
</body>
</html>