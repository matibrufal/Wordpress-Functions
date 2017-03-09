# Elementals

### Create a Post Type
[Codex](https://codex.wordpress.org/Function_Reference/register_post_type)

```PHP

	// Create Post Type

	function create_post_type() {
		register_post_type( 'portfolio',
			array(
				'labels' => array(
					'name' => __( 'Portfolio' ),
				),
				'capability_type' => 'post',
				'public' => true,
				'has_archive' => true,
				'hierarchical' => false,
				'rewrite' => array('with_front' => false, 'slug' => 'portfolio'),
				'supports' => array(
					'title',
					'editor',
					'thumbnail'
				),
				'taxonomies' => array (
					'skills'
				),
				'menu_position' => 2,
				'menu_icon' => 'dashicons-portfolio'
			)
		);
	}

	add_action('init', 'create_post_type');

```

### Create a Custom Taxonomy
[Codex](https://codex.wordpress.org/Function_Reference/register_taxonomy)

```PHP

	// Create Taxonomy

	function create_taxonomy() {
		register_taxonomy(
			'skills', 'portfolio',
			array(
				'label' => __( 'Skills' ),
				'rewrite' => array('with_front' => false, 'slug' => 'skills' ),
				'hierarchical' => true,
			)
		);
	}

	add_action('init', 'create_taxonomy');

```

```PHP

	// Hide update nag to non admins

	function hide_update_notice_to_all_but_admin() {
	    if ( !current_user_can( 'update_core' ) ) {
	        remove_action( 'admin_notices', 'update_nag', 3 );
	    }
	}

	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin', 1 );

```

```PHP

	// Remove WordPress Admin Bar

	function remove_admin_bar() {
	    remove_action('wp_head', '_admin_bar_bump_cb');
	}

	add_action('get_header', 'remove_admin_bar');

```
