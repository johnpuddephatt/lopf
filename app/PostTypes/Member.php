<?php

/*
 *
 * Register 'Member' post
 * 
 */

add_action('init', function() {
    register_post_type('member',
       array(
          'labels' => array(
            'name' => __('Members'),
            'singular_name' => __('Member'),
            'add_new_item' => __( 'Add New Member'),
            'edit_item'         => 'Edit Member'
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array(
              'slug' => 'groups/member',
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

    add_filter( 'rest_prepare_member', function ( $data, $post, $context ) {
        $type = get_field('type', $post->ID, true );
        if( $type ) {
            $data->data['type'] = $type;
        }
        $address = get_field('address', $post->ID, true );
        if( $address ) {
            $data->data['address'] = $address;
        }
        $neighbourhood_network = get_field('neighbourhood_network', $post->ID, true );
        if( $neighbourhood_network && $neighbourhood_network == true) {
            $data->data['neighbourhood_network'] = true;
        }
        else {
            $data->data['neighbourhood_network'] = false;
        }
        return $data;
    }, 10, 3 );

});


