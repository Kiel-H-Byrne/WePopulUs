(function($) {
  $.fn.FlickrScrollr = function(options)
  {
    var defaults = {
      thumbWidth : '76',
      leftBtn : 'images/fs_leftBtn.gif',
      rightBtn : 'images/fs_rightBtn.gif',
      totalPics : '20',
      displayNum : '4'
    }
    var opts = $.extend(defaults, options);

    return this.each(function() {
      $(this)
        // Add the buttons to move left and right
        .prepend('<img src="'+opts.leftBtn+'" id="fs_leftBtn" />')
        .append('<img src="'+opts.rightBtn+'" id="fs_rightBtn" />')
        .children('#fs_wrapper')
          // Set the width of the wrapper to contain the desired number of thumbnails
          .animate({
            'width' : opts.displayNum*opts.thumbWidth+1+'px'
          })
          .children('ul')
            // Set the width of the ul to fit all thumbnails in horizontally
            .css('width', opts.totalPics+opts.thumbWidth+1+'px');

      // Start the left button out hidden, then set the onclick handler
      $('#fs_leftBtn').css('opacity', '0').click(function(){
        var oldLeft = parseInt($('#fs_wrapper ul').css('left'));
        var newLeft = oldLeft + opts.thumbWidth*opts.displayNum;
        if(newLeft <= 0) {
          $('#fs_wrapper ul').animate({'left' : newLeft+'px'});
          if(newLeft == 0) {
            $('#fs_leftBtn').animate({'opacity' : '0'});
            $('#fs_rightBtn').animate({'opacity' : '1'});
          } else {
            $('#fs_leftBtn').animate({'opacity' : '1'});
            $('#fs_rightBtn').animate({'opacity' : '1'});
          }
        }
      });

      // Set the onclick handler for the right button
      $('#fs_rightBtn').css('left',opts.displayNum*opts.thumbWidth+25+'px').click(function(){
        var oldLeft = parseInt($('#fs_wrapper ul').css('left'));
        var newLeft = oldLeft - opts.thumbWidth*opts.displayNum;
        var minLeft = (opts.totalPics-opts.displayNum)*opts.thumbWidth*-1;
        if(newLeft >= minLeft) {
          $('#fs_wrapper ul').animate({'left' : newLeft+'px'});
          if(newLeft == minLeft) {
            $('#fs_rightBtn').animate({'opacity' : '0'});
            $('#fs_leftBtn').animate({'opacity' : '1'});
          } else {
            $('#fs_rightBtn').animate({'opacity' : '1'});
            $('#fs_leftBtn').animate({'opacity' : '1'});
          }
        }
      });
    });
  };
})(jQuery);