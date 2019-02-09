jQuery( document ).ready(function() {

	//scroll slides on swipe
	jQuery('#vertCarousel').on('touchstart', function(event){

		var yClick = event.originalEvent.touches[0].pageY;

		jQuery(this).on('touchmove', function(event){
			var yMove = event.originalEvent.touches[0].pageY;
			if( Math.floor(yClick - yMove) > 1 ){
				vert_carousel_down();
			}
			else if( Math.floor(yClick - yMove) < -1 ){
				vert_carousel_up();
			}
		});

		jQuery('#vertCarousel').on('touchend', function(){
			jQuery(this).off('touchmove');
		});
	});

	//scroll slides on mouse
	if (document.addEventListener) {
		document.addEventListener("wheel", MouseWheelHandler(), false);
		//document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
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

	if( jQuery('#effects_graphs').length ) {
		//load maps if needed
		//bounce maps
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart1);

		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart2);
	}

});

function MouseWheelHandler() {
	return function (e) {

	if (e.deltaY < 0) {
	//scrolling up
	vert_carousel_up();
	}
	if (e.deltaY > 0) {
	//scrolling down
	vert_carousel_down();
	}
		return false;
	}
}

function checkKey(e) {

	e = e || window.event;

	if (e.keyCode == '40') {
		// down arrow
		vert_carousel_down();
	}
	else if (e.keyCode == '38') {
		// up arrow
		vert_carousel_up();
	}

}
function vert_carousel_up(){
	jQuery('#vertCarousel').carousel('prev');
}
function vert_carousel_down(){
	var penultimate_slide = document.getElementById('penultimate-slide');
	var footer_row = document.getElementById('about-footer-row');

	if (penultimate_slide.classList.contains('active')) {
		jQuery(footer_row).fadeIn( "fast" );
		jQuery('#about-page .team-images').animate({top:'-30vh'});
	}else{
		jQuery('#vertCarousel').carousel('next');
	}
}
jQuery('#vertCarousel').on('slide.bs.carousel', function () {
	var footer_row = document.getElementById('about-footer-row');
	if ( jQuery(footer_row).is(':visible') ){
		jQuery(footer_row).fadeOut( "fast" );
	}
	jQuery('#about-page .team-images').animate({top:'0'});
});
jQuery(window).resize(function(){
	drawChart1();
	drawChart2();
});
function drawChart1() {
	var data = google.visualization.arrayToDataTable([
		['Year', 'Total Revenue'],
		['150% (Year 1)', 150],
		['75% (Year 2)', 262.5],
		['125% (Year 3)', 590.625]
	]);
	// Set chart options
	var options = {'legend':'none',hAxis : {baselineColor: '#fff',gridlineColor: '#fff','textStyle' : {'fontSize': 1,'color':'#FFF'}},'vAxis': {baselineColor: '#fff',gridlineColor: '#fff','gridlines': { count: 0 }, 'textStyle': { 'fontSize': 1,'color':'#FFF' } },'backgroundColor': 'transparent','tooltip' : {trigger: 'none'},colors: ['#5CB545', '#241F21'],chartArea: {  width: "75%", height: "75%" }};
	// Instantiate and draw chart
	var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_div'));
	chart1.draw(data, options);
	//setTimeout(chart1.draw(data, options), 10000);
}

function drawChart2() {
	var data = google.visualization.arrayToDataTable([
	['Year', 'Total Circulation'],
	['150% (Year 1)', 150],
	['150% (Year 2)', 375],
	['100% (Year 3)', 750]
	]);
	// Set chart options
	var options = {'legend':'none',hAxis : {'textStyle' : {'fontSize': 1,'color':'#FFF'}},'backgroundColor': 'transparent',
	'tooltip' : {
	trigger: 'none'
	},
	chartArea: {  width: "75%", height: "75%" },
	colors: ['#5CB545', '#241F21'],
	             'vAxis': {baselineColor: '#fff',gridlineColor: '#fff','gridlines': { count: 0 }, 'textStyle': { 'fontSize': 1,'color':'#FFF' } }};

	// Instantiate and draw our chart, passing in some options.
	var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
	//setTimeout(chart2.draw(data, options), 10000);
	chart2.draw(data, options);
}