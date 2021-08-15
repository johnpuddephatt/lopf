<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf('&hellip;');
});

add_filter('excerpt_length', function() {
    return 27;
});


/*
 *
 * ACF Icon picker
 * 
 */

/// modify the path to the icons directory
add_filter('acf_icon_path_suffix',
  function ( $path_suffix ) {
    return '/public/icons/'; // After assets folder you can define folder structure
  }
);

// modify the path to the above prefix
add_filter('acf_icon_path',
  function ( $path_suffix ) {
    return get_stylesheet_directory();
  }
);

// modify the URL to the icons directory to display on the page
add_filter('acf_icon_url',
  function ( $path_suffix ) {
    return get_stylesheet_directory_uri();
  }
);
