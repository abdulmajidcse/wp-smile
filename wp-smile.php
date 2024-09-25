<?php

/*
 * Plugin Name:       WP Smile
 * Description:       A funny WordPress plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Md. Abdul Majid
 * Author URI:        https://abdulmajid.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Register the "book" custom post type
 */
function wp_smile_setup_post_type()
{
    register_post_type('book', ['public' => true]);
}
add_action('init', 'wp_smile_setup_post_type');

/**
 * Activate the plugin.
 */
function wp_smile_activate()
{
    // Trigger our function that registers the custom post type plugin.
    wp_smile_setup_post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'wp_smile_activate');

/**
 * Deactivation hook.
 */
function wp_smile_deactivate()
{
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type('book');
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'wp_smile_deactivate');

