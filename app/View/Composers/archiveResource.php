<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class archiveResource extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-resource',
        'taxonomy-resource'
    ];

    public function with() {
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