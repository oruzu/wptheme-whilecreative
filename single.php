<?php
/*
Template Name: 固定ページ（１カラム）
*/
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', get_post_format() ); ?>
	
				<?php endwhile; ?>
				
				<?php
					if ( comments_open() ) :
						comments_template();
					endif;
				?>
				
			<?php else : ?>
	
				<?php get_template_part( 'content', 'none' ); ?>
	
			<?php endif; ?>
			
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>