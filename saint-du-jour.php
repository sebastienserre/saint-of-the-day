<?php
/*
  Plugin Name: Saint du Jour
  Plugin URI: https://thivinfo.com
  Description: Affiche les Saints du jour sur votre site
  Version: 1.0.2
  Author: Thivinfo.com
  Author URI: https://thivinfo.com
  Text Domain: 5p2p-saint-du-jour
  Domain Path: /languages
 */
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Plugin constants

add_action( 'plugins_loaded', 'sod_define' );
function sod_define() {
	define( 'THFO_SAINT_VERSION', '1.0.2' );
	define( 'THFO_SAINT_URL', plugin_dir_url( __FILE__ ) );
	define( 'THFO_SAINT_DIR', plugin_dir_path( __FILE__ ) );
}

add_action( 'plugins_loaded', 'sod_loadfile');
function sod_loadfile() {
	include THFO_SAINT_DIR . '/inc/cpt.php';
	include THFO_SAINT_DIR . '/inc/acf.php';
	include THFO_SAINT_DIR . '/inc/helpers.php';
}

/**
 * Display Saint of the day in Genesis Header
 */
add_action( 'plugins_loaded', 'thfo_sod_genesis' );
function thfo_sod_genesis() {
	if ( ! function_exists( 'get_field' ) ) {
		return;
	}
	if ( ! empty( $display_saint = get_field( 'display_saint', 'option' ) ) & $display_saint == '1' ) {
		add_action( 'genesis_header_right', 'saint_display', 1000 );
	}
}

/**
 * Display Saint of the day
 */

function get_saint_display() {

	$cur_date = date( 'md' );

	// WP_Query arguments
	$args = array(
		'post_type'      => array( 'saint' ),
		'meta_query'     => array(
			array(
				'key'     => 'saint_date',
				'value'   => $cur_date,
				'compare' => '=',
				'type'    => 'CHAR',
			),
		),
		'order'          => 'DESC',
		'posts_per_page' => 1
	);

// The Query
	$query = new WP_Query( $args );
	//var_dump($query);
	ob_start();
// The Loop
	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			$query->the_post(); ?>
            <div class="saint-jour"> <?php
				echo '<p style="color:' . get_theme_mod( 'entete_color' ) . '" class="date-saint">' . ucfirst( date_i18n( 'l j F Y' ) )
				     . '</p>'; ?>
                <a style="color:<?php echo get_theme_mod( 'entete_color' ); ?>" class="lien-saint"
                   href="<?php the_permalink() ?>">
					<?php the_title(); ?>
                </a>
            </div> <!-- saint -->
		<?php }
	}


// Restore original Post Data
	wp_reset_postdata();

    return ob_get_clean();
}

function saint_display(){
    echo get_saint_display();
}

add_shortcode( 'display_saint', 'get_saint_display' );