<?php
/**
 * The template for displaying the footer.
 *
 * @package understrap
 */

//$the_theme = wp_get_theme();
//$container = get_theme_mod( 'understrap_container_type' );
?>
</div><!-- #top-row .row -->
</div><!-- #top-container .container-fluid -->

<?php

if (is_page_template('page-templates/media_case_study.php')) { 

    get_template_part( 'page-templates/partials/content', 'casestudiesfooter' );
}
 get_template_part( 'page-templates/partials/content', 'footer' );
 ?>

<?php wp_footer(); ?>
</body>
</html>