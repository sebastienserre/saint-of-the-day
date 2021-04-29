<?php

/**
 * Flush the cache
 * cron scheduled each day at midnight
 */

	require( 'wp-load.php' );

	/**
	 * Flush cache & reload
	 */

	if ( function_exists( 'rocket_clean_domain' ) ) {
		rocket_clean_domain();
	}