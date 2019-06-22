<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
	<section id="primary" class="content-area <?php 
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
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for %s', 'florence' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->
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
