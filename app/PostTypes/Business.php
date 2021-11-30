<?php

/*
 *
 * Register 'Member' post
 * 
 */

add_action('init', function() {
    register_post_type('business',
       array(
          'labels' => array(
            'name' => __('Businesses'),
            'singular_name' => __('Business'),
            'add_new_item' => __( 'Add New Business'),
            'edit_item'         => 'Edit Business'
          ),
          'public' => true,
          'menu_icon' => 'dashicons-store',
          'menu_position' => 5,
          'show_in_rest' => true,
          'publicly_queryable' => false,
          'supports' => array('title','excerpt','thumbnail'),
       )
    );

    /*
    *
    * Add address to REST API
    * 
    */

    add_filter( 'rest_prepare_business', function ( $data, $post, $context ) {
        // $type = get_field('type', $post->ID, true );
        // if( $type ) {
        //     $data->data['type'] = $type;
        // }
        $address = get_field('address', $post->ID, true );
        if( $address ) {
            $data->data['address'] = $address;
        }

        $url = get_field('url', $post->ID, true );
        if( $url ) {
            $data->data['url'] = $url;
        }

        $area_covered = get_field('area_covered', $post->ID, true );
        if( $area_covered ) {
            $data->data['area_covered'] = $area_covered;
        }
        
        // $neighbourhood_network = get_field('neighbourhood_network', $post->ID, true );
        // if( $neighbourhood_network && $neighbourhood_network == true) {
        //     $data->data['neighbourhood_network'] = true;
        // }
        // else {
        //     $data->data['neighbourhood_network'] = false;
        // }
        return $data;
    }, 10, 3 );

});


