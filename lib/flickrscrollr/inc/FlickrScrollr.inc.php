<?php
/**
 *  Class FlickrScrollr
 * 
 * Description:
 * 		Uses the SimpleXML extension to parse a Flickr RSS feed, then creates
 * 		a valid XHTML 1.0 Strict unordered list. This version has several minor
 * 		fixes employed to avoid a notice
 * 
 * Source:
 * 		http://ennuidesign.com/projects/FlickrScrollr/
 * 
 * Usage:
 * 		<code>
 * 		$flickr = new FlickrScrollr('http://api.flickr.com/services/feeds/photos_public.gne?id=29080075@N02&lang=en-us&format=rss_200');
 * 		echo $flickr;
 * 		</code>
 *
 * @author		Jason Lengstorf <jason.lengstorf@ennuidesign.com>
 * @copyright	2009 Ennui Design
 * @license		http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version		Release: 1.0.1
 * @link		http://ennuidesign.com/projects/FlickrScrollr/
 */
class FlickrScrollr
{
	/**
	 * RSS feed to be parsed
	 * 
	 * @var string
	 */
    public $feed;

    /**
     * Class constructor
     * 
     * @param string $feed	The RSS feed to be parsed
     * 
     * @return void
     * @access public
     */
	public function __construct($feed=NULL)
	{
		$this->feed = $feed;
	}

	/**
	 * Parses a Flickr RSS feed
	 * 
	 * @param void
	 * 
	 * @return array	a multi-dimensional array of values containing photos
	 * 					and information about those photos:
	 * 					0 - link to the photo's Flickr page,
	 * 					1 - title of the photo,
	 * 					2 - path to the image thumbnail,
	 * 					3 - path the the medium-sized image,
	 * 					4 - width of the image,
	 * 					5 - height of the image
	 * @access public
	 */
	protected function parse()
	{
		$rss = simplexml_load_file($this->feed);
		foreach ($rss->channel->item as $item) {
		    $link = $item->link;
		    $title = $item->title;
		    $media = $item->children('http://search.yahoo.com/mrss/'); // Access the "media:" namespace
		    $thumb = $media->thumbnail->attributes(); // Access the attributes of the "media:thumb" tag
		    $thumbSRC = $thumb['url'];
		    $width = $thumb['width'];
		    $height = $thumb['height'];
		    $imgSRC = str_replace('_s', '', $thumbSRC); // Creates a link to the medium-size image

		    $photos[] = array($link, $title, $thumbSRC, $imgSRC, $width, $height);
		}
		
		return $photos;
	}

	/**
	 * Creates an unordered list of Flickr thumbnail photos
	 * 
	 * @param void
	 * 
	 * @return string	XHTML markup for an unordered list of thumbnails
	 * @access public
	 */
	public function display()
	{
		$thumbs = NULL; // Initiate the var to avoid a warning
	    $pics = $this->parse(); // This provides an array of photo info
    	$user = $this->getUserId(); // Extract the username out of the feed

		foreach($pics as $pic) {
			$thumbs .= <<<THUMBNAIL_DISPLAY

    		<li>
    			<a href="{$pic[3]}" title="&lt;a href=&quot;{$pic[0]}&quot;&gt;{$pic[1]}&lt;/a&gt;">
    			    <img src="{$pic[2]}" alt="{$pic[1]}" />
    		    </a>
    	    </li>
THUMBNAIL_DISPLAY;
		}

	    $display = <<<FLICKR_DISPLAY

<div id="flickrscrollr">
    <div id="fs_wrapper">
        <ul>$thumbs
    	</ul>
	</div>
	<a href="http://flickr.com/photos/$user/" class="fs_morelink">View All Photos</a>
</div>
FLICKR_DISPLAY;

		return $display;
	}

	/**
	 * Extracts the user ID from the Flickr RSS feed URL
	 * 
	 * @param void
	 * 
	 * @return string	the user ID
	 * @access private
	 */
	private function getUserId()
	{
	    $pattern = "/^(.*id=)([A-Za-z0-9@]{1,})(&.*)$/";
		$replacement = '$2';
		return preg_replace($pattern, $replacement, $this->feed);
	}

	/**
	 * ToString function runs display()
	 * 
	 * @param void
	 * 
	 * @return string	The XHTML markup to display the Flickr thumbnails
	 * @access public
	 */
	public function __toString()
	{
	    return $this->display();
	}
}

?>