function twitterCallback2(twitters) {
  var statusHTML = [];
  for (var i=0; i<twitters.length; i++){
    var username = twitters[i].user.screen_name;
    var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
      return '<a href="'+url+'">'+url+'</a>';
    }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
      return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
    }).replace(/\B#([_a-z0-9]+)/ig, function(hashtag) {
      return '<a rel="tag" href="http://twitter.com/search?q=%23'+hashtag.substring(1)+'">'+hashtag+'</a>';
    });
    statusHTML.push('<li><span>'+status+'</span> <a href="http://twitter.com/'+username+'/statuses/'+twitters[i].id+'"><br />'+relative_time(twitters[i].created_at)+'</a></li>');
  }
  document.getElementById('twitter_update_list').innerHTML = statusHTML.join('');
}

function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);

  if (delta < 60) {
    return 'just a min. ago';
  } else if(delta < 120) {
    return 'about a min. ago';
  } else if(delta < (60*60)) {
    return (parseInt(delta / 60)).toString() + ' mins ago';
  } else if(delta < (120*60)) {
    return 'about an hour ago';
  } else if(delta < (24*60*60)) {
    return 'about ' + (parseInt(delta / 3600)).toString() + ' hrs ago';
  } else if(delta < (48*60*60)) {
    return '1 day ago';
  } else {
    return (parseInt(delta / 86400)).toString() + ' days ago';
  }
}

$(document).ready(function(){
    $('ul#twitter_update_list li').mouseover(function(){
      	$(this).css({'background-color' : '#c2c2c2'});
    	});	
    $('ul#twitter_update_list li').mouseout(function(){
      	$(this).css({'background-color' : 'inherit'});
    	});	
});
			
$(function(){
	$("#twit").click(function(){
		$("#twitter_div").slideToggle(1000);
	});			   
});