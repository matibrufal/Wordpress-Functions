# Wordpress Functions

This is a recopilation of some useful functions to use when you develop a Wordpress theme.

### Disable Emoji Mess

```PHP

	// Disable Emoji Mess

	function disable_wp_emojicons() {
	    remove_action( 'admin_print_styles', 'print_emoji_styles' );
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	    add_filter( 'emoji_svg_url', '__return_false' );
	}
	add_action( 'init', 'disable_wp_emojicons' );
	function disable_emojicons_tinymce( $plugins ) {
	    if ( is_array( $plugins ) ) {
	        return array_diff( $plugins, array( 'wpemoji' ) );
	    } else {
	        return array();
	    }
	}

```

```PHP

	// Remove Comments

	add_action( 'admin_menu', 'my_remove_admin_menus' );

	function my_remove_admin_menus() {

		// Removes from admin menu
		remove_menu_page( 'edit-comments.php' );
	}

	add_action( 'init', 'remove_comment_support', 100 );

	function remove_comment_support() {

		// Removes from post and pages
		remove_post_type_support( 'post', 'comments' );
		remove_post_type_support( 'page', 'comments' );
	}

	function mytheme_admin_bar_render() {

		// Removes from admin bar
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( 'comments' );
	}

	add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

```