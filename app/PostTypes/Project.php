<?php

/*
 *
 * Register 'Project' post
 * 
 */

add_action('init', function() {
    register_post_type('project',
       array(
          'labels' => array(
            'name' => __('Projects'),
            'singular_name' => __('Project'),
            'add_new_item' => __( 'Add New Project'),
            'edit_item'         => 'Edit project'
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array(
              'slug' => get_permalink(get_option('page_for_projects'))
          ),
          'menu_icon' => 'dashicons-image-filter',
          'menu_position' => 4,
          'show_in_rest' => true,
          'supports' => array('title','thumbnail','excerpt','page-attributes','editor', 'revisions'),
       )
    );

    $post_type_object = get_post_type_object( 'project' );
    $post_type_object->template = array(
        array( 'core/paragraph', array(
            'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        ) ),
        array( 'core/separator', array(
            'className' => 'is-style-wide'
        ) ),
        array( 'core/heading', array(
            'content' => 'About this project',
            'level' => '2'
        ) ),
        array( 'core/paragraph', array(
            'placeholder' => ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        ) )
    );

    // This allows the 'view all posts relating to this project link
    add_action('pre_get_posts', function ($query) {
        if (isset($_GET['projects']) && $query->is_home() && $query->is_main_query() && !is_admin()) {
            $my_project = get_posts( [
                'post_type'=> 'project',
                'posts_per_page' => 1,
                'post_name__in'  => [$_GET['projects']]
            ] );

            if($my_project) {
                $query->set('meta_key', 'project');
                $query->set('meta_compare', 'LIKE');
                $query->set('meta_value', '"' . $my_project[0]->ID . '"');
            }
        }
    });
});

    // add_action( 'add_meta_boxes', function() {
    //     add_meta_box(
    //         'wporg_box_id',                 // Unique ID
    //         'Related posts',                // Box title
    //         'App\add_project_box_html',     // Content callback, must be of type callable
    //         'project',                      // Post type
    //         'side'                          // Position
    //     );
    // });

    // function add_project_box_html( $post ) {
    //     $related_posts = get_posts([
    //                     'numberposts' => 21,
    //                     'post_type'        => 'post',
    //                     'meta_query' => array(
    //                                 array(
    //                                     'key' => 'project', // name of custom field
    //                                     'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
    //                                     'compare' => 'LIKE'
    //                                 )
    //                             )
                        
    //     ]);

   /**
 * Adds a custom field: "Projects page"; on the "Settings > Reading" page.
 */
add_action( 'admin_init', function () {
    $id = 'page_for_projects';
    // add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() )
    add_settings_field( $id, 'Projects page:', 'settings_field_page_for_projects', 'reading', 'default', array(
        'label_for' => 'field-' . $id, // A unique ID for the field. Optional.
        'class'     => 'row-' . $id,   // A unique class for the TR. Optional.
    ) );
} );

/**
 * Renders the custom "Projects page" field.
 *
 * @param array $args
 */
function settings_field_page_for_projects( $args ) {
    $id = 'page_for_projects';
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
    $options['reading'][] = 'page_for_projects';

    return $options;
} );