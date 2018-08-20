jQuery( document ).ready(function() {

	//scroll slides on swipe
	jQuery('#vertCarousel').on('touchstart', function(event){

		var yClick = event.originalEvent.touches[0].pageY;

		jQuery(this).on('touchmove', function(event){
			var yMove = event.originalEvent.touches[0].pageY;
			if( Math.floor(yClick - yMove) > 1 ){
				jQuery('#vertCarousel').carousel('next');
			}
			else if( Math.floor(yClick - yMove) < -1 ){
				jQuery('#vertCarousel').carousel('prev');
			}
		});

		jQuery('#vertCarousel').on('touchend', function(){
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

	//Home crossfade slider
	jQuery('#crossCarousel').on('slide.bs.carousel', function (e) {

		$to_slide = jQuery(e.relatedTarget).index();
		
		jQuery(".crossCarousel-target.active").removeClass("active");
		jQuery("#client-logo-img [data-slide-to=" + $to_slide + "]").addClass("active");
	});

	jQuery(".crossCarousel-target").on("mouseover", function(e) {
		jQuery(this).addClass("active");
		jQuery("#crossCarousel").carousel(parseInt(jQuery(this).attr("data-slide-to")));
    	jQuery(".myCarousel-target.active").removeClass("active");
    	jQuery(this).addClass("active");
	});
});

function MouseWheelHandler() {
	return function (e) {

	var e = window.event || e;
	var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

	//scrolling down
	if (delta < 0) {
		jQuery('#vertCarousel').carousel('next');
	}else{
		jQuery('#vertCarousel').carousel('prev');
	}
		return false;
	}
}

function checkKey(e) {

	e = e || window.event;

	if (e.keyCode == '38') {
		// up arrow
		jQuery('#vertCarousel').carousel('prev');
	}
	else if (e.keyCode == '40') {
		// down arrow
		jQuery('#vertCarousel').carousel('next');
	}

}
