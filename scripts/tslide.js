    $(function(){
        $('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     //class of the element that will become your tab
            pathToTabImage: 'img/logomail.png', 			//path to the image for the tab //Optionally can be set using css
            imageHeight: '73px',                     //height of tab image           //Optionally can be set using css
            imageWidth: '73px',                       //width of tab image            //Optionally can be set using css
            tabLocation: 'right',                      //side of screen where tab lives, top, right, bottom, or left
            speed: 200,                               //speed of animation
            action: 'click',                          //options: 'click' or 'hover', action to trigger animation
            topPos: '0',                          //position from the top/ use if tabLocation is left or right
            leftPos: 'null',                          //position from left/ use if tabLocation is bottom or top
            fixedPosition: 'true'                      //options: true makes it stick(fixed position) on scroll
        });

    });