<?php //seperated footer body to call as page content when needed ?>
<footer id="nature-foot-wrap" class="container-fluid">
	<div id="nature-foot" class="row">
		<div id="foot-logo" class="col-md-3"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_NatureStudio.png' ?>" /></a></div>
		<div id="foot-menu" class="col-md-4">
			<div class="container-fluid">
				<div class="row">
					<?php
					$nav_args = array(
						'menu' => 'primary',
						'container' => false,
						'before' => '<div class="col align-middle">',
						'after' => '</div>',
						'echo' => false,
						'items_wrap' => '%3$s',
						'depth' => 0,
					);

					echo strip_tags(wp_nav_menu( $nav_args ), '<div><a>' );
					?>
					<!-- wp_nav_menu( array( 'items_wrap' => '%3$s' ) ); -->
				</div>
			</div>
		</div>
		<div id="foot-addy" class="col-md-3 offset-md-2">
			<p>Nature Studio<br>
			1060 Hancock St. #17<br>
			Brooklyn, NY 11221</p>
		</div>
	</div>
	<div id="legal-line" class="row">
		<div class="col-md-12">
			©2018 NATURE STUDIO LLC — ALL RIGHTS RESERVED.
		</div>
	</div>
</footer>