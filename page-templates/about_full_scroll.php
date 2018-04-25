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

<div id="about-page" class="container-fluid">
    <div class="content row">
        <div class="container-fluid">
    <?php
        $the_query = new WP_Query( array( 'category_name' => 'about-content' ) );
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    $about_text = get_the_content(); 
                    echo '<div class="scrollTo row"><div class="col-12">';
                    echo '<h1 class="about_header">'. get_the_title() . '</h1>';
                    echo '<div class="about_text">'. strip_tags($about_text, '<img><h2>') .'</div>';
                    echo '</div></div>';
                }
                wp_reset_postdata();
            } else {
                echo 'no content matches about-content category';
            }
    ?>
    <div class="scrollTo row nopadding">
        <div class="col"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_1.jpg' ?>" /></div>
        <div class="col"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_2.jpg' ?>" /></div>
        <div class="col"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_3.jpg' ?>" /></div>
        <div class="col"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_4.jpg' ?>" /></div>
    </div>
</div>
</div>
</div>
<?php get_footer(); ?>