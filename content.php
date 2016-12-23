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
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php endif; ?>
	<div class="entry-main">
		<header class="entry-header">
			<div class="entry-category">
				<?php whilecreative_entry_category(); ?>
				<?php whilecreative_entry_date_published( false ); ?>
			</div>
			
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php
				the_excerpt();
			?>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php //whilecreative_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
