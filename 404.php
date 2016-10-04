<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">ページが見つかりません</h1>
				</header>
				
				<div class="page-content">
					<p>お探しのページは見つかりませんでした。再度お試しください。</p>
					<p><a href="<?php echo home_url(); ?>">TOPページに戻る</a></p>
				</div>
			</section>
			
		</main>
	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>