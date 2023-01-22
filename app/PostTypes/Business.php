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

    add_filter('rest_business_query', function ($args, $request) {
         if(isset($request["age_and_dementia_friendly"])) {
            $args['meta_key'] = 'age_and_dementia_friendly';
            $args['meta_value'] = $request["age_and_dementia_friendly"];
        }   
        if(isset($request["come_in_and_rest"])) {
            $args['meta_key'] = 'come_in_and_rest';
            $args['meta_value'] = $request["come_in_and_rest"];
        }       

        return $args;
    }, 10, 2);

    /*
    *
    * Add address to REST API
    * 
    */

    add_filter( 'rest_prepare_business', function ( $data, $post, $context ) {
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

        $area_covered = get_field('area_covered_adf', $post->ID, true );
        if( $area_covered ) {
            $data->data['area_covered_adf'] = $area_covered;
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


