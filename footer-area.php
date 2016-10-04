<footer id="footer" class="site-footer">
	<?php
	if ( is_active_sidebar( 'footer-1' ) ||
	     is_active_sidebar( 'footer-2' ) ||
	     is_active_sidebar( 'footer-3' ) ) :
	?>
	<div class="footer-area">
		<div class="container">
			<div class="widget-area">
				<?php
				for ( $i = 1; $i <= 3; $i++ ) :
					if ( is_active_sidebar( 'footer-'.$i ) ) :
				?>
				<?php dynamic_sidebar( 'footer-'.$i ); ?>
				<?php
					endif;
				endfor;
				?>
			</div>
		</div>
	</div>
	<?php
	endif;
	?>
	
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
