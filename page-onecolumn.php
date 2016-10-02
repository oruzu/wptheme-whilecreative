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
					
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
	
				<?php endwhile; ?>
	
				<?php the_posts_pagination(); ?>
			
			<?php else : ?>
	
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
			<?php endif; ?>
			
		</div>
	</div>
	
<?php get_footer(); ?>