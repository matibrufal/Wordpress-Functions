# Wordpress Functions

This is a recopilation of some useful functions to use when you develop a Wordpress theme.

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
					'post_tag',
					'category'
				),
				'menu_position' => 2,
				'menu_icon' => 'dashicons-portfolio'
			)
		);
	}

	add_action('init', 'create_post_type');

```

### Create a Custom Taxonomy

```PHP



```