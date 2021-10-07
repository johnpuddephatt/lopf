<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Section extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.section-header',    
        'partials.section-navigation',

    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        global $post;

        return [
            'children' => $this->children(),
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
            // 'title' => $this->title(),
        ];
    }

    public function children() {
        global $post; 

        if($post) {

        return get_posts([
            'post_type'        => 'page',
            'post_parent'    => $post->ID,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'numberposts' => -1
        ]);
    }
    }
}
