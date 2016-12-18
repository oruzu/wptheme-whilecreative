<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
				
				<?php if ( is_search() ) : ?>
				<header>
					<h1 class="page-title">
						<?php whilecreative_archive_title(); ?>
					</h1>
				</header>
				<?php endif; ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', get_post_format() ); ?>
	
				<?php endwhile; ?>
	
				<?php the_posts_pagination(); ?>
			
			<?php else : ?>
	
				<?php get_template_part( 'content', 'none' ); ?>
	
			<?php endif; ?>
			
		</main>
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>