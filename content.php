<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package whilecreative
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<div class="entry-category">
			<?php whilecreative_entry_categories(); ?>
		</div>
		<?php endif; ?>
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
		<?php if ( is_single() ) : ?>
		<div class="entry-meta">
			<?php whilecreative_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_single() ) {
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'whilecreative' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'whilecreative' ),
					'after'  => '</div>',
				) );

			} else {
				the_excerpt();
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //whilecreative_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
