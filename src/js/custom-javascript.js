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

	//maps
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart1);

	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart2);

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
	var options = {hAxis : {'textStyle' : {'fontSize': 8}},'vAxis': {'gridlines': { count: 0 }, 'textStyle': { 'fontSize': 1 } },'backgroundColor': 'transparent','tooltip' : {trigger: 'none'},colors: ['#5CB545', '#241F21'],chartArea: {  width: "50%", height: "70%" }};
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
	var options = {hAxis : {'textStyle' : {'fontSize': 8}},'backgroundColor': 'transparent',
	'tooltip' : {
	trigger: 'none'
	},
	chartArea: {  width: "50%", height: "70%" },
	colors: ['#5CB545', '#241F21'],
	             'vAxis': {'gridlines': { count: 0 }, 'textStyle': { 'fontSize': 1 } }};

	// Instantiate and draw our chart, passing in some options.
	var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
	//setTimeout(chart2.draw(data, options), 10000);
	chart2.draw(data, options);
}