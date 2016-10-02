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
		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<?php //whilecreative_posted_on(); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?php //whilecreative_entry_categories(); ?>
				</div>
				<div class="col-xs-12 col-sm-3">
					<?php //whilecreative_entry_tags(); ?>
				</div>
			</div>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
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
