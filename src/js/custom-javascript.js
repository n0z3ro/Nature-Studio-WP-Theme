jQuery( document ).ready(function() {

	switch (true) {

		case jQuery(document.body).hasClass('page-template-home_full'):
			console.log('home page');
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
		break;

		case jQuery(document.body).hasClass('page-template-work'):
			console.log('work page');
		break;

		case jQuery(document.body).hasClass('page-template-about_full_scroll'):
			console.log('about page');
			//vertical slide transition on touch, mouse, or keypress
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
			if (document.addEventListener) {
				document.addEventListener("mousewheel", MouseWheelHandler(), false);
				document.addEventListener("DOMMouseScroll", MouseWheelHandler(), false);
			}else{
				sq.attachEvent("onmousewheel", MouseWheelHandler());
			}
			document.onkeydown = checkKey;
		break;

		case jQuery(document.body).hasClass('nat_case_studies-template-media_case_study'):
			console.log('media case study');

			var $button = jQuery('#casestudy-load-button');
			var $casestudy_target = jQuery('#casestudy_target');
			$i = 0;

			$button.click(function() {

				jQuery.ajax({
					url: ajaxurl,
					data: {
						'action' : 'fetch_case_study_content',
						'id' : ajaxpageId,
						'cs_section' : $i
					},
					success:function(data) {
						jQuery( data ).appendTo( $casestudy_target );
					}
				});
				$i++;
			});

			//charts, only for bounce?
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart1);

			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart2);
			jQuery(window).resize(function(){
				drawChart1();
				drawChart2();
			});
		break;
		// case case study 2
		// case case study 3
		case jQuery(document.body).hasClass('page-template-empty'):
			console.log('empty/blank page');
		break;
	}
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

}

function drawChart2() {
	var data = google.visualization.arrayToDataTable([
	['Year', 'Total Circulation'],
	['150% (Year 1)', 150],
	['150% (Year 2)', 375],
	['100% (Year 3)', 750]
	]);
	// Set chart options
	var options = {hAxis : {'textStyle' : {'fontSize': 8}},'backgroundColor': 'transparent','tooltip' : {trigger: 'none'},chartArea: {  width: "50%", height: "70%" },colors: ['#5CB545', '#241F21'],'vAxis': {'gridlines': { count: 0 }, 'textStyle': { 'fontSize': 1 } }};

	var chart2 = new google.visualization.ColumnChart(document.getElementById('chart_div2'));

	chart2.draw(data, options);
}