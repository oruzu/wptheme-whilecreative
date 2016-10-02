<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
	
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php if ( is_page() ) : ?>
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endif; ?>
	
				<?php endwhile; ?>
	
				<?php the_posts_pagination(); ?>
			
			<?php else : ?>
	
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
			<?php endif; ?>
			
		</div>
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>