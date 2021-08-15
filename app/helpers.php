<?php

/**
 * Theme helpers.
 */

namespace App;


function has_thumbnail_size($id, $size) {
    $meta = wp_get_attachment_metadata(get_post_thumbnail_id($id));
    return isset($meta['sizes'][$size]);
}