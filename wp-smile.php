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
 * Text Domain:       wpsmile
 * Domain Path:       /languages
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register the "book" custom post type
 */
function wpsmile_setup_post_type()
{
    register_post_type('book', [
        'public' => true,
        'labels' => [
            'name' => __('Books', 'wpsmile'),
            'singular_name' => __('Book', 'wpsmile'),
            'menu_name' => __('Books', 'wpsmile'),
            'name_admin_bar' => __('Book', 'wpsmile'),
            'add_new_item' => __('Add New Book', 'wpsmile'),
            'new_item' => __('New Book', 'wpsmile'),
            'edit_item' => __('Edit Book', 'wpsmile'),
            'new_item' => __('New Book', 'wpsmile'),
            'view_item' => __('View Book', 'wpsmile'),
            'search_items' => __('Search Books', 'wpsmile'),
            'not_found' => __('No books found', 'wpsmile'),
            'not_found_in_trash' => __('No books found in Trash', 'wpsmile'),
        ]
    ]);
}
add_action('init', 'wpsmile_setup_post_type');

/**
 * Activate the plugin.
 */
function wpsmile_activate()
{
    // Trigger our function that registers the custom post type plugin.
    wpsmile_setup_post_type();
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'wpsmile_activate');

/**
 * Deactivation hook.
 */
function wpsmile_deactivate()
{
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type('book');
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'wpsmile_deactivate');
