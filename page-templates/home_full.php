<?php
/**
 * Template Name: Home Page Template
 *
 * Template for displaying a home page.
 *
 * @package understrap
 */

get_header();
?>
<div id="home-page" class="container-fluid">
	<div class="row">
		<div class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<div class="row">
					<div id="splash-img" style="background-image:url('<?php echo get_stylesheet_directory_uri() . '/img/NatureStudio-EA_Splash.jpg' ?>')">
						<!--<img src="<?php echo get_stylesheet_directory_uri() . '/img/NatureStudio-EA_Splash.jpg' ?>" /> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-fluid">
			<div id="client-spotlight" class="row">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<h1> CLIENTS: </h1>
						</div>
					</div>
					<div id="client-logo-img" class="row">
						<div class="col-6 col-sm-6 col-md-2">
							<img id="logo-scion" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Scion.png' ?>" />
						</div>
						<div class="col-6 col-sm-6 col-md-2">
							<img id="logo-spike" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Spike.png' ?>" />
						</div>
						<div class="col-6 col-sm-6 col-md-2">
							<img id="logo-pepsi" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Pepsi.png' ?>" />
						</div>
						<div class="col-6 col-sm-6 col-md-2">
							<img id="logo-nike" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_Nike.png' ?>" />
						</div>
						<div class="col-6 col-sm-6 col-md-2">
							<img id="logo-ea" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_EASports.png' ?>" />
						</div>
						<div class="col-6 col-sm-6 col-md-2">
							<img id="logo-md" src="<?php echo get_stylesheet_directory_uri() . '/img/Logo_MountainDew.png' ?>" />
						</div>
					</div>
				</div>
			</div>
			<div id="nature-exp" class="row">
				<div class="col-md-4">
					<h1> WHO WE ARE: </h1>
					<div class="exp-txt">
						Nature was created by Nicanor Cruz and is a creative collective. We grow brands from the underground and make them pop. We consult brands and agencies in youth culture and lifestyle. We have a decade and a half of experience in custom
					</div>
				</div>
				<div class="col-md-4">
					<h1> WHAT WE DO: </h1>
					<div class="exp-txt">
						Nature creates opportunity for our clients to connect with their audiences in distinct, authentic, meaningful and rewarding ways. We are an agency that publishes and specialize in developing, marketing and distributing.... more
					</div>
				</div>
				<div class="col-md-4">
					<h1> SERVICES: </h1>
					<div class="exp-txt">
						<ul>
							<li>Market &amp; Culture Research</li>
							<li>Product &amp; Brand Development</li>
							<li>Strategy &amp; Management</li>
							<li>Content Development &amp; Production</li>
							<li>Media &amp; Advertising</li>
							<li>Print, Digital &amp; Experiential</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

<?php endwhile; // end of the loop. ?>
-->
<?php get_footer(); ?>