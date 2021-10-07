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

add_action( 'init', function() {
    $args = array(
        'hierarchical'          => false,
        'labels'                => [
            'name'              => 'Types',
            'singular_name'     => 'Type',
            'add_new_item'      => 'Add new resource type',
            'search_items'      => 'Search resource types',
            'edit_item'         => 'Edit type'
        ],
        'meta_box_cb'           => "post_categories_meta_box",
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'public'                => true,
        'rewrite'               => [
            'slug' => 'resource/type',
        ],
    );
 
    register_taxonomy( 'resourcetype', 'resource', $args );
}, 10 );


add_action( 'init', function() {
    register_taxonomy( 'resourcekeylearning', 'resource',     [
        'hierarchical'          => false,
        'labels'                => [
            'name'              => 'Key learnings',
            'singular_name'     => 'Key learning',
            'add_new_item'      => 'Add new key learning',
            'search_items'      => 'Search key learnings',
            'edit_item'         => 'Edit key learning'
        ],
        'meta_box_cb'       => "post_categories_meta_box",
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'public'            => true,
        'rewrite'               => array( 'slug' => 'resource/key-learning' ),
    ] );
}, 10 );



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


/**
 * Bidirectional ACF
 * This code is modified from the original here 
 * https://github.com/Hube2/acf-filters-and-functions/blob/master/acf-reciprocal-relationship.php
 *
 * Some comments may not be useful anymore since the modifications
 */


function dod_dale_sync_users_and_groups($value, $post_id, $field) {
	
	// set the two fields that you want to create
	// a two way relationship for
	// these values can be the same field key
	// if you are using a single relationship field
	// on a single post type
	
	// the field key of one side of the relationship - CPT
	$key_a = 'project';

	// the field key of the other side of the relationship - USER
	$key_b = 'resources';

	//set the type so we handle the differences in users and cpts ids
	$type = 'project';
	
	// figure out wich side we're doing and set up variables
	// if the keys are the same above then this won't matter
	// $key_a represents the field for the current posts
	// and $key_b represents the field on related posts
	if ($key_a != $field['key']) {
		// this is side b, swap the value
		$temp = $key_a;
		$key_a = $key_b;
		$key_b = $temp;

		$type = 'resource';
		//when the field is a user we need to remove user_ from post_id
		// $post_id = substr($post_id, strpos($post_id, '_') + 1);
	}
	
	// get both fields
	// this gets them by using an acf function
	// that can gets field objects based on field keys
	// we may be getting the same field, but we don't care
	$field_a = acf_get_field($key_a);
	$field_b = acf_get_field($key_b);
	
	// set the field names to check
	// for each post
	$name_a = $field_a['name'];
	$name_b = $field_b['name'];
	
	// get the old value from the current post
	// compare it to the new value to see
	// if anything needs to be updated
	// use get_post_meta() to a avoid conflicts
	if ('user' == $type) {
		$old_values = get_user_meta($post_id, $name_a, true);
	} else {
		$old_values = get_post_meta($post_id, $name_a, true);
	}
	
	// make sure that the value is an array
	if (!is_array($old_values)) {
		if (empty($old_values)) {
			$old_values = array();
		} else {
			$old_values = array($old_values);
		}
	}
	// set new values to $value
	// we don't want to mess with $value
	$new_values = $value;
	// make sure that the value is an array
	if (!is_array($new_values)) {
		if (empty($new_values)) {
			$new_values = array();
		} else {
			$new_values = array($new_values);
		}
	}
	
	// get differences
	// array_diff returns an array of values from the first
	// array that are not in the second array
	// this gives us lists that need to be added
	// or removed depending on which order we give
	// the arrays in
	
	// this line is commented out, this line should be used when setting
	// up this filter on a new site. getting values and updating values
	// on every relationship will cause a performance issue you should
	// only use the second line "$add = $new_values" when adding this
	// filter to an existing site and then you should switch to the
	// first line as soon as you get everything updated
	// in either case if you have too many existing relationships
	// checking end updated every one of them will more then likely
	// cause your updates to time out.
	//$add = array_diff($new_values, $old_values);
	$add = $new_values;
	$delete = array_diff($old_values, $new_values);
	
	// reorder the arrays to prevent possible invalid index errors
	$add = array_values($add);
	$delete = array_values($delete);
	
	if (!count($add) && !count($delete)) {
		// there are no changes
		// so there's nothing to do
		return $value;
	}
	
	// do deletes first
	// loop through all of the posts that need to have
	// the recipricol relationship removed
	for ($i=0; $i<count($delete); $i++) {
		if ('post' == $type) {
			$related_values = get_user_meta($delete[$i], $name_b, true);
		} else {
			$related_values = get_post_meta($delete[$i], $name_b, true);
		}
		if (!is_array($related_values)) {
			if (empty($related_values)) {
				$related_values = array();
			} else {
				$related_values = array($related_values);
			}
		}
		// we use array_diff again
		// this will remove the value without needing to loop
		// through the array and find it
		$related_values = array_diff($related_values, array($post_id));

		if ('post' == $type) {
			// insert the new value
			update_user_meta($delete[$i], $name_b, $related_values);
			// insert the acf key reference, just in case
			update_user_meta($delete[$i], '_'.$name_b, $key_b);
		} else {
			// insert the new value
			update_post_meta($delete[$i], $name_b, $related_values);
			// insert the acf key reference, just in case
			update_post_meta($delete[$i], '_'.$name_b, $key_b);
		}
	}
	
	// do additions, to add $post_id
	for ($i=0; $i<count($add); $i++) {
		if ('post' == $type) {
			$related_values = get_user_meta($add[$i], $name_b, true);
		} else {
			$related_values = get_post_meta($add[$i], $name_b, true);
		}
		if (!is_array($related_values)) {
			if (empty($related_values)) {
				$related_values = array();
			} else {
				$related_values = array($related_values);
			}
		}
		if (!in_array($post_id, $related_values)) {
			// add new relationship if it does not exist
			$related_values[] = $post_id;
		}

		if ('post' == $type) {
			// insert the new value
			update_user_meta($add[$i], $name_b, $related_values);
			// insert the acf key reference, just in case
			update_user_meta($add[$i], '_'.$name_b, $key_b);
		} else {
			// insert the new value
			update_post_meta($add[$i], $name_b, $related_values);
			// insert the acf key reference, just in case
			update_post_meta($add[$i], '_'.$name_b, $key_b);
		}
	}
	
	return $value;
	
}
add_filter('acf/update_value/name=project', 'dod_dale_sync_users_and_groups', 10, 3);
add_filter('acf/update_value/name=resources', 'dod_dale_sync_users_and_groups', 10, 3);