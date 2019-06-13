<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package florence
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php florence_post_thumbnail(); ?>
	<header class="entry-header">
		<?php florence_entry_footer(); ?>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if( !is_single() ):
			the_excerpt();
		else:
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'florence' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'florence' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	<?php
		if ( 'post' === get_post_type() ) :
		?>
			<div class="entry-meta">
				<?php
				florence_posted_on();
				florence_posted_by();
				?>
			</div><!-- .entry-meta -->
	<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
