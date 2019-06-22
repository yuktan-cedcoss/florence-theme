<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package florence
 */

get_header();
?>
<?php
	global $redux_demo; 
	$florence_layout_left_sidebar = $redux_demo['opt-select'];
	if( ! wp_is_mobile() && $florence_layout_left_sidebar == '1'){
		get_sidebar();
	}
?>
	<div id="primary" class="content-area <?php 
		global $redux_demo; 
		$florence_layout_select_options = $redux_demo['opt-select'];
		if($florence_layout_select_options == '1' || $florence_layout_select_options == '2'){
			echo "col-sm-12 col-md-8";
		}
		else{
			echo "col-sm-12 col-md-12";
		}
	?>">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
	global $redux_demo; 
	$florence_layout_right_sidebar = $redux_demo['opt-select'];
	if( wp_is_mobile() && $florence_layout_right_sidebar == '1' || $florence_layout_right_sidebar == '2'){
		get_sidebar();
	}
	elseif(! wp_is_mobile() && $florence_layout_right_sidebar == '2'){
		get_sidebar();
	}
?>
<?php
get_footer();
