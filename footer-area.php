<footer id="footer" class="site-footer">
	<div class="footer-area">
		<div class="container">
			<div style="padding: 1.8em 0; text-align: center; font-size: 3.6rem;  color: #555;">.footer-main</div>
		</div>
	</div>
	
	<?php if ( has_nav_menu( 'footer' ) ) : ?>
	<nav class="nav nav-footer">
		<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
	</nav>
	<?php endif; ?>
	
	<div class="footer-copyright">
		<div class="container">
			&copy; <?php echo date_i18n( 'Y' ); ?> While Creation.
		</div>
	</div>
</footer>

<div class="gotop">
</div>
