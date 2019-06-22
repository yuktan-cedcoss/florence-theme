<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
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
