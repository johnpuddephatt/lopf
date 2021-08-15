<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Resource extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        // 'partials.page-header',
        // 'partials.content',
        'partials.content-single-resource',
        'partials.resource-header',
    ];

    public function with() {
        global $post;

        return [
           "date" => get_post_meta( $post->ID, 'date', true ) ? \DateTime::createFromFormat('Ymd', get_post_meta( $post->ID, 'date', true ))->format(get_option('date_format')) : null,
           "file_upload" =>get_field('file_upload', $post->ID),
           "file_oembed" => get_field('file_oembed', $post->ID),
           "types" => get_the_terms($post->ID, 'resourcetype'),
           "keylearnings" => get_the_terms($post->ID, 'resourcekeylearning'),
        ];
    }

    /** 
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            //    "foo" => 'bar',
        ];
    }
}