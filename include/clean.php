<?php

/**
 * Remove emoji support
 *
 * @link https://wordpress.org/support/article/using-smilies/
 */

add_action(
	'init',
	function () {
		// Front-end
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		// Admin
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );

		// Feeds
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// Embeds
		remove_filter( 'embed_head', 'print_emoji_detection_script' );

		// Emails
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		// Disable from TinyMCE editor. Disabled in block editor by default
		add_filter(
			'tiny_mce_plugins',
			function ( $plugins ) {
				if ( is_array( $plugins ) ) {
					$plugins = array_diff( $plugins, array( 'wpemoji' ) );
				}

				return $plugins;
			}
		);

		/**
		 * Finally, disable it from the database also, to prevent characters from converting
		 *  There used to be a setting under Writings to do this
		 *  Not ideal to get & update it here - but it works :/
		 */
		if ( (int) get_option( 'use_smilies' ) === 1 ) {
			update_option( 'use_smilies', 0 );
		}
	}
);

/**
 * Remove feeds and wordpress-specific content that is generated on the wp_head hook.
 *
 * @link https://developer.wordpress.org/reference/hooks/wp_head/
 */
add_action(
	'init',
	function () {
		// Remove the Really Simple Discovery service link
		remove_action( 'wp_head', 'rsd_link' );

		// Remove the link to the Windows Live Writer manifest
		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Remove the general feeds
		remove_action( 'wp_head', 'feed_links', 2 );

		// Remove the extra feeds, such as category feeds
		remove_action( 'wp_head', 'feed_links_extra', 3 );

		// Remove the displayed XHTML generator
		remove_action( 'wp_head', 'wp_generator' );

		// Remove the REST API link tag
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

		// Remove oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

		// Remove rel next/prev links
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

		// Remove prefetch url
		remove_action( 'wp_head', 'wp_resource_hints', 2 );
	}
);
/**
 * De-registers WordPress default javascript
 *
 * @link https://developer.wordpress.org/reference/functions/wp_deregister_script/
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_deregister_script( 'jquery' );
	}
);

/**
 * Remove oEmbed-specific JavaScript from the front-end and back-end.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_oembed_add_host_js/
 */
remove_action( 'wp_head', 'wp_oembed_add_host_js' );