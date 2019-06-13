<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package florence
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'florence' ); ?></a>
	<header id="masthead" class="site-header">
	<nav id="site-navigation" class="main-navigation navbar-expand-md fixed-top navbar navbar-light bg-white">
			<button class="menu-toggle navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    		<!-- <span><i class="fas fa-bars"></i></span> -->
  			</button>
  			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'        => 'navbar-nav',

				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	<div class="container">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$florence_description = get_bloginfo( 'description', 'display' );
			if ( $florence_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $florence_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</div>
	</header><!-- #masthead -->

	
	<div id="content" class="site-content">
	<div class="container">
	<div class="row">