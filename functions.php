<?php
function understrap_remove_scripts() {
wp_dequeue_style( 'understrap-styles' );
wp_deregister_style( 'understrap-styles' );

wp_dequeue_script( 'understrap-scripts' );
wp_deregister_script( 'understrap-scripts' );

// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

// Get the theme data
$the_theme = wp_get_theme();
wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
wp_enqueue_script( 'jquery');
wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
wp_enqueue_script( 'google-charts', 'https://www.gstatic.com/charts/loader.js', array(), false);
wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

}
add_filter( 'body_class', 'custom_body_class', 10, 2 );

function custom_body_class( $wp_classes, $extra_classes ){

	//filter duplicated body class names
	$blacklist = array( 'page-template-page-templates','page-template-page-templatesabout_full_scroll-php', );

	$wp_classes = array_diff( $wp_classes, $blacklist );

	return array_merge( $wp_classes, (array) $extra_classes );

}
function nat_register_widgets() {
	register_sidebar( array(
		'name' => __( 'Home Text Left', 'nat' ),
		'id' => 'home-text-left',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="home-text-title">',
		'after_title' => '</h1>'
	));
	register_sidebar( array(
		'name' => __( 'Home Text Center', 'nat' ),
		'id' => 'home-text-center',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="home-text-title">',
		'after_title' => '</h1>'
	));
	register_sidebar( array(
		'name' => __( 'Home Text Right', 'nat' ),
		'id' => 'home-text-right',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="home-text-title">',
		'after_title' => '</h1>'
	));
	//remove parent widgets
	unregister_sidebar( 'right-sidebar' );
	unregister_sidebar( 'left-sidebar' );
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'statichero' );
	unregister_sidebar( 'footerfull' );
}
add_action( 'widgets_init', 'nat_register_widgets', 11 );

//remove unnecessary tags for validation
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);

function myplugin_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}