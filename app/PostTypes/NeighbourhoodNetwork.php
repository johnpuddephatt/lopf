<?php

/*
 *
 * Register 'Neighbouhood Network' post
 * 
 */

add_action('init', function() {
    register_post_type('neighbourhoodnetwork',
       array(
          'labels' => array(
            'menu_name' => 'Networks',
            'name' => __('Neighbourhood Networks'),
            'singular_name' => __('Neighbourhood Network'),
            'add_new_item' => __( 'Add New Neighbourhood Network'),
            'edit_item'         => 'Edit Neighbourhood Network'
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array(
              'slug' => 'groups/neighbourhood-network',
          ),
          'menu_icon' => 'dashicons-groups',
          'menu_position' => 4,
          'show_in_rest' => true,
          'supports' => array('title','excerpt','thumbnail'),
       )
    );

    /*
    *
    * Add address to REST API
    * 
    */

    add_filter( 'rest_prepare_neighbourhoodnetwork', function ( $data, $post, $context ) {
        $type = get_field('type', $post->ID, true );
        if( $type ) {
            $data->data['type'] = $type;
        }
        $address = get_field('address', $post->ID, true );
        if( $address ) {
            $data->data['address'] = $address;
        }
        return $data;
    }, 10, 3 );
});

