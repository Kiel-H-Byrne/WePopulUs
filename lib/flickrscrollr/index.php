<?php
    require_once 'inc/FlickrScrollr.inc.php';
    $flickr = new FlickrScrollr('http://api.flickr.com/services/feeds/groups_pool.gne?id=1115946@N24&lang=en-us&format=rss_200');
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/jquery.flickrscrollr.css" type="text/css" media="screen" />
		<title> FlickrScrollr Test | Ennui Design </title>
	</head>
	<body>

		<div id="main_content">

			<h1> FlickrScrollr by Ennui Design </h1>

			<p>
				Below is a test of the FlickrScrollr class by Jason Lengstorf.
			</p>

			<div id="gallery">
<!-- BEGIN OUTPUT OF ImageGallery -->

<?php echo $flickr ?>

<!-- END OUTPUT OF ImageGallery -->
			</div>

		</div>

        <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
        <script type="text/javascript" src="js/jquery.flickrscrollr-1.0.1.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#flickrscrollr ul li a').lightBox();
            $('#flickrscrollr').FlickrScrollr();
          });
        </script>


	</body>
</html>