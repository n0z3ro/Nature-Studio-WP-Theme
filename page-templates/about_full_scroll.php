<?php
/**
 * Template Name: About Page - Full Scrolling
 *
 * Template for displaying about page with full page scrolling.
 *
 * @package understrap
 */

get_header();

$about_content = new WP_Query( array( 'category_name' => 'about-content' ) );
?>
<div id="about-page" class="container-fluid">
	<div class="content row">
		<section class="slide-wrapper">
			<div class="container-fluid">
				<div id="vertCarousel" class="carousel vert slide" data-ride="carousel" data-interval="false" data-wrap="false">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php $slide_number = 0; //set initial slide number for client images ?>
						<li data-target="#vertCarousel" data-slide-to="<?php echo $slide_number ?>" class="active"></li>
						<?php
							//increment slide number for each content slide
							if ( $about_content->have_posts() ) {
								while ( $about_content->have_posts() ) {
									$about_content->the_post();
									$slide_number++;
									echo '<li data-target="#vertCarousel" data-slide-to="'.$slide_number.'"></li>';
								}
								//wp_reset_postdata();
							}
						?>
						<?php $slide_number++; //last slide number for team images/footer ?>
						<li data-target="#vertCarousel" data-slide-to="<?php echo $slide_number ?>"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="fill">
								<div class="container-fluid">
									<div class="scrollTo row">
										<div class="col-12">
											<h1 class="about_header">clients</h1>
											<div class="about_text">
												<div class="container-fluid">
													<div id="client-logo-img" class="row">
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-scion" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Scion.png' ?>" alt="Scion" />
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-spike" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Spike.png' ?>" alt="Spike"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-pepsi" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Pepsi.png' ?>" alt="Pepsi"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-nike" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Nike.png' ?>" alt="Nike"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-ea" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_EASports.png' ?>" alt="EA Sports"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-md" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_MountainDew.png' ?>" alt="Mountain Dew"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-bounce" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Bounce.png' ?>" alt="Bounce"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-goods" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Goods.png' ?>" alt="Goods"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-frank" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Frank.png' ?>" alt="Frank"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-pioneer" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Pioneer.png' ?>" alt="Pioneer"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-shure" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Shure.png' ?>" alt="Shure"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-stanton" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Stanton.png' ?>" alt="Stanton"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2 offset-md-6">
															<img id="logo-zo" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_ZenithOptimedia.png' ?>" alt="Zenith Optimedia"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-tablist" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Tablist.png' ?>" alt="Tablist"/>
														</div>
														<div class="col-4 col-sm-4 col-md-2">
															<img id="logo-nyparks" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_NYParksRec.png' ?>" alt="NY Parks and Rec"/>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ( $about_content->have_posts() ) {
								while ( $about_content->have_posts() ) {
									$about_content->the_post();
									$about_text = get_the_content(); 
									echo '<div class="carousel-item"><div class="fill">';
									echo '<h1 class="about_header">'. esc_html(get_the_title()) . '</h1>';
									echo '<div class="about_text">'. strip_tags($about_text, '<img><h2><div>') .'</div>';
									echo '</div></div>';
								}
								wp_reset_postdata();
							} else {
								echo 'no content matches about-content category';
							}
						?>
						<div class="carousel-item">
							<div class="fill">
								<div class="container-fluid team-images">
									<div class="row">
										<div class="col-sm-4"><h2>TEAM<h2></div>
										<div class="col-sm-4"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_1.jpg' ?>" alt="Nik"/></div>
										<div class="col-sm-4"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_2.jpg' ?>" alt="John"/></div>
										<div class="col-sm-4"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_3.jpg' ?>" alt="Tamika"/></div>
										<div class="col-sm-4"><img src="<?php echo get_stylesheet_directory_uri() . '/img/Portrait_4.jpg' ?>" alt="Clint"/></div>
										<div class="col-sm-4"><h2>LIKE US?</h2><span>Cool! Hit us up. We’re always looking for truly talented people to join our crew.</span></div>
									</div>
								</div>

								<?php /*wrap footer content in slider*/ get_template_part( 'page-templates/partials/content', 'footer' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<?php /*

		


</div>

*/?>
<?php get_footer(); ?>