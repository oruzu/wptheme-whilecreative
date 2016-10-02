<header id="header" class="site-header">
	<?php if ( has_nav_menu( 'global' ) ) : ?>
	<nav class="nav nav-global" id="site-navigation">
		<div class="container">
			<button class="menu-toggle" aria-controls="global-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'whilecreative' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'global', 'menu_id' => 'global-menu' ) ); ?>
		</div>
	</nav>
	<?php endif; ?>
	
	<div class="header-branding">
		<div class="container">
			<a href="<?php echo home_url(); ?>">
				<div style="padding: 1.2em 0; text-align: center; font-size: 3.6rem; color: #555;">.header-branding</div>
			</a>
		</div>
	</div>
	
	<?php if ( has_nav_menu( 'header' ) ) : ?>
	<nav class="nav nav-header">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_id' => 'header-menu' ) ); ?>
		</div>
	</nav>
	<?php endif; ?>
</header>
