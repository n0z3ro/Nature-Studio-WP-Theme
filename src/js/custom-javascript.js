jQuery( document ).ready(function() {

	//scroll slides on swipe
	jQuery('#vertCarousel').on('touchstart', function(event){

		var yClick = event.originalEvent.touches[0].pageY;

		jQuery(this).on('touchmove', function(event){
			var yMove = event.originalEvent.touches[0].pageY;
			if( Math.floor(yClick - yMove) > 1 ){
				jQuery('.carousel').carousel('next');
			}
			else if( Math.floor(yClick - yMove) < -1 ){
				jQuery('.carousel').carousel('prev');
			}
		});

		jQuery('.carousel').on('touchend', function(){
			jQuery(this).off('touchmove');
		});
	});

	//scroll slides on mouse
	if (document.addEventListener) {
		document.addEventListener("mousewheel", MouseWheelHandler(), false);
		document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
	}else{
		sq.attachEvent("onmousewheel", MouseWheelHandler());
	}
	//scroll slides on key press
	document.onkeydown = checkKey;

});

function MouseWheelHandler() {
	return function (e) {

	var e = window.event || e;
	var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

	//scrolling down
	if (delta < 0) {
		jQuery('.carousel').carousel('next');
	}else{
		jQuery('.carousel').carousel('prev');
	}
		return false;
	}
}

function checkKey(e) {

	e = e || window.event;

	if (e.keyCode == '38') {
		// up arrow
		jQuery('.carousel').carousel('prev');
	}
	else if (e.keyCode == '40') {
		// down arrow
		jQuery('.carousel').carousel('next');
	}

}
