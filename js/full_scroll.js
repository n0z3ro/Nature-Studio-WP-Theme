var scrolling = false;
var currentPos = 0;

function scrollUp(){
    if(!scrolling && currentPos > 0 ){
        scrolling=true;
        currentPos --;
        var scrollToElement = jQuery('.scrollTo')[currentPos];
        jQuery('html, body').animate({
            scrollTop: jQuery(scrollToElement).offset().top
        }, 500, function(){
            scrolling = false;
        });      
    }
}   

function scrollDown(){   
    if(!scrolling && currentPos < jQuery('.scrollTo').length-1  ){
        scrolling=true;
        currentPos ++;
        if(currentPos == 4){
            var scrollToElement = jQuery('#nature-foot-wrap');
        }else{
            var scrollToElement = jQuery('.scrollTo')[currentPos];
        }
        jQuery('html, body').animate({
            scrollTop: jQuery(scrollToElement).offset().top
        }, 500,function(){
            scrolling = false;
        }); 
    }
}    

jQuery(document).ready(function() {
    // Get the current position on load
    for( var i = 0; i < jQuery('.scrollTo').length; i++){
        var elm = jQuery('.scrollTo')[i];
        if( jQuery(document).scrollTop() >= jQuery(elm).offset().top ){
            currentPos = i;
        }
    }
    jQuery(document).bind('DOMMouseScroll', function(e){
        if(e.originalEvent.detail > 0) {
            scrollDown();
        }else {
            scrollUp();   
        }
        return false;
    });
    jQuery(document).bind('mousewheel', function(e){
        if(e.originalEvent.wheelDelta < 0) {
            scrollDown();
        }else {
            scrollUp();     
        }
        return false;
    });
});