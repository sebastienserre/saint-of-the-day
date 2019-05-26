<?php
/*
  Plugin Name: Saint du Jour 5P2P
  Plugin URI: http://5p2p.mt.eglises.xyz/
  Description: Affiche les Saints du jour sur votre site
  Version: 1.0.1
  Author: 5P2P
  Author URI: http://5p2p.mt.eglises.xyz/
  Text Domain: 5p2p-saint-du-jour
  Domain Path: /languages
 */
// don't load directly
if (!defined('ABSPATH')) {
    die('-1');
}

// Plugin constants
define('THFO_SAINT_VERSION', '1.0.0');
define('THFO_SAINT_URL', plugin_dir_url(__FILE__));
define('THFO_SAINT_DIR', plugin_dir_path(__FILE__));

include THFO_SAINT_DIR . '/inc/cpt.php';
include THFO_SAINT_DIR . '/inc/acf.php';




/**
 * Display Saint of the day in Genesis Header
 */
add_action( 'plugins_loaded', 'thfo_sod_genesis' );
function thfo_sod_genesis() {
	if ( ! empty( $display_saint = get_field( 'display_saint', 'option' ) ) & $display_saint == '1' ) {
		add_action( 'genesis_header_right', 'saint_display', 1000 );
	}
}



/**
 * choosing g a special template
 */

add_filter( 'template_include', 'saint_override_template', 99 );

/**
 * @param $page_template
 *
 * @return string
 */
function saint_override_template( $page_template )
{

    if (is_singular( 'saint' )) {
        //die('toto');
        $page_template = dirname( __FILE__ ) . '/templates/single-saint.php';
        return $page_template;
    } else {
        return $page_template;
    }

}

/**
 * Display Saint of the day
 */

function saint_display()
{

    $cur_date = date('md');
    //var_dump($cur_date);

    // WP_Query arguments
    $args = array(
        'post_type' => array('saint'),
        'meta_query'             => array(
            array(
                'key'       => 'saint_date',
                'value'     => $cur_date,
                'compare'   => '=',
                'type'      => 'CHAR',
            ),
        ),
        'order' => 'DESC',
        'posts_per_page' => 1
    );

// The Query
    $query = new WP_Query($args);
    //var_dump($query);

// The Loop
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>
            <div class="saint-jour"> <?php
            echo '<p style="color:' . get_theme_mod('entete_color') . '" class="date-saint">' . date_i18n('l j F Y') . '</p>'; ?>
            <a style="color:<?php echo get_theme_mod('entete_color'); ?>" class="lien-saint" href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
            </a>
            </div> <!-- saint -->
            <?php }
        }


// Restore original Post Data
    wp_reset_postdata();
}