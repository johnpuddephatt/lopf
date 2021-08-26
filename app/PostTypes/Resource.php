<?php

/*
 *
 * Register 'Resource' post
 * 
 */

add_action('init', function() {
    register_post_type('resource',
       array(
          'labels' => array(
            'name' => __('Resources'),
            'singular_name' => __('Resource'),
            'add_new_item' => __( 'Add New Resource'),
            'edit_item'         => 'Edit resource'
          ),
          'public' => true,
          'publicly_queryable' => true,
          'has_archive' => true,
          'rewrite' => array(
            'slug' => str_replace('/','',wp_make_link_relative(get_permalink(get_option('page_for_resources'))))
          ),
          'menu_icon' => 'dashicons-category',
          'menu_position' => 4,
          'show_in_rest' => true,
          'supports' => array('title','excerpt'),
       )
    );
});



/**
 * Adds a custom field: "Projects page"; on the "Settings > Reading" page.
 */
add_action( 'admin_init', function () {
    $id = 'page_for_resources';
    // add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() )
    add_settings_field( $id, 'Resources page:', 'settings_field_page_for_resources', 'reading', 'default', array(
        'label_for' => 'field-' . $id, // A unique ID for the field. Optional.
        'class'     => 'row-' . $id,   // A unique class for the TR. Optional.
    ) );
} );

/**
 * Renders the custom "Projects page" field.
 *
 * @param array $args
 */
function settings_field_page_for_resources( $args ) {
    $id = 'page_for_resources';
    wp_dropdown_pages( array(
        'name'              => $id,
        'show_option_none'  => '&mdash; Select &mdash;',
        'option_none_value' => '0',
        'selected'          => get_option( $id ),
    ) );
}

/**
 * Adds page_for_projects to the white-listed options, which are automatically
 * updated by WordPress.
 *
 * @param array $options
 */
add_filter( 'allowed_options', function ( $options ) {
    $options['reading'][] = 'page_for_resources';
    return $options;
} );