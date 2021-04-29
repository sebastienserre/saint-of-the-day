<?php
if ( ! function_exists('thfo_cpt_saint') ) {

// Register Custom Post Type
	function thfo_cpt_saint() {

		$labels = array(
			'name'                  => _x( 'Saints du Jour', 'Post Type General Name', 'saint-du-jour' ),
			'singular_name'         => _x( 'Saint du jour', 'Post Type Singular Name', 'saint-du-jour' ),
			'menu_name'             => __( 'Saints du Jour', 'saint-du-jour' ),
			'name_admin_bar'        => __( 'Saints du jour', 'saint-du-jour' ),
			'archives'              => __( 'Saint Archives', 'saint-du-jour' ),
			'parent_Saint_colon'     => __( 'Parent Saint:', 'saint-du-jour' ),
			'all_Saints'             => __( 'All Saints', 'saint-du-jour' ),
			'add_new_Saint'          => __( 'Add New Saint', 'saint-du-jour' ),
			'add_new'               => __( 'Add New', 'saint-du-jour' ),
			'new_Saint'              => __( 'New Saint', 'saint-du-jour' ),
			'edit_Saint'             => __( 'Edit Saint', 'saint-du-jour' ),
			'update_Saint'           => __( 'Update Saint', 'saint-du-jour' ),
			'view_Saint'             => __( 'View Saint', 'saint-du-jour' ),
			'search_Saints'          => __( 'Search Saint', 'saint-du-jour' ),
			'not_found'             => __( 'Not found', 'saint-du-jour' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'saint-du-jour' ),
			'featured_image'        => __( 'Featured Image', 'saint-du-jour' ),
			'set_featured_image'    => __( 'Set featured image', 'saint-du-jour' ),
			'remove_featured_image' => __( 'Remove featured image', 'saint-du-jour' ),
			'use_featured_image'    => __( 'Use as featured image', 'saint-du-jour' ),
			'insert_into_Saint'      => __( 'Insert into Saint', 'saint-du-jour' ),
			'uploaded_to_this_Saint' => __( 'Uploaded to this Saint', 'saint-du-jour' ),
			'Saints_list'            => __( 'Saints list', 'saint-du-jour' ),
			'Saints_list_navigation' => __( 'Saints list navigation', 'saint-du-jour' ),
			'filter_Saints_list'     => __( 'Filter Saints list', 'saint-du-jour' ),
		);
		$rewrite = array(
			'slug'                  => 'saint-du-jour',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Saint du jour', 'saint-du-jour' ),
			'description'           => __( 'Post Type Description', 'saint-du-jour' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'rewrite'               => $rewrite,
			'menu_icon' => 'dashicons-id-alt'
		);
		register_post_type( 'saint', $args );

	}
	add_action( 'init', 'thfo_cpt_saint', 0 );

}