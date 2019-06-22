<?php
/**
 * The template for displaying archive pages
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
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
