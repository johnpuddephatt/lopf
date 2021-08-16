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
        'archive-resource',
        'partials.resource-sidebar',
        'taxonomy-resource'
    ];

    public function with() {
        global $post;
        
        if($post->post_type == 'resource') {
            return [
            "date" => get_post_meta( $post->ID, 'date', true ) ? \DateTime::createFromFormat('Ymd', get_post_meta( $post->ID, 'date', true ))->format(get_option('date_format')) : null,
            "file_upload" =>get_field('file_upload', $post->ID),
            "file_oembed" => get_field('file_oembed', $post->ID),
            "resource_types" => get_the_terms($post->ID, 'resourcetype') ?? [],
            "resource_keylearnings" => get_the_terms($post->ID, 'resourcekeylearning') ?? [],
            "types" => get_terms([
                    'taxonomy' => 'resourcetype',
                    'hide_empty' => true
                ]),
                "keylearnings" => get_terms([
                    'taxonomy' => 'resourcekeylearning',
                    'hide_empty' => true
                ])
            ];
        }
        else {
            return [
                "post" => get_post(get_option('page_for_resources')),
                "types" => get_terms([
                    'taxonomy' => 'resourcetype',
                    'hide_empty' => true
                ]),
                "keylearnings" => get_terms([
                    'taxonomy' => 'resourcekeylearning',
                    'hide_empty' => true
                ])
            ];
        }
    }
}