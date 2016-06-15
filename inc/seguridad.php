<?php 

	// Remover mensajes de errores en wp-login
	add_filter('login_errors', create_function('$a', "return 'Invalid Input';"));

	// Remover versión de Wordpress en meta tags y rss feed
	function remover_version() {
		return '';
	}
	add_filter('the_generator', 'remover_version');

?>