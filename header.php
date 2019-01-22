<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and <body> tag
 *
 * @package understrap
 */

// $container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
		content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1:100,200,300,400,500,600,700,800,900&amp;subset=korean" rel="stylesheet">
<script>
ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
ajaxpageId = '<?php echo get_the_ID(); ?>';
</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="top-container" class="container-fluid">
		<div id="top-row" class="row">