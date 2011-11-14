	
	<div id="footer">
		<div id="copyright">
			<?php ice_option_value( 'copyright', __('Copyright &copy; 2011 ICEnDESIGN. All rights reserved.', 'ice'), true ); ?>
		</div>

		<?php wp_nav_menu(array('theme_location' => 'footer_menu', 'container_class' => 'footer-navigation')); ?>
	</div>

</div>

</body>

</html>