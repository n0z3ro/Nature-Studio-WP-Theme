<?php
/**
 * Template Name: About Page - Full Scrolling
 *
 * Template for displaying about page with full page scrolling.
 *
 * @package understrap
 */

get_header();
?>
<!--
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script>
var scrolling = false;
var currentPos = 0;

    function scrollUp(){
        if(!scrolling && currentPos > 0 ){
            scrolling=true;
            currentPos --;
            var scrollToElement = $('.scrollTo')[currentPos];

            $('html, body').animate({
                scrollTop: $(scrollToElement).offset().top
            }, 500, function(){
                scrolling = false;
            });      
        }
    }   

    function scrollDown(){   
        if(!scrolling && currentPos < $('.scrollTo').length-1  ){
            scrolling=true;
            currentPos ++;
            var scrollToElement = $('.scrollTo')[currentPos];

            $('html, body').animate({
                scrollTop: $(scrollToElement).offset().top
            }, 500,function(){
                scrolling = false;
            }); 
        }
    }    

    $(document).ready(function() {

        // Get the current position on load

        for( var i = 0; i < $('.scrollTo').length; i++){
            var elm = $('.scrollTo')[i];

            if( $(document).scrollTop() >= $(elm).offset().top ){
                currentPos = i;
            }
        }

        $(document).bind('DOMMouseScroll', function(e){
            if(e.originalEvent.detail > 0) {
                scrollDown();
            }else {
                scrollUp();   
            }
            return false;
        });

        $(document).bind('mousewheel', function(e){
            if(e.originalEvent.wheelDelta < 0) {
                scrollDown();
            }else {
                scrollUp();     
            }
            return false;
        });
    });
    </script>
-->
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>